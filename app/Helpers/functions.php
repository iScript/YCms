<?php

/*
**
* 通用函数
*
*/




if (! function_exists('password_crypt')) {
    function password_crypt($str)
    {
        return sha1(sha1($str)."_");
    }


}