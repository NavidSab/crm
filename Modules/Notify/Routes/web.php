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

Route::prefix('notify')->group(function() {
    Route::get('/', 'NotifyController@index')->name('notify');
    Route::post('/push','NotifyController@store');
    Route::get('/push','NotifyController@push')->name('push');


});
