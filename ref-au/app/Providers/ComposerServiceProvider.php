<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        view()->composer(
            'component.header', 'App\Http\ViewComposers\HeaderComposer'
        );
        view()->composer(
            'component.footer', 'App\Http\ViewComposers\FooterComposer'
        );
        view()->composer(
            '*', 'App\Http\ViewComposers\SiteComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
