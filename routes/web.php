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
    Route::post('/admin/store', 'UserController@store')
        ->name('admin.store');
    Route::delete('/admin/user/delete/{id}', 'UserController@delete')
        ->name('user.delete');
    Route::get('/admin/detail/{id}', 'UserController@detail')
        ->name('admin.detail');

    //Management
    Route::get('/admin/management/index', 'ManagementController@index')
        ->name('admin-management.index');
    Route::get('/admin/management/create', 'ManagementController@create')
        ->name('admin-management.create');
    Route::post('/admin/management/store', 'ManagementController@store')
        ->name('admin-management.store');
    Route::get('/admin/management/detail/{id}', 'ManagementController@detail')
        ->name('admin-management.detail');

    //Cahiers
    Route::get('/admin/cashier/index', 'CashierController@index')
        ->name('admin-cashier.index');
    Route::get('/admin/cashier/detail/{id}', 'CashierController@detail')
        ->name('admin-cashier.detail');

    //Bssiness
    Route::get('/admin/business/index', 'BusinessController@index')
        ->name('admin-business.index');
    Route::get('/admin/business/detail/{id}', 'BusinessController@detail')
        ->name('admin-business.detail');
    
    //Barber
    Route::get('/admin/barber/index', 'BarberController@index')
        ->name('admin-barber.index');
    Route::get('/admin/barber/detail/{id}', 'BarberController@detail')
        ->name('admin-barber.detail');
});

Route::namespace('Management')->group(function () {

    Route::get('/management/dashboard', 'DashboardController@index')
        ->name('management.dashboard');

    //Profile
    Route::get('/management/profile', 'UserController@profile')
        ->name('management.profile');
    Route::put('/management/profile/edit/{id}', 'UserController@editProfile')
        ->name('management-profile.edit');

    //Transaction History
    Route::get('/management/trasaction/index', 'TransactionController@index')
        ->name('management-transaction.index');
    Route::get('/management/trasaction/detail/{id}', 'TransactionController@detail')
        ->name('management-transaction.detail');
    Route::post('/management/transaction/filter', 'TransactionController@filter')
        ->name('management-transaction.filter');
    Route::post('/management/transaction/search', 'TransactionController@search')
        ->name('management-transaction.search');
    Route::get('/management/transaction/export/', 'TransactionController@export')
        ->name('management-transaction.export');

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
    Route::post('management/product', 'ProductController@search')
        ->name('management-product.search');
    Route::get('/management/product/data', 'ProductController@data')
        ->name('management-product.data');
    Route::get('/management/product/create', 'ProductController@create')
        ->name('management-product.create');
    Route::post('/management/product/store', 'ProductController@store')
        ->name('management-product.store');
    Route::delete('/management/product/delete/{id}', 'ProductController@delete')
        ->name('management-product.delete');
    Route::get('/management/product/detail/{id}', 'ProductController@detail')
        ->name('management-product.detail');
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

    //Outlet
    Route::get('/management/outlet/index', 'OutletController@index')
        ->name('management-outlet.index');
    Route::get('/management/outlet/create', 'OutletController@create')
        ->name('management-outlet.create');
    Route::post('/management/outlet/store', 'OutletController@store')
        ->name('management-outlet.store');
    Route::delete('/management/outlet/delete/{id}', 'OutletController@delete')
        ->name('management-outlet.delete');
    Route::get('/management/outlet/edit/{id}', 'OutletController@edit')
        ->name('management-outlet.edit');
    Route::put('/management/outlet/update/{id}', 'OutletController@update')
        ->name('management-outlet.update');
    Route::get('/management/outlet/detail/{id}', 'OutletController@detail')
        ->name('management-outlet.detail');
    Route::get('/management/outlet/transactionDetail/{id}', 'OutletController@transactionDetail')
        ->name('management-outlet.transactionDetail');

    // Barber
    Route::get('/management/barber/index', 'BarberController@index')
        ->name('management-barber.index');
    Route::get('/management/barber/create', 'BarberController@create')
        ->name('management-barber.create');
    Route::post('/management/barber/create/store', 'BarberController@store')
        ->name('management-barber-create.store');
    Route::delete('/management/barber/delete/{id}', 'BarberController@delete')
        ->name('management-barber.delete');
    Route::get('/management/barber/edit/{id}', 'BarberController@edit')
        ->name('management-barber.edit');
    Route::put('/management/barber/update/{id}', 'BarberController@update')
        ->name('management-barber.update');
});

Route::namespace('Cashier')->group(function(){

    Route::get('/cashier/dashboard', 'DashboardController@index')
        ->name('cashier.dashboard');

    //Transaksi
    Route::get('/cashier/transaction/index', 'TransactionController@index')
        ->name('cashier-transaction.index');
    Route::get('/cashier/transaction/data', 'TransactionController@data')
        ->name('cashier-transaction.data');
    Route::post('/cashier/transaction/invoice', 'TransactionController@invoice')
        ->name('cashier-transaction.invoice');
    Route::post('/cashier/transaction/store', 'TransactionController@store')
        ->name('cashier-transaction.store');
    Route::get('/cashier/transaction/print', 'TransactionController@print')
        ->name('cashier-transaction.print');

    //Stok Masuk
    Route::get('/cashier/stock/index', 'StockController@index')
        ->name('cashier-stock.index');
    Route::get('/cashier/stock/create', 'StockController@create')
        ->name('cashier-stock.create');
    Route::post('/cashier/stock/store', 'StockController@store')
        ->name('cashier-stock.store');
    Route::get('/cashier/stock/detail/{id}', 'StockController@detail')
        ->name('cashier-stock.detail');

    //History
    Route::get('/cashier/history/index', 'HistoryController@index')
        ->name('cashier-history.index');
    Route::get('/cashier/history/detail/{id}', 'HistoryController@detail')
        ->name('cashier-history.detail');

});
