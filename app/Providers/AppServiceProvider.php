<?php

namespace App\Providers;

use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->relationEnforceMorphMap();
        $this->twillNavigation();
    }

    private function relationEnforceMorphMap()
    {
        Relation::enforceMorphMap([
            'pageContent' => 'App\Models\PageContent',
            'pageHome' => 'App\Models\PageHome',

            'settingApp' => 'A17\Twill\Models\AppSetting',
        ]);
    }

    private function twillNavigation()
    {
        TwillNavigation::addLink(
            NavigationLink::make()
                ->title(Str::ucfirst(__('content')))
                ->forModule('pageContents')
                ->doNotAddSelfAsFirstChild()
                ->setChildren([
                    NavigationLink::make()
                        ->title(Str::ucfirst(__('home')))
                        ->forSingleton('pageHome'),
                    NavigationLink::make()
                        ->title(Str::ucfirst(__('pages')))
                        ->forModule('pageContents'),
                ]),
        );
    }
}
