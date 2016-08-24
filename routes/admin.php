<?php

Route::get('/testadmin', 'HomeController@test3');

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
