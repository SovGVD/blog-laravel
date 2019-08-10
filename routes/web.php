<?php

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

Auth::routes(['register' => false]);

Route::get('/post/{ID}', 'IndexController@index');
Route::get('/{page}', 'IndexController@index');
Route::get('/', 'IndexController@index');

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('post', 'PostController');
});
