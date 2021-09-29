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

Route::prefix('payment')->group(function() {
    Route::get('/', 'PaymentController@index')->name('payment');
    Route::get('payment', 'PaymentController@payment')->name('payment.gatway');
    Route::get('cancel', 'PaymentController@cancel')->name('payment.cancel');
    Route::get('payment/success', 'PaymentController@success')->name('payment.success');
});
