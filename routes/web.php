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
    return view('home');
});

// Authentication users
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('showRegister');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/auth/verify', 'Auth\RegisterController@showVerification')->name('showVerification')->middleware(\App\Http\Middleware\CheckVerifyRequest::class);
Route::get('/auth/verify/{id}/{pin}', 'Auth\RegisterController@verifyAccount');
Route::post('/auth/verify', 'Auth\RegisterController@doVerification');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/logout', 'Auth\LoginController@logout')->name('logout');


// Ads
Route::get('/ads/all', 'AdsController@showAllAds');
Route::get('/profile', 'AdsController@showAllAds')->middleware('auth');

//Admin
Route::prefix('admin')->group(function (){
	Route::get('login', 'Auth\AdminController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\AdminController@login')->name('admin.auth.login');
});