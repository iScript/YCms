@extends('layouts.master')

@section('content')
	@if ($errors->any())
		@foreach($errors->all() as $err)
		<p>{{$err}}</p>
		@endforeach
	@endif

	<script src="http://static.geetest.com/static/tools/gt.js"></script>


	<form class="pure-form pure-form-aligned" method="post" action="/register">
		<fieldset>
			<div class="pure-control-group">
				<label for="name">用户名</label>
				<input id="username" type="text" placeholder="用户名" name="username">
			</div>

			<div class="pure-control-group">
				<label for="password">密码</label>
				<input id="password" type="password" placeholder="密码" name="password">
			</div>




			<div class="pure-controls">

				<button type="submit" name="send" class="pure-button pure-button-primary">注册</button>
			</div>
		</fieldset>
	</form>


	<div id="popup-captcha"></div>


	<script>
//		$("#send_code").click(function(){
//			var mobile = $("#mobile").val();
//
//
//		});


		var handlerPopup = function (captchaObj) {
			$("#send_code").click(function () {
				var validate = captchaObj.getValidate();
				if (!validate) {
					alert('请先完成验证！');
					return;
				}

				var url = "/verify_code";
				$.post(url,
						{	mobile : $("#mobile").val(),
							geetest_challenge: validate.geetest_challenge,
							geetest_validate: validate.geetest_validate,
							geetest_seccode: validate.geetest_seccode

						},  //要传递的数据
						function (data) {
							alert(data.message);
						}
				)


			});
			// 弹出式需要绑定触发验证码弹出按钮
			captchaObj.bindOn("#send_code");
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

@endsection