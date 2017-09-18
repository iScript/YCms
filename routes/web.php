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

Route::get('/', ["uses"=>'HomeController@index','middleware'=>'throttle:60']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@getLogout');
    Route::get('/password/change', 'PasswordController@getChangePassword');

    Route::get('/my','UserController@index');

});


Route::group(['middleware' => 'guest'], function () use ($router) {
//    Route::get("/login","AuthController@getLogin");
//    Route::post("/login","AuthController@postLogin");
//    Route::get("/register","AuthController@getRegister");
//    Route::post("/register","AuthController@postRegister");
//
//    Route::post("/verify_code","AuthController@verify_code");
});