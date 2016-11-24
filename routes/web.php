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
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');

    Auth::routes();

});

//Only when logged in
Route::group(['middleware' => 'auth'], function () {
    //Logout function
    Route::get('/logout', 'HomeController@logout');

    //beheer pagina
    Route::get('/beheer',['uses' => 'AdminController@getData','middleware' => 'roles','roles' => [1]]);

    //User updates-inserts
    Route::get('/edit_user/{id}',['uses' => 'AdminController@getUser','middleware' => 'roles','roles' => [1,2] ]);
    Route::get('/edit_user',['uses' => 'AdminController@editUser','middleware' => 'roles','roles' => [1] ]);
    Route::get('/new_user',['uses' => 'AdminController@newUser','middleware' => 'roles','roles' => [1] ]);
    Route::get('/new_user',['uses' => 'AdminController@insertUser','middleware' => 'roles','roles' => [1] ]);


    //Employees updates-inserts
    Route::get('/edit_employee/{id}',['uses' => 'AdminController@getEmployee','middleware' => 'roles','roles' => [1] ]);
    Route::Post('/edit_employee',['uses' => 'AdminController@editEmployee','middleware' => 'roles','roles' => [1] ]);
    Route::get('/new_employee',['uses' => 'AdminController@newEmployee','middleware' => 'roles','roles' => [1] ]);
    Route::Post('/new_employee',['uses' => 'AdminController@insertEmployee','middleware' => 'roles','roles' => [1] ]);

    //Voertuig updates-inserts
    Route::get('/edit_voertuig/{kenteken}',['uses' => 'AdminController@getVoertuig','middleware' => 'roles','roles' => [1] ]);
    Route::Post('/edit_voertuig',['uses' => 'AdminController@editVoertuig','middleware' => 'roles','roles' => [1] ]);
    Route::get('/new_voertuig',['uses' => 'AdminController@newVoertuig','middleware' => 'roles','roles' => [1] ]);
    Route::Post('/new_voertuig',['uses' => 'AdminController@insertVoertuig','middleware' => 'roles','roles' => [1] ]);

    //Lespakket updates-inserts
    Route::get('/edit_lespakket/{id}',['uses' => 'AdminController@getLespakket','middleware' => 'roles','roles' => [1] ]);
    Route::Post('/edit_lespakket',['uses' => 'AdminController@editLespakket','middleware' => 'roles','roles' => [1] ]);
    Route::get('/new_lespakket',['uses' => 'AdminController@newLespakket','middleware' => 'roles','roles' => [1] ]);
    Route::Post('/new_lespakket',['uses' => 'AdminController@insertLespakket','middleware' => 'roles','roles' => [1] ]);
});
