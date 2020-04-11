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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(['namespace' => 'Client'], function () {
    Route::get('plan', 'PlanController@index')->name('plan.index');
    Route::get('payment', 'PlanController@showPayment')->name('plan.payment.show');
    Route::post('payment', 'PlanController@payment')->name('plan.payment');
    Route::post('pay', 'PlanController@doPayment')->name('plan.pay');

    Route::get('client', 'Auth\LoginController@showLoginForm')->name('client');
    Route::post('client/login', 'Auth\LoginController@clientLogin')->name('client.login');

    Route::group(['middleware' => ['auth', 'user']], function () {
        Route::get('welcome', 'WelcomeController@index')->name('welcome');
        Route::get('dashboard', 'DashboardController@index')->name('user.dashboard');
        Route::resource('profile', 'ProfileController');
        Route::resource('clients', 'ClientController');
        Route::get('export', 'ClientController@export')->name('clients.export');
        Route::resource('team-members', 'TeamMemberController');
        Route::get('subscription', 'SubscriptionController@manage')->name('manage.subscription');
        Route::resource('orders', 'OrdersController');
        Route::get('video-report', 'VideoReportController@index')->name('video.report.index');
        Route::post('video-report', 'VideoReportController@getVideo')->name('video.report.get');
    });
});

Route::group(['prefix' => 'client', 'middleware' => 'auth:client', 'as' => 'client.'], function () {
    Route::view('/dashboard', 'userclient.dashboard.index')->name('dashboard');
});



//logout
Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');
