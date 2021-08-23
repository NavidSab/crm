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

Route::prefix('college')->group(function() {
    Route::get('', 'CollegeController@index')->name('college');
    Route::get('{id}', 'CollegeController@show')->name('college.show')->where('id', '[0-9]+');
    Route::get('create', 'CollegeController@create')->name('college.create');
    Route::get('{id}/edit', 'CollegeController@edit')->name('college.edit')->where('id', '[0-9]+');
    Route::post('', 'CollegeController@store')->name('college.store');
    Route::post('{id}/destroy', 'CollegeController@destroy')->name('college.destroy')->where('id', '[0-9]+');
    Route::post('update', 'CollegeController@update')->name('college.update');
});