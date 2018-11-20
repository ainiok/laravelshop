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

Route::group([], function () {
    Route::get('/', 'Pchome\IndexController@index');
});

Route::group(['namespace' => 'Pchome'], function () {
    Route::get('login', 'LoginController@index')->name('login');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('login', 'AuthController@showLoginForm');
    Route::post('login', 'AuthController@login')->name('admin.login');
    Route::post('logout', 'AuthController@logout')->name('admin.logout');

    Route::get('user/list','UserController@index')->name('admin.user.index');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/console', 'AdminController@console')->name('admin.console');
    });
});