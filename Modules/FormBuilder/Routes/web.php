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


Route::prefix('formbuilder')->group(function() {
    Route::get('', 'FormBuilderController@index')->name('form');
    Route::get('{id}', 'FormBuilderController@show')->name('form.show')->where('id', '[0-9]+');
    Route::get('create', 'FormBuilderController@create')->name('form.create');
    Route::get('formItem/{id}', 'FormBuilderController@formItem')->name('formItem.create')->where('id', '[0-9]+');
    Route::get('createItem/{id}', 'FormBuilderController@createItem')->name('form.createItem')->where('id', '[0-9]+');
    Route::get('{id}/edit', 'FormBuilderController@edit')->name('form.edit')->where('id', '[0-9]+');
    Route::post('', 'FormBuilderController@store')->name('form.store');
    Route::post('formItem', 'FormBuilderController@storeItem')->name('formItem.store');
    Route::post('{id}/destroy', 'FormBuilderController@destroy')->name('form.destroy')->where('id', '[0-9]+');
    Route::post('{id}/destroyItem', 'FormBuilderController@destroyItem')->name('formItem.destroy')->where('id', '[0-9]+');
    Route::post('update', 'FormBuilderController@update')->name('form.update');
});