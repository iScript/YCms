<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Helpers\GeetestLib;

class GeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gee.index');
    }


    public function captcha(){
        define("CAPTCHA_ID", "ec08b9109cc615d50b302ce476221034");
        define("PRIVATE_KEY", "0ab8e410de5b4808e8afa6412607eb54");

        $GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
        $status = $GtSdk->pre_process("eee");
        echo $GtSdk->get_response_str();
    }

    public function check(){
//        define("CAPTCHA_ID", "ec08b9109cc615d50b302ce476221034");
//        define("PRIVATE_KEY", "0ab8e410de5b4808e8afa6412607eb54");
//        $GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
//        $result = $GtSdk->success_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode']);
//        if ($result) {
//            echo 'Yes!';
//        } else {
//            echo 'No';
//        }

    }


}


