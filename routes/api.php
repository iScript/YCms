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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::options('{all}',function(){
    exit;
});
Route::group(['middleware' => ["enable.cors:*"]], function () {

    Route::get("test","Api\TestController@index");
    Route::get("test2","Api\TestController@index2");
    Route::post("test2","Api\TestController@index2");
    Route::put("test2","Api\TestController@index2");
});

