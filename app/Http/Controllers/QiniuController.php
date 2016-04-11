<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;


class QiniuController extends Controller
{
    //


    function simditor_upload(Request $request){
        // 需要填写你的 Access Key 和 Secret Key
        $accessKey = 'Bm9_rHcZ1hCBFmlToadl8x1oAjJpygo8EFO_xy9r';
        $secretKey = 'wvS3q9Xbh7w7ALluWE0qJbK-5Sa4JbniSYQlTAUX';

        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);

        // 要上传的空间
        $bucket = 'test';

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);

        // 要上传文件的本地路径
        $filePath = $request->file('upload_file')->getPathname();
        //var_dump($filePath);exit;
        // 上传到七牛后保存的文件名
        $key =  uniqid("ycms_",true);

        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        //echo "\n====> putFile result: \n";
        if ($err !== null) {
            return response()->json(["success"=>false,"mes"=>"哎呦~上传失败","file_path"=>""]);
            //var_dump($err);
        } else {
            //var_dump($ret);   array(hash key)
            return response()->json(["success"=>true,"mes"=>"上传成功","file_path"=>"http://7xlysa.com1.z0.glb.clouddn.com/".$ret["key"]]);

        }



    }
}
