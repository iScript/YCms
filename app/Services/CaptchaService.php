<?php
namespace App\Services;

use App\Helpers\GeetestLib;

class CaptchaService {

    public function check(Array $request){


        $GtSdk = new GeetestLib(env("CAPTCHA_ID"), env("PRIVATE_KEY"));
        $result = $GtSdk->success_validate( $request['geetest_challenge'],  $request['geetest_validate'],  $request['geetest_seccode']);
        if (!$result) {
            return false;
        }else{
            return true;

        }
    }
}
