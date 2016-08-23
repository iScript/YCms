<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gt-node-sdk-demo</title>


<!-- 为使用方便，直接使用jquery.js库 -->
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<!-- 引入封装了failback的接口--initGeetest -->
<script src="http://static.geetest.com/static/tools/gt.js"></script>
<style>
    //*{margin:0;padding:0;}

</style>
</head>
<body>


<div class="popup">
    <h2>弹出式Demo，使用ajax形式提交二次验证码所需的验证结果值</h2>
    <br>
    <p>
        <labe>用户名：</labe>
        <input id="username1" class="inp" type="text" value="极验验证">
    </p>
    <br>
    <p>
        <label>密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
        <input id="password1" class="inp" type="password" value="123456">
    </p>

    <br>
    <input class="btn" id="popup-submit" type="submit" value="提交">

    <div id="popup-captcha"></div>
</div>
<script>
    var handlerEmbed = function (captchaObj) {
        $("#embed-submit").click(function (e) {
            var validate = captchaObj.getValidate();

            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }


            alert("验证成功");
        });
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#embed-captcha");

        captchaObj.onSuccess(function () {
            //alert("验证成功");

            var validate = captchaObj.getValidate();
            console.log(validate);

            if(!validate) return;

            var str = validate.geetest_challenge+"-"+validate.geetest_validate+"-"+validate.geetest_seccode;
            console.log(str);


            Tqq.callback(str);
            Tqq.close();
        });

        captchaObj.onFail(function () {
            //alert("验证失败");
        });

        captchaObj.onReady(function () {
            //alert("准备好");
        });

        captchaObj.onError(function () {
            console.log("错误");
        });
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };


    var handlerPopup = function (captchaObj) {
        $("#popup-submit").click(function () {
            var validate = captchaObj.getValidate();
            if (!validate) {
                alert('请先完成验证！');
                return;
            }
            $.ajax({
                url: "/captchacheck", // 进行二次验证
                type: "post",
                // dataType: "json",
                data: {
                    // 二次验证所需的三个值
                    geetest_challenge: validate.geetest_challenge,
                    geetest_validate: validate.geetest_validate,
                    geetest_seccode: validate.geetest_seccode
                },
                success: function (result) {
                    if (result == "Yes!") {
                        alert("验证成功");;
                    } else {
                        alert("验证失败");
                    }
                }
            });
        });
        // 弹出式需要绑定触发验证码弹出按钮
        captchaObj.bindOn("#popup-submit");
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#popup-captcha");
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };

    function loadCap(){

        $.ajax({
            // 获取id，challenge，success（是否启用failback）
            url: "/captcha?t=" + (new Date()).getTime(), // 加随机数防止缓存
            type: "get",
            dataType: "json",
            success: function (data) {
                // 使用initGeetest接口
                // 参数1：配置参数
                // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
                initGeetest({
                    gt: data.gt,
                    challenge: data.challenge,
                    product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                    offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                },handlerPopup);
            },
            error : function(){

                loadCap()
            }

        });
    }
    loadCap()

</script>
</body>
</html>
