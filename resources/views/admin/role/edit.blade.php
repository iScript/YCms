@extends('admin.layouts.master')

@section('page-header')
    <h1>
        修改
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
            <h3 class="box-title">修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/role/{{$obj->id}}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
                <div class="form-group">
                    <label for="">标示</label>
                    <input type="text" class="form-control" name="name" id="" placeholder="权限标示" value="{{$obj->name}}" >
                </div>
                <div class="form-group">
                    <label for="">名称</label>
                    <input type="text" class="form-control" id="" name="display_name" placeholder="名称" value="{{$obj->display_name}}" >
                </div>

                <div class="form-group">
                    <label for="">描述</label>
                    <input type="text" class="form-control" id="" name="description" placeholder="描述" value="{{$obj->description}}" >
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