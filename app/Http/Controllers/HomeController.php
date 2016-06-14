<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Response;

use Redis;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        return view('home.index');
    }


    public function test2(){
        //print_r($_COOKIE);

    }

    public function test(){

    }
  

}


