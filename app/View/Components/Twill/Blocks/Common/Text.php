<?php

namespace App\View\Components\Twill\Blocks\Common;

use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Wysiwyg;

class Text extends Base
{
    public function getForm(): Form
    {
        return Form::make([
            Wysiwyg::make()
                ->name('content')
                ->label(__('Content'))
                ->type(self::fieldWysiwygTypeDefault())
                ->toolbarOptions(self::fieldWysiwygToolbarOptionsDefault())
                ->allowSource()
                ->translatable(),
        ]);
    }

    public static function getBlockTitle(): string
    {
        return __('Text');
    }

    public static function getBlockIcon(): string
    {
        return 'text';
    }
}
