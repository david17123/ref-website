<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Article' => 'App\Policies\ArticlePolicy',
        'App\Asset' => 'App\Policies\AssetPolicy',
        'App\Author' => 'App\Policies\AuthorPolicy',
        'App\Event' => 'App\Policies\EventPolicy',
        'App\Picquote' => 'App\Policies\PicquotePolicy',
        'App\SermonSummary' => 'App\Policies\SermonSummaryPolicy',
        'App\University' => 'App\Policies\UniversityPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->before(function ($user, $ability) {
            if ($user->role && $user->role->code_name === 'superAdmin')
            {
                return true;
            }
            else
            {
                return null;
            }
        });

        $gate->define('adminPage', function ($user) {
            return $user->role && $user->role->code_name === 'siteAdmin';
        });
    }
}
