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

    //User Management
    Route::get('/admin/user/index', 'UserController@index')
        ->name('admin.user.index');
    Route::get('/admin/user/create', 'UserController@create')
        ->name('user.create');
    Route::delete('/admin/user/delete/{id}', 'UserController@delete')
        ->name('user.delete');
});

Route::namespace('Management')->group(function () {

    Route::get('/management/dashboard', 'DashboardController@index')
        ->name('management.dasboard');

    //Profile
    Route::get('/management/profile', 'UserController@profile')
        ->name('management.profile');
    Route::put('/management/profile/edit/{id}', 'UserController@editProfile')
        ->name('management-profile.edit');

    //Cashier Management
    Route::get('/management/cashier/index', 'UserController@index')
        ->name('management-cashier.index');
    Route::get('/management/cashier/create', 'UserController@create')
        ->name('management-cashier.create');
    Route::post('/management/cashier/create/store', 'UserController@store')
        ->name('management-cashier-create.store');
    Route::delete('/management/cashier/delete/{id}', 'UserController@delete')
        ->name('management-cashier.delete');
});

Route::namespace('Cashier')->group(function(){

    Route::get('/cashier/dashboard', 'DashboardController@index')
        ->name('cashier.dashboard');
});