<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    //
    function __construct()
    {

    }

    function index()
    {

        return response()->json(["aa"=>"bb"]);
    }

    function index2()
    {
        return response()->json(["1111a"=>"bbccdd======"]);
    }

}