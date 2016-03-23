
	@if (Auth::guest())
		<li><a href="/auth/login">denglu</a></li>
		<li><a href="/auth/register">注册</a></li>
	@else
	已登录 

	<li><a href="/auth/logout">退出</a></li>
	@endif

