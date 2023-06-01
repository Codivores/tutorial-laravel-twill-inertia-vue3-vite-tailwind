<?php

namespace App\Http\Controllers\Twill\Base;

use A17\Twill\Http\Controllers\Admin\SingletonModuleController as TwillSingletonModuleController;
use App\Http\Controllers\Twill\Traits\HasPreview;

class SingletonModuleController extends TwillSingletonModuleController
{
    use HasPreview;

    protected $previewView = 'twill.preview';
}
