<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Auth;
use App\Models\Article;
//use Qiniu\Auth;
use Qiniu\Processing\PersistentFop;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware("admin");
    }

    //

    public function index()
    {



        $a = Article::where("id",1)->first();

        dd($a);
        //return response()->view("welcome");

    }

    function generate_sign(array $attributes, $key, $encryptMethod = 'md5')
    {
        ksort($attributes);
        $attributes['key'] = $key;

        return (call_user_func_array($encryptMethod, [urldecode(http_build_query($attributes))]));
    }

    public function isValid($array,$key)
    {
        if(!isset($array["sign"])) return false;

        $sign = $array["sign"];
        unset($array["sign"]);
        unset($array["ext"]);
        unset($array["signType"]);
       // echo $sign;
        $localSign = $this->generate_sign($array, $key, 'md5');
        //echo $localSign;exit;
        return $localSign === $sign;
    }
}
