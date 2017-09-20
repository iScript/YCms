<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入鉴权类
use Qiniu\Auth;
use Illuminate\Support\Facades\DB;
// 引入上传类
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;

class QiniuController extends Controller
{
    //
    private $accessKey;
    private $secretKey  ;
    private $host;
    private $bucket;

    function __construct()
    {
        $this->accessKey =  config("qiniu.accessKey");
        $this->secretKey = config("qiniu.secretKey");
        $this->host = config("qiniu.host");
        $this->bucket = config("qiniu.bucket");
    }

    function upload(Request $request){

        // 构建鉴权对象
        $auth = new Auth($this->accessKey, $this->secretKey);

        // 要上传的空间
        $bucket = $this->bucket;

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



        if ($err !== null) {
            return response()->json(["success"=>false,"mes"=>"哎呦~上传失败","file_path"=>""]);
            //var_dump($err);
        } else {
            //var_dump($ret);   array(hash key)
            return response()->json(["success"=>true,"mes"=>"上传成功","file_path"=>$this->host."/".$ret["key"]]);

        }



    }
}
