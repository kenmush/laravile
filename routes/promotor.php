<?php

/*
|--------------------------------------------------------------------------
| Promotor Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

 Route::get('login','Auth\LoginController@showLoginForm')->name('promotor.login');
 Route::post('login','Auth\LoginController@promotorLogin');

 Route::get('register','Auth\RegisterController@showRegisterForm')->name('promotor.register');
 Route::post('register','Auth\RegisterController@register');

 Route::group(['as' => 'promotor.'],function(){

    Route::group(['middleware' => 'auth:promotor'],function(){
        Route::get('/','PromotorController@index')->name('dashboard');
        Route::resource('affiliate','AffiliateController');
        Route::get('/sales/{id?}','AffiliateController@sales')->name('affiliate.sales');
        Route::get('/payout/{id?}','AffiliateController@payout')->name('affiliate.payout');
        Route::post('/payout/store','AffiliateController@payoutStore')->name('affiliate.payout.store');
        Route::get('/payout/delete/{id}','AffiliateController@payoutDelete');
    });

 });
