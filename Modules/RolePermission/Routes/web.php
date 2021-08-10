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

Route::prefix('rolepermission')->group(function() {
    Route::get('', 'RolePermissionController@index')->name('rolepermission');
    Route::get('{id}', 'RolePermissionController@show')->name('rolepermission.show')->where('id', '[0-9]+');
    Route::get('create', 'RolePermissionController@create')->name('rolepermission.create');
    Route::get('{id}/edit', 'RolePermissionController@edit')->name('rolepermission.edit')->where('id', '[0-9]+');
    Route::post('', 'RolePermissionController@store')->name('rolepermission.store');
    Route::post('{id}/destroy', 'RolePermissionController@destroy')->name('rolepermission.destroy')->where('id', '[0-9]+');
    Route::post('update', 'RolePermissionController@update')->name('rolepermission.update');    
});

