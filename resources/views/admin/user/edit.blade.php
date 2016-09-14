@extends('admin.layouts.master')

@section('page-header')
    <h1>
        修改用户
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
            <h3 class="box-title">用户修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/user/{{$obj->id}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
                <div class="form-group">
                    <label for="">用户编号</label>
                    <input type="" class="form-control" disabled="true" id="" placeholder="" value="{{$obj->id}}">
                </div>
                <div class="form-group">
                    <label for="">密码</label>
                    <input type="password" class="form-control" id="" name="password" placeholder="Password" value="" >
                </div>


                <div class="form-group">
                    <label for="">角色 </label>
                    <select name="role_id">
                        <option value="0">无</option>
                        @foreach($roles as $k=>$v)
                        <option value="{{$v->id}}" @if($obj->hasRole($v->name)) selected="true" @endif >{{$v->display_name}}</option>
                        @endforeach
                    </select>
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