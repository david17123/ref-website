<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\HelperClasses\SitePageService;

class SitePageServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SitePageService::class, function ($app) {
            return new SitePageService();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [SitePageService::class];
    }
}
