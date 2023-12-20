<?php

namespace App\View\Components\Twill\Blocks\Common;

use App\View\Components\Twill\Blocks\Base\BlockComponent;

class Base extends BlockComponent
{
    public static function getBlockGroup(): string
    {
        return 'common-';
    }
}
