<?php

namespace App\View\Components\Twill\Blocks\Common;

use A17\Twill\Services\Forms\Form;

class Separator extends Base
{
    public function getForm(): Form
    {
        return Form::make();
    }

    public static function getBlockTitle(): string
    {
        return __('Separator');
    }

    public static function getBlockIcon(): string
    {
        return 'more-dots';
    }
}
