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

Route::prefix('program')->group(function() {
    Route::get('', 'ProgramController@index')->name('program');
    Route::get('{id}', 'ProgramController@show')->name('program.show')->where('id', '[0-9]+');
    Route::get('create', 'ProgramController@create')->name('program.create');
    Route::get('{id}/edit', 'ProgramController@edit')->name('program.edit')->where('id', '[0-9]+');
    Route::post('', 'ProgramController@store')->name('program.store');
    Route::post('{id}/destroy', 'ProgramController@destroy')->name('program.destroy')->where('id', '[0-9]+');
    Route::post('update', 'ProgramController@update')->name('program.update');
});