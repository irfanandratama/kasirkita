<?php

/*
|--------------------------------------------------------------------------
| Management Routes
|--------------------------------------------------------------------------
|
| Here is where you can register management routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "management" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('management.login');
Route::post('login', 'Auth\LoginController@login')->name('management.login');
Route::post('logout', 'Auth\LoginController@logout')->name('management.logout');
Route::get('logout', 'Auth\LoginController@logout')->name('management.logout');

if(config('management_config.enable_registration')) {

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('management.register');
Route::post('register', 'Auth\RegisterController@register')->name('management.register');

}



// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('management.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('management.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('management.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('management.password.update');

Route::get('/dashboard', 'DashboardController@index')->name('management.dashboard');
Route::get('/', 'DashboardController@redirect')->name('management.redirect');

Route::get('edit-account-info', 'Auth\ManagementAccountController@showAccountInfoForm')->name('management.account.info');
Route::post('edit-account-info', 'Auth\ManagementAccountController@accountInfoForm')->name('management.account.info');
Route::get('change-password', 'Auth\ManagementAccountController@showChangePasswordForm')->name('management.account.password');
Route::post('change-password', 'Auth\ManagementAccountController@changePasswordForm')->name('management.account.password');

Route::get('/email/verify', 'Auth\VerificationController@show')->name('management.verification.notice');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('management.verification.verify');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('management.verification.resend');
