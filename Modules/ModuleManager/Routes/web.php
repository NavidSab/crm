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

Route::prefix('module')->group(function() {
    Route::get('', 'ModuleManagerController@index')->name('module');
    Route::post('update', 'ModuleManagerController@update')->name('module.update');
    Route::get('create', 'ModuleManagerController@create')->name('module.create');
    Route::post('', 'ModuleManagerController@store')->name('module.store');

});



