@extends('admin.layouts.master')

@section('page-header')
    <h1>
        权限
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
            <h3 class="box-title">权限</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <form role="form" action="/admin/role/{{$role->id}}/permissions" method="post">
            @foreach($permissions as $k=>$v)
                <input type="checkbox" name="permissions[]" value="{{$v->id}}"> {{$v->display_name}}
            @endforeach


                <input type="submit" name="send" value="submit">
            </form>
        </div>



    </div>

@endsection