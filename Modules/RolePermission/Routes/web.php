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
    Route::get('/', 'RolePermissionController@index')->name('rolepermission');
    Route::post('/', 'RolePermissionController@store')->name('rolepermission.store');
    Route::delete('/{id}', 'RolePermissionController@destroy')->name('rolepermission.destroy');
    Route::get('/{id}', 'RolePermissionController@show')->name('rolepermission.show');
    Route::put('/', 'RolePermissionController@update')->name('rolepermission.update');
});


