<?php

use Illuminate\Http\Request;

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

// Public API for Vuu.JS based front-end client (version 1)
Route::prefix('v1')->namespace('API\v1')->group(function() {
	Route::get('post', 'PostController@index');
	Route::get('post/{ID}', 'PostController@show');
});
