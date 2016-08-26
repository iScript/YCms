<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //
    function __construct()
    {

    }

    function index()
    {

        return view('user.index');
    }
}