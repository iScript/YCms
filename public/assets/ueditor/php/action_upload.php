<?php
/**
 * 上传附件和上传视频
 * User: Jinqn
 * Date: 14-04-09
 * Time: 上午10:17
 */
include "Uploader.class.php";
require "../../../../vendor/autoload.php";

// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;


/* 上传配置 */
$base64 = "upload";
switch (htmlspecialchars($_GET['action'])) {
    case 'uploadimage':
        $config = array(
            "pathFormat" => $CONFIG['imagePathFormat'],
            "maxSize" => $CONFIG['imageMaxSize'],
            "allowFiles" => $CONFIG['imageAllowFiles']
        );
        $fieldName = $CONFIG['imageFieldName'];
        break;
    case 'uploadscrawl':
        $config = array(
            "pathFormat" => $CONFIG['scrawlPathFormat'],
            "maxSize" => $CONFIG['scrawlMaxSize'],
            "allowFiles" => $CONFIG['scrawlAllowFiles'],
            "oriName" => "scrawl.png"
        );
        $fieldName = $CONFIG['scrawlFieldName'];
        $base64 = "base64";
        break;
    case 'uploadvideo':
        $config = array(
            "pathFormat" => $CONFIG['videoPathFormat'],
            "maxSize" => $CONFIG['videoMaxSize'],
            "allowFiles" => $CONFIG['videoAllowFiles']
        );
        $fieldName = $CONFIG['videoFieldName'];
        break;
    case 'uploadfile':
    default:
        $config = array(
            "pathFormat" => $CONFIG['filePathFormat'],
            "maxSize" => $CONFIG['fileMaxSize'],
            "allowFiles" => $CONFIG['fileAllowFiles']
        );
        $fieldName = $CONFIG['fileFieldName'];
        break;
}



// =========================
// 修改为七牛上传
// ==========================

$qiniu_config = [
    "accessKey"     => "Bm9_rHcZ1hCBFmlToadl8x1oAjJpygo8EFO_xy9r",
    "secretKey"     => "wvS3q9Xbh7w7ALluWE0qJbK-5Sa4JbniSYQlTAUX",
    "host"          => "http://oawuukyq8.bkt.clouddn.com",
    "bucket"        => "common",

];

// 构建鉴权对象
$auth = new Auth($qiniu_config["accessKey"], $qiniu_config["secretKey"]);

// 要上传的空间
$bucket = $qiniu_config["bucket"];

// 生成上传 Token
$token = $auth->uploadToken($bucket);

// 要上传文件的本地路径
$filePath = $_FILES[$fieldName]["tmp_name"];
//var_dump($filePath);exit;
// 上传到七牛后保存的文件名
$key =  uniqid("ud/",true);

// 初始化 UploadManager 对象并进行文件的上传
$uploadMgr = new UploadManager();

// 调用 UploadManager 的 putFile 方法进行文件的上传
list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);

$return =  array(
    "state" => "SUCCESS",
      "url" => $qiniu_config["host"]."/".$ret["key"],
     "title" => "",
    "original" => "",
    "type" => "",
    "size" => "",
 );
return json_encode($return);

//exit;
/* 生成上传实例对象并完成上传 */
//$up = new Uploader($fieldName, $config, $base64);

/**
 * 得到上传文件所对应的各个参数,数组结构
 * array(
 *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
 *     "url" => "",            //返回的地址
 *     "title" => "",          //新文件名
 *     "original" => "",       //原始文件名
 *     "type" => ""            //文件类型
 *     "size" => "",           //文件大小
 * )
 */

/* 返回数据 */
//return json_encode($up->getFileInfo());
