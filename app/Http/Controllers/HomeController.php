<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware("admin");
    }

    //

    public function index()
    {
        //\Auth::
        //echo 22;

       // Auth::loginUsingId(1);



        return response()->view("welcome");;

    }
}
