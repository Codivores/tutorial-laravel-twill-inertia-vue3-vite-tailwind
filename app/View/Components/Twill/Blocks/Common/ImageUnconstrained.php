<?php

namespace App\View\Components\Twill\Blocks\Common;

use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Medias;

class ImageUnconstrained extends Base
{
    public function getForm(): Form
    {
        return Form::make([
            Medias::make()
                ->name('common_unconstrained_image')
                ->label(__('Image'))
                ->max(1)
        ]);
    }

    public static function getCrops(): array
    {
        return [
            'common_unconstrained_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 'free',
                    ],
                ],
            ],
        ];
    }

    public static function getBlockTitle(): string
    {
        return __('Unconstrained image');
    }

    public static function getBlockIcon(): string
    {
        return 'image';
    }
}
