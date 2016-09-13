@extends('admin.layouts.master')

@section('page-header')
    <h1>
        用户列表
        <small>...</small>

        <a type="button" class="pull-right btn btn-success btn-sm" href="/admin/user/create"><i class="fa fa-times-circle"></i> 新增</a>

    </h1>
@endsection

@section('content')

        <div class="box">
            <div class="box-header">
                <h3 class="box-title ">用户列表</h3>

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
                        <th>账户</th>
                        <th>昵称</th>
                        <th>角色</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>

                    @foreach ($users as $user)
                    <tr>
                        <td>{!! $user->id !!}</td>
                        <td>{!! $user->display_account !!}</td>
                        <td>{!! $user->nickname !!}</td>
                        <td>@if(isset($user->roles[0])) <button type="button" class="btn  btn-info btn-xs">{{$user->roles[0]->display_name}} </button> @endif</td>
                        <td><span class="label label-warning">{!! $user->status !!}</span></td>
                        <td>
                            <a type="button" href="/admin/user/{{$user->id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit "></i> 修改</a>
                            <button type="button" class="btn btn-danger btn-xs y-click" y-url="/admin/user/{{$user->id}}" y-method="delete"><i class="fa fa-close"></i> 删除</button>


                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <div class="pull-right">
                    {!! $users->render() !!}
                </div>
            </div>

        </div>
        <!-- /.box -->

@endsection