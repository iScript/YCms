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
        //echo 33;exit;
        return view('home.index');
    }


    public function test2(){
        //print_r($_COOKIE);

    }

    public function test(){

    }
  

}


