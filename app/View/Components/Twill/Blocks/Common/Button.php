<?php

namespace App\View\Components\Twill\Blocks\Common;

use A17\Twill\Services\Forms\Columns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;

class Button extends Base
{
    public function getForm(): Form
    {
        return Form::make([

            Columns::make()
                ->left([
                    Input::make()
                        ->name('label')
                        ->label(__('Label'))
                        ->translatable()
                        ->required()
                ])
                ->right([
                    Input::make()
                        ->name('url')
                        ->label(__('URL'))
                        ->translatable()
                        ->required()
                ]),

            Select::make()
                ->name('type')
                ->label(__('Type'))
                ->options(
                    Options::make([
                        Option::make('std', __('Standard')),
                        Option::make('cta', __('Call To Action')),

                    ])
                )
                ->default('std')
        ]);
    }

    public static function getBlockTitle(): string
    {
        return __('Button');
    }

    public static function getBlockIcon(): string
    {
        return 'revision-single';
    }
}
