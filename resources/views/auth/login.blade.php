@extends('layouts.master')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>YAS</b>CMF</a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">登录开始您的会话</p>
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> 警告!</h4>
        <p>{!! $errors->first() !!}</p>
    </div>
    @endif

    <form method="post" action="/auth/login" accept-charset="utf-8">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" maxlength="20" name="username" placeholder="用户名"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" maxlength="20" name="password" placeholder="登录密码"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> 记住我
            </label>
          </div>
        </div><!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div><!-- /.col -->
      </div>
    </form>




    <a href="#">忘记密码</a><br>
    <a href="#" class="text-center">注册</a>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
    login
    @if ($errors->any())
        @foreach($errors->all() as $err)
        <p>{{$err}}</p>
        @endforeach
    @endif
    
  

@endsection