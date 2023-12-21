<?php

namespace App\View\Components\Twill\Blocks\Common;

use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;

class Title extends Base
{
    public function getForm(): Form
    {
        return Form::make([
            Input::make()
                ->name('title')
                ->label(__('Title'))
                ->translatable(),
        ]);
    }

    public static function getBlockTitleField(): ?string
    {
        return 'title';
    }

    public static function getBlockTitle(): string
    {
        return __('Title');
    }

    public static function getBlockIcon(): string
    {
        return 'wysiwyg_header';
    }
}
