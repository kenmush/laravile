<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Promotor\AffiliateView;
use Illuminate\Support\Facades\Cookie;
use App\Promotor\Promotor;
use App\Promotor\PromotorUser;
use App\Promotor\Payout;

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
        view()->composer('promotor/*', function ($view) {

            $promotor = Promotor::where('id',auth('promotor')->id())->first();
            // $promotor->earning = $countTotalEarning;
            // $promotor->update();
            // count total sales
            $item = PromotorUser::where('has_refund',0)
            ->where('promotor_id',auth('promotor')->id())
            ->get();
            $countTotalEarning = 0;
            foreach($item as $d){
                $countTotalEarning += $d->earn_value;
            }
          
            // count total earning requested
            $payout = Payout::where('promotor_id',auth('promotor')->id())
            ->get();
    
            $countTotalEarningRequest = 0;
            foreach($payout as $d){
                $countTotalEarningRequest += $d->amount;
            }
    
            $total = ((double)$countTotalEarning - (double)$countTotalEarningRequest);
            preg_match('/E/',$total,$match);
            $match ? $total = 0 : $total =  $total;
            $promotor->earning = $total;
            $promotor->update();

        });
    }
}
