<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::middleware(['auth'])->name('product.')->group(function () {
    Route::get('product/{id}/show', 'ProductController@show')->name('show');
    Route::post('buy', 'ProductController@buy')->name('buy');
    Route::get('history', 'ProductController@history')->name('history');
    Route::get('/', 'ProductController@index')->name('index');
});
