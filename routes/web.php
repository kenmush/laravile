<?php

use HansSchouten\LaravelPageBuilder\LaravelPageBuilder;

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
Auth::routes(['verify' => true]);
Route::get('report/{id}', 'Client\ClientController@showReport')->name('report.show');

Route::group(['namespace' => 'Client'], function () {
    Route::get('plan', 'PlanController@index')->name('plan.index');
    Route::get('payment', 'PlanController@showPayment')->name('plan.payment.show');
    Route::post('payment', 'PlanController@payment')->name('plan.payment');
    Route::post('pay', 'PlanController@doPayment')->name('plan.pay');

    Route::get('client', 'Auth\LoginController@showLoginForm')->name('client');
    Route::post('client/login', 'Auth\LoginController@clientLogin')->name('client.login');

    Route::group(['middleware' => ['auth', 'user', 'verified']], function () {
        Route::get('welcome', 'WelcomeController@index')->name('welcome');
        Route::get('dashboard', 'DashboardController@index')->name('user.dashboard');
        Route::resource('profile', 'ProfileController');
        Route::resource('clients', 'ClientController');
        Route::get('clients/{id}/report', 'ClientController@report')->name('client.report');
        Route::post('clients/{id}/report', 'ClientController@generateReport')->name('client.generate');
        Route::get('export', 'ClientController@export')->name('clients.export');
        Route::resource('team-members', 'TeamMemberController');
        Route::get('subscription', 'SubscriptionController@manage')->name('manage.subscription');
        Route::resource('orders', 'OrdersController');
        Route::get('video-report', 'VideoReportController@index')->name('video.report.index');
        Route::post('video-report', 'VideoReportController@getVideo')->name('video.report.get');
        Route::post('add-video-to-report', 'VideoReportController@addVideoToReport');
        Route::delete('report/{id}/destroy', 'ClientController@destroyReport');
        Route::resource('coverage_report', 'CoverageReportController');
        Route::get('coverage_reports/new', 'CoverageReportController@new')->name('coverage.new');
        Route::view('coverage_report/{slug}/{id}/edit', 'client.pagebuilder.index')->name('coverage.custom');
        Route::post('ajaxcoverage/{id}', 'CoverageReportController@ajaxupdate');
        Route::get('ajaxcoverage/{id}', 'CoverageReportController@ajaxget');
        Route::post('ajaxassets', 'CoverageReportController@ajaxasset');
        Route::get('ajaxassets', 'CoverageReportController@ajaxAssetGet');
        Route::get('gettemplate/{temp}', 'CoverageReportController@getTemplate');
    });
});

Route::group(['prefix' => 'client', 'middleware' => 'auth:client', 'as' => 'client.'], function () {
    Route::view('/dashboard', 'userclient.dashboard.index')->name('dashboard');
});

Route::get('/affiliate', 'Promotor\AffiliateController@affiliate');

Route::view('/design', 'client.design');
Route::view('/funnel', 'funnel');

//logout
Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');
