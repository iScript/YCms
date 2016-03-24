<div class="header">
	<div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
		<a class="pure-menu-heading" href="/">YCms</a>

		<ul class="pure-menu-list">
			<li class="pure-menu-item pure-menu-selected"><a href="/" class="pure-menu-link">首页</a></li>
			@if (Auth::guest())
			<li class="pure-menu-item"><a href="/auth/login" class="pure-menu-link">登录</a></li>
			<li class="pure-menu-item"><a href="/auth/register" class="pure-menu-link">注册</a></li>
			@else
				<li class="pure-menu-item"><a href="/auth/logout" class="pure-menu-link">退出</a></li>
			@endif
		</ul>
	</div>
</div>