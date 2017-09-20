<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::group(['namespace' => 'Api'], function () {


    //API接口版本V1
    Route::group(['namespace' => 'V1', 'prefix' => 'v1'], function () {
        //测试接口页面

        Route::resource('/article', 'ArticleController');


        Route::post("/qiniu/upload", "QiniuController@upload");


    });

});