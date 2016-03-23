@extends('layouts.master')

@section('content')
	@if ($errors->any())
		@foreach($errors->all() as $err)
		<p>{{$err}}</p>
		@endforeach
	@endif
	<form action="/auth/register" method="post">
		用户名：<input type="text" name="username" />
		email : <input type="text" name="email" />
		passowrd : <input type="password" name="password" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" name="send" value="send" />

	</form>

	
@endsection