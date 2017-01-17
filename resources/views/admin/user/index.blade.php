@extends('admin.layouts.master')

@section('page-header')
    <h1>
        用户列表
        <small>...</small>



    </h1>
@endsection

@section('content')

        <div class="box">
            <div class="box-header">
                <h3 class="box-title ">用户列表</h3>

                <div class="box-tools">
                    <form method="get">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="keyword" class="form-control pull-right" placeholder="昵称／手机／email" >

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>

                        <th>昵称</th>
                        <th>手机</th>
                        <th>上次登陆时间</th>
                        <th>操作</th>
                    </tr>

                    @foreach ($users as $user)
                    <tr>
                        <td>{!! $user->id !!}</td>

                        <td>{!! $user->nickname !!}</td>
                        <td>{!! $user->mobile !!}</td>
                        <td><span class="label label-warning">{!! $user->last_login_time !!}</span></td>
                        <td>
                            {{--<a type="button" href="/admin/user/{{$user->id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit "></i> 修改</a>--}}
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
                    {!! $users->appends(Request::all())->links() !!}
                </div>
            </div>

        </div>
        <!-- /.box -->

@endsection