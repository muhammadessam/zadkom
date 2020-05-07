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
    Route::get('all-contacts', function () {
        return view('Admin.contacts');
    })->name('all-contacts');
    Route::get('/', 'Admin\DashBoard\IndexController@index')->name('dashboardHome');
    Route::get('settings', 'SettingController@edit')->name('settings.edit');
    Route::post('settingsSave', 'SettingController@save')->name('settings_save');
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
    Route::resource('pages', 'PageController');

    Route::prefix('cars')->group(function () {
        Route::resource('car', 'Admin\Cars\CarController');
        // select2 route to get the cars
        Route::get('/cars/getCarModel/{carMake}', 'Admin\Cars\CarController@getCarModel')->name('getCarModel');
        // main index for car make
        Route::get('/getAllCarsMake', 'Admin\Cars\CarController@getAllCarsMake')->name('get.cars.make');

        // add and delete for car make
        Route::get('/addCarMake', 'Admin\Cars\CarController@addCarMainGet')->name('add.car.main.get');
        Route::post('/addCarMake', 'Admin\Cars\CarController@addCarMainPost')->name('add.car.main.post');
        Route::delete('/destroyCarkMake/{carmake}', 'Admin\Cars\CarController@destroyCarMake')->name('delete.car.make');

        // add and delete for car model
        Route::get('/addCarModel/{carMake}', 'Admin\Cars\CarController@addCarSubGet')->name('add.car.sub.get');
        Route::post('/addCarModel/{carMake}', 'Admin\Cars\CarController@addCarSubPost')->name('add.car.sub.post');
        Route::delete('/destroyCarkModel/{carModel}', 'Admin\Cars\CarController@destroyCarModel')->name('delete.car.model');

    });

    Route::prefix('BankAccounts')->group(function () {
        Route::resource('BankAccount', 'Admin\BankAccounts\BankAccountController');

        Route::get('addDriverBankAccount/{driver}', 'Admin\BankAccounts\BankAccountController@addDriverBankAccountGet')->name('add.bank.driver.get');
        Route::get('editDriverBankAccount/{driver}', 'Admin\BankAccounts\BankAccountController@editDriverBankAccountGet')->name('edit.bank.driver.get');
        Route::post('addDriverBankAccount/{driver}', 'Admin\BankAccounts\BankAccountController@addDriverBankAccountPost')->name('add.bank.driver.post');
        Route::patch('editDriverBankAccount/{bankAccount}', 'Admin\BankAccounts\BankAccountController@editDriverBankAccountPost')->name('edit.bank.driver.post');

    });


    Route::prefix('ratings')->group(function () {

        Route::resource('driverRating', 'Admin\Ratings\CustomerRatsDriversController');
        Route::get('{driver}/addDriverRating', 'Admin\Ratings\CustomerRatsDriversController@addDriverRating')->name('addDriverRating');

        Route::resource('customerRating', 'Admin\Ratings\DriverRatsCustomerController');
        Route::get('{user}/addCustomerRating', 'Admin\Ratings\DriverRatsCustomerController@addCustomerRating')->name('addCustomerRating');

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
Route::get('/page/{id}', 'PageController@show')->name('page');

// Contact
Route::get('contact', function () {
    return view('site.contact');
})->name('contact');
Route::post('make-contact', 'ContactController@store')->name('make-contact');
Route::post('send-mail', 'ContactController@send')->name('send-mail');
//Reports
Route::resource('report', 'ReportControlelr');
//create driver and store
Route::get('make_driver','UserDriverController@make')->name('make_driver');
Route::post('make_driver','UserDriverController@new')->name('new_driver');
Route::get('make_store','UserStoreController@make')->name('make_store');
Route::post('make_store','UserStoreController@new')->name('new_store');
//Address
Route::get('create_country','AddressController@createCountry')->name('create_country');
Route::get('store_country','AddressController@storeCountry')->name('store_country');
Route::get('create_city','AddressController@createCity')->name('create_city');
Route::get('store_city','AddressController@storeCity')->name('store_city');
Route::get('create_state','AddressController@createState')->name('create_state');
Route::get('store_state','AddressController@storeState')->name('store_state');