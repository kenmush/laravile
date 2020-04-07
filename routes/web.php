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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Client'], function () {
    Route::get('plan', 'PlanController@index')->name('plan.index');
    Route::post('payment', 'PlanController@payment')->name('plan.payment');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('welcome', 'WelcomeController@index')->name('welcome');
        Route::get('payment', 'PlanController@showPayment')->name('plan.payment.show');
        Route::post('pay', 'PlanController@doPayment')->name('plan.pay');
        Route::get('dashboard', 'DashboardController@index')->name('client.dashboard');
        Route::resource('team-members','TeamMemberController');
    });
});



//logout
Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');
