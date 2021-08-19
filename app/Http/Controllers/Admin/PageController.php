<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class PageController extends ModuleController
{
    protected $moduleName = 'pages';

    protected $permalinkBase = '';

    protected $indexOptions = [
        'reorder' => true,
    ];

    protected $indexColumns = [
        'title' => [
            'title' => 'Page',
            'field' => 'title',
        ],
    ];
}
