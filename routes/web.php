<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login_fail', function () {
    return view('login_fail');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer_test', 'CustomerController@customer_test');

// auth
Route::middleware(['auth'])->group(function () {
	Route::resource('user', 'UserController');
	Route::get('show_profile/{id}', 'UserController@show_profile');
});

// admin
Route::middleware(['auth', 'member_role:admin'])->group(function () {
	Route::resource('create_user_by_admin', 'Create_user_by_adminController')->except(['show','create','edit','view']);
});

// customer
Route::middleware(['auth', 'member_role:customer,admin'])->group(function () {
	Route::resource('customer', 'CustomerController');
});

// driver
Route::middleware(['auth', 'member_role:driver,admin'])->group(function () {
	Route::resource('driver', 'DriverController');
});

