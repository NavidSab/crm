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
    Route::get('/','MenuController@index')->name('menu');
    Route::post('updateitem', 'MenuController@updateitem')->name('hupdateitem'); 
    Route::post('addcustommenu', 'MenuController@addcustommenu')->name('haddcustommenu'); 
    Route::post('generatemenucontrol', 'MenuController@generatemenucontrol')->name('hgeneratemenucontrol'); 
    Route::post('deleteitemmenu', 'MenuController@deleteitemmenu')->name('hdeleteitemmenu'); 
    Route::post('deletemenug', 'MenuController@deletemenug')->name('hdeletemenug'); 
    Route::post('createnewmenu', 'MenuController@createnewmenu')->name('hcreatenewmenu'); 

});

// Route::group(['middleware' => config('menu.middleware')], function () {
//     $path = rtrim(config('menu.route_path'));
//     Route::post( 'menu/addcustommenu', 'MenuController@addcustommenu')->name('haddcustommenu');
//     Route::post($path . '/deleteitemmenu', 'MenuController@deleteitemmenu')->name('hdeleteitemmenu');  
//     Route::post($path . '/deletemenug', 'MenuController@deletemenug')->name('hdeletemenug');   
//     Route::post($path . '/createnewmenu', 'MenuController@createnewmenu')->name('hcreatenewmenu'); 
//     Route::post($path . '/generatemenucontrol', 'MenuController@generatemenucontrol')->name('hgeneratemenucontrol');  
//     Route::post('menu/updateitem', 'MenuController@updateitem')->name('hupdateitem');   
// });