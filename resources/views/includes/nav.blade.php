<div class="header">
	<div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
		<a class="pure-menu-heading" href="/">YCms</a>

		<ul class="pure-menu-list">
			<li class="pure-menu-item "><a href="/" class="pure-menu-link">首页</a></li>
			@if (Auth::guest())
			<li class="pure-menu-item"><a href="/login" class="pure-menu-link">登录</a></li>
			<li class="pure-menu-item"><a href="/register" class="pure-menu-link">注册</a></li>
			@else
				<li class="pure-menu-item"><a href="/my" class="pure-menu-link">用户中心</a></li>
				<li class="pure-menu-item"><a href="/admin" class="pure-menu-link">后台</a></li>
				<li class="pure-menu-item"><a href="/logout" class="pure-menu-link">退出</a></li>
			@endif
		</ul>
	</div>
</div>