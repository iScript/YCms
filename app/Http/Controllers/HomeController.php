<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        //PhpSms::make()->to('1828****349')->template('Luosimao', 'xxx')->data(['12345', 5])->send();
//        $aa = \PhpSms::make()->to('15167895272')->content('【微团公司】亲爱的张三，欢迎访问，祝你工作愉快。')->send();
//        var_dump($aa);
//        $enable = \PhpSms::queue();
//        var_dump($enable);
        return view('home.index');
    }

  

}
