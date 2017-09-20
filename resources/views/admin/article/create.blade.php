@extends('admin.layouts.master')

@section('page-header')
    <h1>
        写文章
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
    </div>
    @endif

    <div class="box box-primary">


        <div class="box-header with-border">
            <h3 class="box-title">写文章</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/article" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="">分类</label>
                    <select name="cate_id" style="margin-left: 10px">


                        @foreach($data as $v)
                            <option value={{$v->id}}>{{@$v->name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">是否置顶</label>
                    <select name="is_top" style="margin-left: 10px">


                        <option value="0">否</option>
                        <option value="1">是</option>

                    </select>

                </div>
                <div class="form-group">
                    <label for="">是否推荐</label>
                    <select name="is_rec" style="margin-left: 10px">


                        <option value="0">否</option>
                        <option value="1">是</option>

                    </select>

                </div>

                <div class="form-group">
                    <label for="">标题</label>
                    <input type="title" class="form-control" name="title" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">概述</label>
                    <input type="text" class="form-control" id="" name="description" placeholder="">
                </div>



                <label style="font-size:15px;">图片不能超过200kb,尺寸为156*110/720*508（置顶）</label>

                <div class="form-group">
                    <label for="">内容</label>
                    <textarea id="editor" name="content"></textarea>
                </div>

            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
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
                url: '/v1/qiniu/upload',
                params: null,
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: '正在上传,确认离开?'
            }
        });

    </script>
@endsection

