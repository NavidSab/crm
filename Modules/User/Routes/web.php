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

Route::prefix('user')->group(function() {
    Route::get('/', 'RolePermissionController@index')->name('user');
    Route::get('/{id}', 'RolePermissionController@show')->name('user.show');
    Route::get('/create', 'RolePermissionController@create')->name('user.create');
    Route::get('/{id}/edit', 'RolePermissionController@store')->name('user.edit');
    Route::post('/', 'RolePermissionController@store')->name('user.store');
    Route::delete('/{id}', 'RolePermissionController@destroy')->name('user.destroy');
    Route::put('/update', 'RolePermissionController@update')->name('user.update');
});


