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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer_test', 'CustomerController@customer_test');

// auth
Route::middleware(['auth'])->group(function () {
	Route::resource('customer', 'CustomerController');
	Route::resource('user', 'UserController');

});

// admin
Route::middleware(['auth', 'member_role:admin'])->group(function () {
	Route::resource('create_member', 'Create_memberController');
});