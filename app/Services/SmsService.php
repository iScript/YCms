<?php
namespace App\Services;

use App\Models\Verify;
use Request;

class SmsService {

    public function sendVerify($account){

        $verify = rand(100000,999999);

        $ip = Request::ip();


        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', 'https://sms.yunpian.com/v1/sms/send.json', ['form_params' =>
            ["apikey" => env('YUNPIAN_APPKEY'),
                "mobile" => $account,
                "text" => "您的验证码是：" . $verify ." ，请不要泄露。",
            ],
            'verify' => false
        ]);
        $array = json_decode($res->getBody(), true);

        Verify::create(["uid"=>0,"type"=>1,"account"=>$account,"verify"=>$verify,"ip"=>$ip,"state"=>$array["code"]]);

        //print_r($array);


    }
}
