@extends('layouts.master')

@section('content')

@if ($errors->any())
    @foreach($errors->all() as $err)
        <p>{{$err}}</p>
    @endforeach
@endif


<form class="pure-form pure-form-aligned" method="post" action="/auth/login">
    <fieldset>
        <div class="pure-control-group">
            <label for="name">用户名</label>
            <input id="name" type="text" placeholder="Username" name="username">
        </div>

        <div class="pure-control-group">
            <label for="password">密码</label>
            <input id="password" type="password" placeholder="Password" name="password">
        </div>


        <div class="pure-controls">

            <button type="submit" class="pure-button pure-button-primary">登录</button>
        </div>
    </fieldset>
</form>





@endsection