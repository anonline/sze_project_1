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

    Route::group([ 'middleware' => 'auth:api'], function()
    {
        Route::get('user/profile', 'UserController@show');
        Route::post('user/profile', 'UserController@update');
        Route::post('user/logout', 'UserController@logout');
        Route::delete('user/profile', 'UserController@destroy');

        Route::get('user/achievements', 'AchievementController@index');
        Route::get('user/achievement/{id}', 'AchievementController@show');
        Route::post('user/achievement', 'RaceController@rateRace');

        Route::get('user/races', 'RegisterController@races');
        Route::post('user/race', 'RegisterController@store');
        Route::delete('user/race/{id}', 'RegisterController@destroy');

    });

    Route::group([ 'middleware' => 'auth:api-admin'], function(){

        Route::get('admin/races', 'AdminRaceController@index');
        Route::post('admin/logout', 'AdminController@logout');
        Route::post('admin/race', 'AdminRaceController@store');
        Route::put('admin/race/{id}', 'RaceController@store');
        Route::delete('race/{id}', 'RaceController@destroy');
        Route::post('admin/achievements', 'AchievementController@store');

    });

    Route::post('admin/register', 'AdminController@store');
    Route::post('admin/login', 'AdminController@login');

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@create');

    Route::get('races', 'RaceController@races');
    Route::get('race/{id}', 'RaceController@show');

