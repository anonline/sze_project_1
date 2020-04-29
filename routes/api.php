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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
*/
    Route::group([ 'middleware' => 'auth:api'], function()
    {

        Route::post('user/logout', 'UserController@logout');
        Route::post('user/profile', 'UserController@update');

        Route::get('user/races', 'RegisterController@races');
        Route::post('user/race/{id}', 'RegisterController@store');
        Route::delete('user/race/{id}', 'RegisterController@destroy');

        Route::post('admin/logout', 'AdminController@logout');
        Route::post('admin/race', 'RaceController@store');
        Route::delete('admin/race', 'RaceController@destroy');
        Route::put('admin/race/{id}', 'RaceController@store');

    });

    Route::post('admin/login', 'AdminController@login');
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@create');
    Route::get('/races', 'RaceController@races');
    Route::post('/race', 'RaceController@store');
    Route::get('race/{id}', 'RaceController@show');
    Route::delete('/race/{id}', 'RaceController@destroy');


