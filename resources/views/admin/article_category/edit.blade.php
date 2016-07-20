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
            <h3 class="box-title">表单</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/article_category/{{$obj->id}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
                <div class="form-group">
                    <label for="">名称</label>
                    <input type="text" class="form-control" name="name" id="" placeholder="" value="{{$obj->name}}">
                </div>

            </div>

            <div class="box-body">
                <div class="form-group">
                    <label for="">父id</label>
                    <select name="pid" class="form-control">
                        <option value="0" >顶级分类</option>
                        @foreach ($category as $c)

                            <option value="{{$c->id}}" @if($c->id == $obj->pid) selected="selected" @endif >{{$c->name}}</option>

                            @foreach ($c->children as $cc)
                                {{--<option value="{{$cc->id}}"> ------ {{$cc->name}}</option>--}}
                            @endforeach
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>



@endsection

