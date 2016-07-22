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

    <style>
        .permission_list{list-style: none;}
        .permission_list li {padding:5px;clear:both;}
        //.permission_list label{width: 150px;display: inline-block}
    </style>

    <div class="box box-primary">


        <div class="box-header with-border">
            <h3 class="box-title">权限</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <form role="form" action="/admin/role/{{$role->id}}/permissions" method="post">
            <ul class="permission_list">
            @foreach($p as $kk => $vv)
            <li><div class="col-md-3"><input type="checkbox" class="qx"  /> <label> {{$kk}}: </label></div>
                <div class="col-md-9">
                @foreach($vv as $k=>$v)
                    <input type="checkbox" name="permissions[]" value="{{$v->id}}"  @if(in_array($v->name,$rolePerms)) checked="true" @endif   > {{$v->display_name}}
                @endforeach
                </div>
            </li>

            @endforeach


                <input class="btn btn-primary" type="submit" name="send" value="修改">
            </ul>




            </form>
        </div>

        <script>
            $(".qx").change(function(){
                var isChecked = $(this).prop("checked");
                console.log(isChecked);
                $(this).parent().siblings("div").find("input").prop("checked",isChecked);
            });


        </script>

    </div>

@endsection