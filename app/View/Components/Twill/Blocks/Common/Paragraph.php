<?php

namespace App\View\Components\Twill\Blocks\Common;

use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Wysiwyg;

class Paragraph extends Base
{
    public function getForm(): Form
    {
        return Form::make([
            Input::make()
                ->name('title')
                ->label(__('Title'))
                ->translatable(),

            Input::make()
                ->name('subtitle')
                ->label(__('Subtitle'))
                ->translatable(),

            Wysiwyg::make()
                ->name('content')
                ->label(__('Content'))
                ->type(self::fieldWysiwygTypeDefault())
                ->toolbarOptions(self::fieldWysiwygToolbarOptionsDefault())
                ->allowSource()
                ->translatable(),
        ]);
    }

    public static function getBlockTitleField(): ?string
    {
        return 'title';
    }

    public static function getBlockTitle(): string
    {
        return __('Paragraph');
    }

    public static function getBlockIcon(): string
    {
        return 'content-editor';
    }
}
