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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'Admin'],function(){
    Route::group(['prefix'=>'Account'],function(){
        
        Route::get('list','AccountController@getlist');
        Route::get('add','AccountController@getadd');
        Route::post('add','AccountController@postadd');
        Route::get('edit/{id}','AccountController@getedit');
        Route::post('edit/{id}','AccountController@postedit');
        Route::get('remove/{ID}','AccountController@getremove');
        Route::post('search','AccountController@postseach');
        Route::get('getseach','AccountController@getseach');
    });
});