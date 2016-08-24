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
    Route::get('auth/logout', 'AuthController@getLogout');
    Route::get('auth/password/change', 'PasswordController@getChangePassword');
});

Route::group(['middleware' => 'guest'], function () use ($router) {

	Route::get("/auth/login","AuthController@getLogin");
	Route::post("/auth/login","AuthController@postLogin");
	Route::get("/auth/register","AuthController@getRegister");
	Route::post("/auth/register","AuthController@getRegister");
    //隐式控制器
    //Route::controller('auth', 'AuthController');
    //Route::controller('password', 'PasswordController');
});






Route::post("upload","QiniuController@simditor_upload");
Route::get("qiniu/token","QiniuController@token");

Route::get("/captchaform" ,['as' => 'captchaform', 'uses' => 'GeeController@index']);
Route::get("/captcha" ,['as' => 'captcha', 'uses' => 'GeeController@captcha']);
Route::post("/captchacheck" ,['as' => 'captchacheck', 'uses' => 'GeeController@check']);


