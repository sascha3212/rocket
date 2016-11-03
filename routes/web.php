<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');

    Route::get('session/get', 'SessionController@accessSessionData');
    Route::get('session/set', 'SessionController@storeSessionData');
    Route::get('session/remove', 'SessionController@deleteSessionData');
});

//Only when logged in
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');

    Route::get('logout', 'HomeController@logout');
});
