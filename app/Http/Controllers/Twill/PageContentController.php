<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fieldset;
use A17\Twill\Services\Forms\Form;
use App\Http\Controllers\Twill\Base\ModuleController as BaseModuleController;
use App\Models\Base\Model;

class PageContentController extends BaseModuleController
{
    protected $moduleName = 'pageContents';

    protected function setUpController(): void
    {
        $this->setPermalinkBase('');
        $this->withoutLanguageInPermalink();
        $this->enableReorder();
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
                    'common-image',
                    'common-button',
                    'common-separator',
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
            'page' => 'Page/Content',
        ]);
    }
}
