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
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkAdmin']], function () {
    Route::get('/', 'Admin\DashBoard\indexController@index')->name('dashboardHome');
    Route::resource('user', 'Admin\Users\userController');
    Route::resource('driver', 'Admin\Users\DriverController');
    Route::resource('store', 'Admin\Users\StoreController');
    

});
