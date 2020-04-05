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
Route::group(['prefix' => 'admins', 'as' => 'admin.','middleware' => ['admin']], function () {

    Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
    Route::resource('/users','Admin\UserController');
    Route::view('/register','admin.auth.register')->name('register');
    Route::view('/dashboard/register','admin.addUser')->name('dashboard.register');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
