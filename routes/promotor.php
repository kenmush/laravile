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

 Route::group(['middleware' => 'auth:promotor', 'as' => 'promotor.'],function(){
    Route::get('/','PromotorController@index')->name('dashboard');
 });
