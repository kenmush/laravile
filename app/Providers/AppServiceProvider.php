<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Promotor\AffiliateView;
use Illuminate\Support\Facades\Cookie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) {
            if(Cookie::has('affiliate')){
                AffiliateView::create([
                    'token'=> Cookie::get('track') ?? null,
                    'url' => \Request::url(),
                    'session_id' => \Auth::user() ? \Request::getSession()->getId() : null,
                    'user_id' =>  \Auth::user()->id ?? null
                ]);
            }

        });
    }
}
