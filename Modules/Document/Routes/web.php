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

Route::prefix('document')->group(function() {
    Route::get('', 'DocumentController@index')->name('document');
    Route::get('{id}', 'DocumentController@show')->name('document.show')->where('id', '[0-9]+');
    Route::get('create', 'DocumentController@create')->name('document.create');
    Route::get('{id}/edit', 'DocumentController@edit')->name('document.edit')->where('id', '[0-9]+');
    Route::post('', 'DocumentController@store')->name('document.store');
    Route::post('{id}/destroy', 'DocumentController@destroy')->name('document.destroy')->where('id', '[0-9]+');
    Route::post('update', 'DocumentController@update')->name('document.update');
});
