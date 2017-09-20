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


Route::get('login', 'AuthController@getLogin')->name('admin.login');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');



Route::group(['middleware' => ['admin:admin']], function () {

    //Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/', 'DashboardController@index')->name('home.index');

    Route::resource('user', 'UserController');
    Route::resource('admin_user', 'AdminUserController');
    Route::resource('role', 'RoleController');
    Route::get('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@permissions']);
    Route::post('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@storePermissions']);
    Route::resource('permission', 'PermissionController');

    Route::resource('article', 'ArticleController');
    Route::resource('article_category', 'ArticleCategoryController');

});
