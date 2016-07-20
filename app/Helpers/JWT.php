<?php
namespace App\Helpers;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;


/*  jwt标准规定了一些字段, 如 :
      iss: 该JWT的签发者
      aud: 接收该JWT的一方
      sub: 该JWT所面向的用户
      exp(expires): 什么时候过期，这里是一个Unix时间戳
      iat(issued at): 在什么时候签发的
      jti: JWT id,针对当前token的唯一标示
      */

class JWT {

    private static $signstr = "heheda";


    public static  function createTokenByUid($uid){

        $sign = new Sha256();
        $time = time();
        $token = (new Builder())->setIssuer('http://example.com')       // Configures the issuer (iss claim)
        ->setAudience('http://example.org')                             // Configures the audience (aud claim)
        ->setId(uniqid(), true)                                    // Configures the id (jti claim), replicating as a header item
        ->setIssuedAt($time)                                           // token签发时间 (iat claim)
        ->setExpiration($time + 120)                                    // 过期时间 (exp)
        ->set('uid', $uid)                                              // 自定义设置
        ->sign($sign, self::$signstr)                                         // 签名
            ->getToken();                                               // Retrieves the generated token
        return $token;
    }


    public static function checkToken($token){

        $token = (new Parser())->parse((string) $token);


        if(!$token->verify(new Sha256(),self::$signstr)){

            echo "验证失败";
            return;
        }


        if(time() > $token->getClaim("exp")   ){
            echo "token过期";return;
        }

        $uid = $token->getClaim("uid");

        echo "验证成功"."uid == ".$uid;
    }


}