<?php

namespace App\View\Components\Twill\Blocks\Base;

use A17\Twill\Services\Forms\Form;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class BlockComponent extends TwillBlockComponent
{
    public function render(): View
    {
        return view();
    }

    public function getForm(): Form
    {
        return Form::make([]);
    }

    public static function getBlockGroup(): string
    {
        return '';
    }

    public static function fieldWysiwygTypeDefault(): string
    {
        return 'quill';
    }

    public static function fieldWysiwygToolbarOptionsDefault(): array
    {
        return [
            ['header' => [2, 3, 4, false]],
            'bold',
            'italic',
            'underline',
            'strike',
            ['list' => 'bullet'],
            ['list' => 'ordered'],
            'link',
            'clean',
            // ['color' => ["#747E8C", "#54D52B", "#3BA618", "#00B2D2", "#FBC000"]],
        ];
    }

    public static function fieldWysiwygToolbarOptionsLight(): array
    {
        return [
            'bold',
            'italic',
            'clean',
        ];
    }
}
