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

Route::prefix('menu')->group(function() {
    Route::get('', 'MenuController@index')->name('user');
    Route::get('{id}', 'MenuController@show')->name('user.show')->where('id', '[0-9]+');
    Route::get('create', 'MenuController@create')->name('user.create');
    Route::get('{id}/edit', 'MenuController@edit')->name('user.edit')->where('id', '[0-9]+');
    Route::post('', 'MenuController@store')->name('user.store');
    Route::post('{id}/destroy', 'MenuController@destroy')->name('user.destroy')->where('id', '[0-9]+');
    Route::put('update', 'MenuController@update')->name('user.update');
});

