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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')
    ->name('home');

Route::namespace('Auth')->group(function () {

    Route::post('/daftar', 'RegisterController@registerManagement')
        ->name('daftar');

    Route::post('/admin/masuk', 'LoginController@adminLogin')
        ->name('admin.masuk');
});

Route::namespace('Admin')->group(function () {

    Route::get('/admin/dashboard', 'DashboardController@index')
        ->name('admin.dasboard');

    //Profile
    Route::get('/admin/profile', 'UserController@profile')
        ->name('admin.profile');
    Route::put('/admin/profile/edit/{id}', 'UserController@editProfile')
        ->name('admin.profile.edit');

    //Admins
    Route::get('/admin/index', 'UserController@index')
        ->name('admin.index');
    Route::get('/admin/create', 'UserController@create')
        ->name('admin.create');
        Route::get('/admin/store', 'UserController@store')
        ->name('admin.store');
    Route::delete('/admin/user/delete/{id}', 'UserController@delete')
        ->name('user.delete');
});

Route::namespace('Management')->group(function () {

    Route::get('/management/dashboard', 'DashboardController@index')
        ->name('management.dashboard');

    //Profile
    Route::get('/management/profile', 'UserController@profile')
        ->name('management.profile');
    Route::put('/management/profile/edit/{id}', 'UserController@editProfile')
        ->name('management-profile.edit');

    //Cashier Management
    Route::get('/management/cashier/index', 'CashierController@index')
        ->name('management-cashier.index');
    Route::get('/management/cashier/create', 'CashierController@create')
        ->name('management-cashier.create');
    Route::post('/management/cashier/create/store', 'CashierController@store')
        ->name('management-cashier-create.store');
    Route::delete('/management/cashier/delete/{id}', 'CashierController@delete')
        ->name('management-cashier.delete');
    Route::get('/management/cashier/edit/{id}', 'CashierController@edit')
        ->name('management-cashier.edit');
    Route::put('/management/cashier/update/{id}', 'CashierController@update')
        ->name('management-cashier.update');

    //Product
    Route::get('/management/product/index', 'ProductController@index')
        ->name('management-product.index');
    Route::get('/management/product/create', 'ProductController@create')
        ->name('management-product.create');
    Route::post('/management/product/store', 'ProductController@store')
        ->name('management-product.store');
    Route::delete('/management/product/delete/{id}', 'ProductController@delete')
        ->name('management-product.delete');
    Route::get('/management/product/edit/{id}', 'ProductController@edit')
        ->name('management-product.edit');
    Route::put('/management/product/update/{id}', 'ProductController@update')
        ->name('management-product.update');

    //Kategori Produk
    Route::get('/management/kategori-produk/index', 'CategoryProductController@index')
        ->name('management-category-product.index');
    Route::get('/management/kategori-produk/create', 'CategoryProductController@create')
        ->name('management-category-product.create');
    Route::post('/management/kategori-produk/store', 'CategoryProductController@store')
        ->name('management-category-product.store');
    Route::delete('/management/kategori-produk/delete/{id}', 'CategoryProductController@delete')
        ->name('management-category-product.delete');
    Route::get('/management/kategori-produk/edit/{id}', 'CategoryProductController@edit')
        ->name('management-category-product.edit');
    Route::put('/management/kategori-produk/update/{id}', 'CategoryProductController@update')
        ->name('management-category-product.update');
});

Route::namespace('Cashier')->group(function(){

    Route::get('/cashier/dashboard', 'DashboardController@index')
        ->name('cashier.dashboard');
});