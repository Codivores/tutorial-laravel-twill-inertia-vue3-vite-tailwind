<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\PageHome;

class PageHomeRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleRevisions;

    public function __construct(PageHome $model)
    {
        $this->model = $model;
    }
}
