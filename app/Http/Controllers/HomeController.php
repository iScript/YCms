<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Response;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //echo bcrypt("123456");
//        //PhpSms::make()->to('1828****349')->template('Luosimao', 'xxx')->data(['12345', 5])->send();
//        $aa = \PhpSms::make()->to('15167895272')->content('【微团公司】亲爱的张三，欢迎访问，祝你工作愉快。')->send();
//        var_dump($aa);
//        $enable = \PhpSms::queue();
//        var_dump($enable);
        return view('home.index');
    }


    public function test2(){
        print_r($_COOKIE);

    }

    public function test(){



        //echo \Cookie::get('username',"asdfas");
        //print_r($_SERVER);
        setcookie("sddddddd","d4444dd",time()+3600*24*30*12,"/");
        echo 3333;
        return Response::json($_COOKIE);
        //($_COOKIE);
    }
  

}


