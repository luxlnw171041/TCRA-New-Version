<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/update_last_time_active/{user_id}', 'UserController@update_last_time_active');
Route::get('/check_email/{email}', 'UserController@check_email');
Route::post('/create_member', 'UserController@create_member');
Route::get('/change_status_to/{change_to}/{user_id}', 'UserController@change_status_to');
Route::get('/search_member', 'UserController@search_member');
Route::post('/submit_change_pass', 'UserController@submit_change_pass');
Route::get('/update_pass', 'UserController@update_pass');
Route::get('/delete_member/{user_id}', 'UserController@delete_member');
