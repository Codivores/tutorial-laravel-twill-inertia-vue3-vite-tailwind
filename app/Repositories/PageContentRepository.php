<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\PageContent;
use Illuminate\Support\Facades\Cache;

class PageContentRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleSlugs, HandleMedias, HandleRevisions;

    public function __construct(PageContent $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields): void
    {
        // Cache clearing.
        foreach (optional($object)->slugs as $slug) {
            Cache::forget('page.content.' . $slug->locale . '.' . $slug->slug);
        }

        parent::afterSave($object, $fields);
    }
}
