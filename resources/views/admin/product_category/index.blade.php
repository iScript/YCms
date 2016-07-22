@extends('admin.layouts.master')

@section('page-header')
    <h1>
        列表
        <small>...</small>

        <a type="button" class="pull-right btn btn-success btn-sm" href="{{URL::current()}}/create"><i class="fa fa-times-circle"></i> 新增</a>

    </h1>
@endsection

@section('content')

        <div class="box">
            <div class="box-header">
                <h3 class="box-title ">分类列表</h3>

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
                        <th>名称</th>
                        <th>时间</th>

                        <th>操作</th>
                    </tr>

                    @foreach ($list as $obj)
                    <tr>
                        <td>{!! $obj->id !!}</td>
                        <td>{!! $obj->name !!}</td>
                        <td>{!! $obj->created_at !!}</td>

                        <td>
                            <a href="/admin/product_category/{{$obj->id}}/edit" class="btn btn-success btn-sm ">编辑</a>
                            <button type="button" class="btn btn-danger btn-sm y-click" y-url="/admin/product_category/{{$obj->id}}" y-method="delete">删除</button>
                        </td>
                    </tr>

                        @foreach ($obj->children as $c)
                            <tr>
                                <td>{!! $c->id !!}</td>
                                <td> |------- {!! $c->name !!}</td>
                                <td>{!! $c->created_at !!}</td>

                                <td>
                                    <a href="/admin/product_category/{{$c->id}}/edit" class="btn btn-success btn-sm ">编辑</a>
                                    <button type="button" class="btn btn-danger btn-sm y-click" y-url="/admin/product_category/{{$c->id}}" y-method="delete">删除</button>
                                </td>
                            </tr>
                        @endforeach


                    @endforeach

                    </tbody>
                </table>

            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <div class="pull-right">
                    {!! $list->render() !!}
                </div>
            </div>

        </div>
        <!-- /.box -->

@endsection