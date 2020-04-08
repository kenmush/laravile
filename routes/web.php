<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth:client');

Route::group(['namespace' => 'Client'], function () {
    Route::get('plan', 'PlanController@index')->name('plan.index');
    Route::post('payment', 'PlanController@payment')->name('plan.payment');

    Route::get('client','Auth\LoginController@showLoginForm')->name('client');
    Route::post('client/login','Auth\LoginController@clientLogin')->name('client.login');

    Route::group(['middleware' => ['auth','client']], function () {
        Route::get('welcome', 'WelcomeController@index')->name('welcome');
        Route::get('payment', 'PlanController@showPayment')->name('plan.payment.show');
        Route::post('pay', 'PlanController@doPayment')->name('plan.pay');
        Route::get('dashboard', 'DashboardController@index')->name('client.dashboard');
        Route::resource('profile', 'ProfileController');
        Route::resource('client', 'ClientController');
        Route::get('export','ClientController@export')->name('client.export');
    });
});


//logout
Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');
