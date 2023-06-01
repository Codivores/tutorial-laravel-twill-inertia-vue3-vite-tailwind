<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\PageHome;
use Illuminate\Support\Facades\Cache;

class PageHomeRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleRevisions;

    public function __construct(PageHome $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields): void
    {
        // Cache clearing.
        foreach (optional($object)->translations as $translation) {
            Cache::forget('page.home.' . $translation->locale);
        }

        parent::afterSave($object, $fields);
    }
}
