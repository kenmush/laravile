<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Client' => 'App\Policies\ClientPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('create-client', function ($user) {
            if ($user->parent) {
                $user = $user->parent;
            }
            return $user->no_of_clients === 0 ? false : true;
        });

        Gate::define('create-team', function ($user) {
            if ($user->parent) {
                $user = $user->parent;
            }
            return $user->no_of_users === 0 ? false : true;
        });

        Gate::define('create-report', function ($user) {
            if ($user->parent) {
                $user = $user->parent;
            }
            return $user->no_of_reports === 0 ? false : true;
        });
    }
}
