<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fieldset;
use App\Http\Controllers\Twill\Base\SingletonModuleController as BaseModuleController;
use App\Models\Base\Model;

class PageHomeController extends BaseModuleController
{
    protected $moduleName = 'pageHomes';

    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->disableCreate();
        $this->disableDelete();
        $this->disablePublish();
        $this->disableEditor();
    }

    protected function formData($request)
    {
        return [
            'customPermalink' => route('home'),
        ];
    }

    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            BlockEditor::make()
                ->withoutSeparator()
                ->blocks([
                    'common-title',
                    'common-text',
                    'common-paragraph',
                    'common-button',
                    'common-image',
                    'common-imageunconstrained',
                    'common-separator',
                    'sandbox-pricingtable',
                ])
        );

        return $form;
    }

    public function getSideFieldsets(TwillModelContract $model): Form
    {
        $form = parent::getSideFieldsets($model);

        $form->addFieldset(
            Fieldset::make()
                ->title('SEO')
                ->id('seo')
                ->fields([
                    Input::make()
                        ->name('meta_title')
                        ->label('Title')
                        ->translatable()
                        ->maxLength(100),

                    Input::make()
                        ->name('meta_description')
                        ->label('Description')
                        ->translatable()
                        ->maxLength(200),
                ])
        );

        return $form;
    }

    /**
     * @param Model $item
     * @return array
     */
    protected function previewData($item)
    {
        $item->computeBlocks();

        return $this->previewForInertia($item->only($item->publicAttributes), [
            'page' => 'Page/Home',
        ]);
    }
}
