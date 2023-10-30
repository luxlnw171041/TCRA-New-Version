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

Route::get('/data_table_member', function () {
    return view('create_user_by_admin.data_table_member');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer_test', 'CustomerController@customer_test');

// auth
Route::middleware(['auth'])->group(function () {
	Route::resource('user', 'UserController');
	Route::get('show_profile/{id}', 'UserController@show_profile');
	Route::get('/view_data_for_user/{customers}', 'HomeController@view_data_for_user');
	Route::get('/view_data_for_user/{drivers}', 'HomeController@view_data_for_user');
});

// admin
Route::middleware(['auth', 'member_role:admin'])->group(function () {
	Route::resource('create_user_by_admin', 'Create_user_by_adminController')->except(['show','create','edit','view']);
	Route::get('/view_data_all/{customers}', 'HomeController@view_data_all');
	Route::get('/view_data_all/{drivers}', 'HomeController@view_data_all');
});

// customer
Route::middleware(['auth', 'member_role:customer,admin,member'])->group(function () {
	Route::resource('customer', 'CustomerController');
});

// driver
Route::middleware(['auth', 'member_role:driver,admin,member'])->group(function () {
	Route::resource('driver', 'DriverController');
});
