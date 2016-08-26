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

Route::get('/', ["uses"=>'HomeController@index','middleware'=>'throttle:60']);


/**
 * Frontend Access Controllers
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@getLogout');
    Route::get('/password/change', 'PasswordController@getChangePassword');

	Route::get('/my','UserController@index');

});

Route::group(['middleware' => 'guest'], function () use ($router) {
	Route::get("/login","AuthController@getLogin");
	Route::post("/login","AuthController@postLogin");
	Route::get("/register","AuthController@getRegister");
	Route::post("/register","AuthController@postRegister");

	Route::post("/verify_code","AuthController@verify_code");
});



//Route::post("upload","QiniuController@simditor_upload");
//Route::get("qiniu/token","QiniuController@token");

//Route::get("/captchaform" ,['as' => 'captchaform', 'uses' => 'GeeController@index']);
Route::get("/captcha" ,['as' => 'captcha', 'uses' => 'GeeController@captcha']);



