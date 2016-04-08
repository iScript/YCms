@extends('admin.layouts.master')

@section('page-header')
    <h1>
        用户添加用户
        <small>...</small>
    </h1>
@endsection

@section('content')
    @if ($errors->any())
    <div class="callout callout-danger">
        <h4>Warning!</h4>
        <p>
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        </p>
    </div>
    @endif

    <div class="box box-primary">


        <div class="box-header with-border">
            <h3 class="box-title">用户添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/user" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="">用户名</label>
                    <input type="username" class="form-control" name="username" id="" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="">密码</label>
                    <input type="password" class="form-control" id="" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="">email</label>
                    <input type="text" class="form-control" id="" name="email" placeholder="mobile">
                </div>

                <!--
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="status">
                    </label>
                </div>
                -->
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection