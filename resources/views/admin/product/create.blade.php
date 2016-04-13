@extends('admin.layouts.master')

@section('page-header')
    <h1>
        添加产品
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
            <h3 class="box-title">添加产品</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/article" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="">名称</label>
                    <input type="title" class="form-control" name="title" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">概述</label>
                    <input type="text" class="form-control" id="" name="description" placeholder="">
                </div>


                <div class="form-group">
                    <label for="">分类</label>
                    <select name="cat_id" class="form-control">
                        @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="">价格</label>
                    <input type="text" class="form-control" id="" name="price" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">图片</label>
                    <input type="hidden" class="form-control" id="" name="price" placeholder="">
                </div>




            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


@endsection

