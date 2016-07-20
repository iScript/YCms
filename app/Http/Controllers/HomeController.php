<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Response;
use \Request;
use Redis;
use App\Jobs\Test;

use App\Helpers\JWT;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $str = rand(100,500);
//        echo $str;
//        $job = (new Test($str))->onQueue("test2");;$this->dispatch($job);

        //exit;
       // return;
        //echo json_encode($_SERVER["x-token"]);exit;
        // set/get 操作
//        Redis::set("set","test");
//        echo Redis::get("set");
//
//        //setex set一个存储时效
//         Redis::setex ( 'str' ,  10 ,  'bar' ) ;  //表示存储有效期为10秒
//
//        // set if no exist
//        Redis::setnx("foo",12);
//        Redis::setnx("foo",13);
//
//        //先get后set
//        echo Redis::getset("foo",17);
//
//        //
//        $isExist = Redis::exists("foo");
//        var_dump($isExist);
//
//
//        Redis::rpush("aList","test111");
//
//        exit;
        return response()->json(["asdf"=>view('home.index')->render()]);
    }


    public function test2(){

    }

    public function test(){

        $token = JWT::createTokenByUid(45);
        echo $token ;


        $str = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjU3ODVlODI3ODhmMDYifQ.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLmNvbSIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUub3JnIiwianRpIjoiNTc4NWU4Mjc4OGYwNiIsImlhdCI6MTQ2ODM5MzUxMSwiZXhwIjoxNDY4MzkzNjMxLCJ1aWQiOjQ1fQ.O9-hI4J1pYIkUFfTjvSbvFkkx_KJTXeMxj9s7qCoR8o";

        $token = JWT::checkToken($str);
        //echo $token;

    }
  

}


