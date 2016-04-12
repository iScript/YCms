@extends('admin.layouts.master')

@section('page-header')
    <h1>
        编辑
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
            <h3 class="box-title">编辑文章</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/article/{{$article->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
                <div class="form-group">
                    <label for="">标题</label>
                    <input type="title" class="form-control" name="title" id="" placeholder="" value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <label for="">概述</label>
                    <input type="text" class="form-control" id="" name="description" placeholder="" value="{{$article->description}}">
                </div>

                <div class="form-group">
                    <label for="">内容</label>
                   <textarea id="editor" name="content">{{$article->content}}</textarea>
                </div>



            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


    <link rel="stylesheet" type="text/css" href="/assets/simditor/styles/simditor.css" />

    <script type="text/javascript" src="/assets/simditor/scripts/module.js"></script>
    <script type="text/javascript" src="/assets/simditor/scripts/hotkeys.js"></script>
    <script type="text/javascript" src="/assets/simditor/scripts/uploader.js"></script>
    <script type="text/javascript" src="/assets/simditor/scripts/simditor.js"></script>
    <script>
        var editor = new Simditor({
            textarea: $('#editor'),
            upload:{
                url: '/upload',
                params: null,
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: '正在上传,确认离开?'
            }
        });

    </script>
@endsection

