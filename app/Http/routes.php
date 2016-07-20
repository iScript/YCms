<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// 全局中间件 位于Http/Kernel
// 


Route::get('/', 'HomeController@index')->name('home');

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

    //隐式控制器
    Route::controller('auth', 'AuthController');
    Route::controller('password', 'PasswordController');
});




/**
 * Backend Routes
 * Namespaces indicate folder structure
 * Admin middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => ['auth']], function () {
    
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    Route::resource('user', 'UserController');
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

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


Route::resource('testssds', 'testssdController');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/home', 'HomeController@index');

Route::resource('test2s', 'test2Controller');