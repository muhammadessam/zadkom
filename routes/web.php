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

Route::get('/', function () {
    return view('site.home');
});

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkAdmin']], function () {

    Route::get('/', 'Admin\DashBoard\indexController@index')->name('dashboardHome');

    /* the user routes */
    Route::group(['prefix' => 'users'], function () {
        Route::resource('driver', 'Admin\Users\DriverController');
        Route::resource('user', 'Admin\Users\userController');
        Route::resource('store', 'Admin\Users\StoreController');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::resource('product', 'Admin\Products\ProductController');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store',function()
{
    return view('site.store');
})->name('store');