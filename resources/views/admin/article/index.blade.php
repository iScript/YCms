@extends('admin.layouts.master')

@section('page-header')
    <h1>
        文章列表
        <small>...</small>

        <a type="button" class="pull-right btn btn-success btn-sm" href="/admin/article/create"><i class="fa fa-times-circle"></i> 新增</a>

    </h1>
@endsection

@section('content')

        <div class="box">
            <div class="box-header">
                <h3 class="box-title ">文章列表</h3>

                <div class="box-tools">

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th >ID</th>
                        <th>封面</th>
                        <th>标题</th>
                        <th>描述</th>
                        <th>发布时间</th>
                        <th>是否置顶</th>
                        <th>操作</th>
                    </tr>

                    @foreach ($list as $obj)
                    <tr>

                        <td style="margin-left: 5px">{!! $obj->id !!}</td>
                        <td > @if($obj->cover2)  <img src="{{$obj->cover2}}" width="50dp" height="50px"> @endif</td>
                        <td  >{!! $obj->title !!}</td>
                        <td  >{!! $obj->description!!}</td>
                        <td>{!! $obj->created_at !!}</td>
                        <td>@if($obj->is_top==0) 否 @else 是 @endif</td>
                        {{--<td><span class="label label-warning">{!! $obj->status_string !!}</span></td>--}}
                        <td>
                            <a href="/admin/article/{{$obj->id}}/edit" class="btn btn-success btn-sm ">编辑</a>
                            <button type="button" class="btn btn-danger btn-sm y-click" y-url="/admin/article/{{$obj->id}}" y-method="delete">删除</button>
                        </td>
                    </tr>
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
        <!-- 引用搜索功能JS -->

@endsection