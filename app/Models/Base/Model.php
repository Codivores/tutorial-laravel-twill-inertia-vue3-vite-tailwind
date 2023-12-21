<?php

namespace App\Models\Base;

use A17\Twill\Models\Model as TwillModel;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;

class Model extends TwillModel
{
    public function computeActiveSlug(): void
    {
        $this->activeSlug = $this->getSlug();
        $this->unsetRelation('slugs');
    }

    public function computeBlocks(string $locale = null): void
    {
        $locale = $locale ?? app()->getLocale();
        $fallbackLocale = config('translatable.use_property_fallback', false) ? config('translatable.fallback_locale') : $locale;

        $blocks = $this->blocks
            ->where('parent_id', null)
            ->map(function ($block) use ($locale, $fallbackLocale) {
                $block->childs = $this->blocks
                    ->where('parent_id', $block->id)
                    ->map(function ($blockChild) use ($locale, $fallbackLocale) {
                        $blockChild->childs = $this->blocks
                            ->where('parent_id', $blockChild->id)
                            ->map(function ($blockChildChild) use ($locale, $fallbackLocale) {
                                return $this->computeBlock($blockChildChild, $locale, $fallbackLocale);
                            })
                            ->values();

                        $block = $this->computeBlock($blockChild, $locale, $fallbackLocale);
                        return $block;
                    })
                    ->values();

                $block->unsetRelation('children');

                return $this->computeBlock($block, $locale, $fallbackLocale);
            })->values();

        $this->unsetRelation('blocks');
        $this->blocks = $blocks->values();
    }

    private function computeBlock($block, string $locale, string $fallbackLocale = null): array
    {
        // Handle medias.
        if (isset($block->medias) && count($block->medias) > 0) {
            $medias = [];
            $roles = $block
                ->medias
                ->unique('pivot.role')
                ->pluck('pivot.role');

            foreach ($roles as $role) {
                $images = $block->imagesAsArraysWithCrops($role);
                $medias[$role] = (is_array($images) && count($images) > 1) ? $images : reset($images);
            }

            $block->medias = $medias;
        }

        // Handle browsers.
        if (isset($block->content['browsers']) && is_array($block->content['browsers']) && count($block->content['browsers']) > 0) {
            $blockContent = $block->content;
            foreach ($blockContent['browsers'] as $moduleClass => $idList) {
                if (is_array($idList) && count($idList) > 0) {
                    $model = new (Relation::getMorphedModel($moduleClass));
                    $relatedItems = [];
                    foreach ($idList as $id) {
                        $relatedItems[] = $model->find($id)->setHidden([
                            'id',
                            'position',
                            'published',
                            'active',
                            'translations',
                            'created_at',
                            'updated_at',
                            'deleted_at'
                        ])->toArray();
                    }
                    $blockContent['browsers'][$moduleClass] = $relatedItems;
                } else {
                    $blockContent['browsers'][$moduleClass] = null;
                }
            }
            $block->content = $blockContent;
        }

        // Handle translated content inputs.
        if (is_array($block->content) && count($block->content) > 0) {
            $blockContent = $block->content;
            foreach ($blockContent as $field => $value) {
                if (is_array($value)) {
                    if (isset($value[$locale]) || isset($value[$fallbackLocale])) {
                        $blockContent[$field] = $block->translatedInput($field);
                    } else {
                        foreach (config('translatable.locales') as $allowedLocale) {
                            if (isset($value[$allowedLocale])) {
                                $blockContent[$field] = null;
                                break;
                            }
                        }
                    }
                }
            }
            $block->content = $blockContent;
        }

        return $block->only(Arr::collapse(
            [
                [
                    'editor_name',
                    'position',
                    'type',
                    'content',
                ],
                (count($block->medias) > 0) ? ['medias'] : [],
                ($block->childs && count($block->childs) > 0) ? ['childs'] : []
            ]
        ));
    }

    public function computeFiles(string $role = 'document'): void
    {
        $files = $this->filesList($role);

        $this->unsetRelation('files');
        $this->files = [
            $role => $files,
        ];
    }

    public function computeMedia(string $role = 'cover', array $params = []): void
    {
        $images = $this->imagesAsArraysWithCrops($role, $params);

        $this->$role = (is_array($images) && count($images) > 0) ? reset($images) : null;
    }

    public function computeMedias(string $role = 'cover', array $params = []): void
    {
        $this->$role = $this->imagesAsArraysWithCrops($role, $params);
    }
}
