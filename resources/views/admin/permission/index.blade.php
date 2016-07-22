@extends('admin.layouts.master')

@section('page-header')
    <h1>
        列表
        <small>...</small>

        <a type="button" class="pull-right btn btn-success btn-sm" href="/admin/permission/create"><i class="fa fa-times-circle"></i> 新增</a>

    </h1>
@endsection

@section('content')

        <div class="box">
            <div class="box-header">
                <h3 class="box-title ">列表</h3>

                <div class="box-tools">

                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>权限标示</th>
                        <th>名称</th>
                        <th>描述</th>
                        <th>操作</th>
                    </tr>

                    @foreach ($list as $obj)
                    <tr>
                        <td>{!! $obj->id !!}</td>
                        <td>{!! $obj->name !!}</td>
                        <td>{!! $obj->display_name !!}</td>
                        <td>{!! $obj->description !!}</td>
                        <td>
                            <div class="btn-group">
                                {{--<button type="button" class="btn btn-info"><i class="fa fa-align-left"></i></button>--}}
                                <a type="button" href="/admin/permission/{{$obj->id}}/edit" class="btn btn-info"><i class="fa fa-edit "></i></a>
                                <button type="button" class="btn btn-danger y-click" y-url="/admin/permission/{{$obj->id}}" y-method="delete"><i class="fa fa-close"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>

            <!-- /.box-body -->


        </div>
        <!-- /.box -->

@endsection