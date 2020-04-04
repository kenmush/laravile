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

// Route::get('/', function () {
//     return view('welcome');
// });


// Admin Routes
Route::view('/admins','admin.auth.login')->name('admin.login')->middleware('checkAdmin');
Route::view('/admins/register','admin.auth.register')->name('admin.register')->middleware('checkAdmin');

Route::group(['prefix' => 'admins', 'as' => 'admin.','middleware' => ['admin','auth']], function () {

    Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
