<?php

namespace App\Http\Controllers\Twill\Base;

use A17\Twill\Http\Controllers\Admin\ModuleController as TwillModuleController;
use App\Http\Controllers\Twill\Traits\HasPreview;

class ModuleController extends TwillModuleController
{
    use HasPreview;

    protected $previewView = 'twill.preview';
}
