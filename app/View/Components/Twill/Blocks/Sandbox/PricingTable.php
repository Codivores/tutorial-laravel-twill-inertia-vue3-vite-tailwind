<?php

namespace App\View\Components\Twill\Blocks\Sandbox;

use A17\Twill\Services\Forms\Columns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\InlineRepeater;

class PricingTable extends Base
{
    public function getForm(): Form
    {
        return Form::make([
            Input::make()
                ->name('title')
                ->label(__('Title'))
                ->translatable(),

            InlineRepeater::make()
                ->name('pricing')
                ->label(__('Plan'))
                ->triggerText(__('Add a Plan'))
                ->fields([
                    Columns::make()
                        ->left([
                            Input::make()
                                ->name('name')
                                ->label(__('Name'))
                                ->translatable()
                                ->required(),
                        ])
                        ->right([
                            Input::make()
                                ->name('price')
                                ->label(__('Price'))
                                ->required()
                                ->type('number')
                                ->min(0),
                        ]),

                    Wysiwyg::make()
                        ->name('description')
                        ->label(__('Description'))
                        ->type(self::fieldWysiwygTypeDefault())
                        ->toolbarOptions(self::fieldWysiwygToolbarOptionsDefault())
                        ->allowSource()
                        ->translatable(),

                ])
        ]);
    }

    public static function getBlockTitle(): string
    {
        return __('Pricing Table');
    }

    public static function getBlockIcon(): string
    {
        return 'b-checklist';
    }
}
