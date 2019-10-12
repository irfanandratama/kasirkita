<?php

/*
|--------------------------------------------------------------------------
| Manejeman Routes
|--------------------------------------------------------------------------
|
| Here is where you can register manejeman routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "manejeman" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('manejeman.login');
Route::post('login', 'Auth\LoginController@login')->name('manejeman.login');
Route::post('logout', 'Auth\LoginController@logout')->name('manejeman.logout');
Route::get('logout', 'Auth\LoginController@logout')->name('manejeman.logout');

if(config('manejeman_config.enable_registration')) {

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('manejeman.register');
Route::post('register', 'Auth\RegisterController@register')->name('manejeman.register');

}



// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('manejeman.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('manejeman.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('manejeman.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('manejeman.password.update');

Route::get('/dashboard', 'DashboardController@index')->name('manejeman.dashboard');

Route::get('edit-account-info', 'Auth\ManejemanAccountController@showAccountInfoForm')->name('manejeman.account.info');
Route::post('edit-account-info', 'Auth\ManejemanAccountController@accountInfoForm')->name('manejeman.account.info');
Route::get('change-password', 'Auth\ManejemanAccountController@showChangePasswordForm')->name('manejeman.account.password');
Route::post('change-password', 'Auth\ManejemanAccountController@changePasswordForm')->name('manejeman.account.password');

Route::get('/email/verify', 'Auth\VerificationController@show')->name('manejeman.verification.notice');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('manejeman.verification.verify');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('manejeman.verification.resend');
