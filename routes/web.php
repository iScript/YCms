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

Route::get('/', ["uses"=>'HomeController@index','middleware'=>'throttle:60'])->name('home');

Route::get('/test', 'HomeController@test');
Route::get('/test2', 'HomeController@test2');
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




/**
 * Backend Routes
 * Namespaces indicate folder structure
 * Admin middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => ['admin']], function () {
    
    //Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/', 'DashboardController@index')->name('home.index');

    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::get('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@permissions']);
    Route::post('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@storePermissions']);
    Route::resource('permission', 'PermissionController');
    Route::resource('article', 'ArticleController');
    Route::resource('article_category', 'Article_categoryController');
    Route::resource('product_category', 'Product_categoryController');
    Route::resource('product', 'ProductController');
});



Route::post("upload","QiniuController@simditor_upload");
Route::get("qiniu/token","QiniuController@token");

Route::get("/captchaform" ,['as' => 'captchaform', 'uses' => 'GeeController@index']);
Route::get("/captcha" ,['as' => 'captcha', 'uses' => 'GeeController@captcha']);
Route::post("/captchacheck" ,['as' => 'captchacheck', 'uses' => 'GeeController@check']);
