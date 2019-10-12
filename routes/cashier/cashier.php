<?php

/*
|--------------------------------------------------------------------------
| Cashier Routes
|--------------------------------------------------------------------------
|
| Here is where you can register cashier routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "cashier" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('cashier.login');
Route::post('login', 'Auth\LoginController@login')->name('cashier.login');
Route::post('logout', 'Auth\LoginController@logout')->name('cashier.logout');
Route::get('logout', 'Auth\LoginController@logout')->name('cashier.logout');

if(config('cashier_config.enable_registration')) {

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('cashier.register');
Route::post('register', 'Auth\RegisterController@register')->name('cashier.register');

}



// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('cashier.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('cashier.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('cashier.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('cashier.password.update');

Route::get('/dashboard', 'DashboardController@index')->name('cashier.dashboard');
Route::get('/', 'DashboardController@redirect')->name('cashier.redirect');

Route::get('edit-account-info', 'Auth\CashierAccountController@showAccountInfoForm')->name('cashier.account.info');
Route::post('edit-account-info', 'Auth\CashierAccountController@accountInfoForm')->name('cashier.account.info');
Route::get('change-password', 'Auth\CashierAccountController@showChangePasswordForm')->name('cashier.account.password');
Route::post('change-password', 'Auth\CashierAccountController@changePasswordForm')->name('cashier.account.password');

Route::get('/email/verify', 'Auth\VerificationController@show')->name('cashier.verification.notice');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('cashier.verification.verify');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('cashier.verification.resend');
