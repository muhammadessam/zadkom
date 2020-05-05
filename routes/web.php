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


Route::get('/', 'Site\Home\IndexController@Home')->name('index');

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('driver_orders/{id}', 'Admin\Users\DriverController@driverOrders')->name('driver_orders');
    Route::get('driver_active/{id}', 'Admin\Users\DriverController@changeActive')->name('driver_active');
    Route::get('all-contacts',function()
    {
        return view('Admin.contacts');
    })->name('all-contacts');
    Route::get('/', 'Admin\DashBoard\IndexController@index')->name('dashboardHome');
    Route::get('settings','SettingController@edit')->name('settings.edit');
    Route::post('settingsSave','SettingController@save')->name('settings_save');
    /* the user routes */
    Route::group(['prefix' => 'users'], function () {

        /*drivers Route and filtering*/
        Route::resource('driver', 'Admin\Users\DriverController');
        Route::get('{driver}/addCar', 'Admin\Users\DriverController@addCar')->name('addDriverCarForm');

        Route::resource('store', 'Admin\Users\StoreController');

        Route::resource('customer', 'Admin\Users\CustomerController', ['parameters' => [
            'customer' => 'user'
        ]]);
        Route::resource('admins', 'Admin\Users\AdminController');
    });

    /*Products*/
    Route::group(['prefix' => 'products'], function () {
        Route::resource('product', 'Admin\Products\ProductController');
    });

    /*Offers*/
    Route::group(['prefix' => 'offers'], function () {
        Route::resource('offer', 'Admin\Offers\OfferController');
        Route::get('{order}/addOffer', 'Admin\Orders\OrderController@addOffer')->name('addOrderOffer');
    });

    /*orders*/
    Route::group(['prefix' => 'orders'], function () {
        Route::resource('order', 'Admin\Orders\OrderController');
    });
    // Pages
    Route::resource('pages','PageController');

    Route::prefix('cars')->group(function () {
        Route::resource('car', 'Admin\Cars\CarController');
    });
    Route::prefix('ratings')->group(function () {
        Route::resource('rating', 'Admin\Ratings\RatingController');
        Route::get('{driver}/addRating', 'Admin\Ratings\RatingController@addDriverRating')->name('addDriverRating');

    });

    Route::resource('nots', 'NotController');

    Route::post('/adminLogout', 'Auth\AdminLoginController@adminLogout')->name('AdminLogout');
});

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('admin.form');
    Route::post('/admin/login', 'Auth\AdminLoginController@adminLogin')->name('admin.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store', function () {
    return view('site.store');
})->name('store');
Route::resource('profile', 'Site\User\ProfileController');

Route::get('/nots', function () {
    return view('site.nots');
})->name('nots');
Route::get('/page/{id}','PageController@show')->name('page');

// Contact
Route::get('contact',function()
{
   return view('site.contact');
})->name('contact');
Route::post('make-contact','ContactController@store')->name('make-contact');
Route::post('send-mail','ContactController@send')->name('send-mail');
