<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::view('/', 'admin.auth.login')->name('admin.login')->middleware('checkAdmin');

Route::group(['middleware' => ['admin'] ,'as' => 'admin.'], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('users', 'UserController');
    Route::view('register', 'admin.auth.register')->name('register');
    Route::view('dashboard/register', 'admin.addUser')->name('dashboard.register');
    Route::resource('plans','PlanController');  

});
