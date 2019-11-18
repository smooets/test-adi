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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

// Social Auth
Route::prefix('auth')->name('auth.')->group(function () {
    Route::prefix('facebook')->name('facebook.')->group(function () {
        Route::get('callback', 'SocialAuthController@facebookCallback')->name('callback');
        Route::get('redirect', 'SocialAuthController@facebookRedirect')->name('redirect');
    });
    Route::prefix('google')->name('google.')->group(function () {
        Route::get('callback', 'SocialAuthController@googleCallback')->name('callback');
        Route::get('redirect', 'SocialAuthController@googleRedirect')->name('redirect');
    });
});
