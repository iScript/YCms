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

                <div class="form-group">
                    <label for="">分类</label>
                    <select name="cat_id" class="form-control">
                        <option value="0">无</option>
                        @foreach($category as $c)

                            <option value="{{$c->id}}"  @if($c->id == $article->cat_id) selected="selected" @endif >{{$c->name}}</option>

                            @foreach ($c->children as $cc)
                                <option value="{{$cc->id}}" @if($cc->id == $article->cat_id) selected="selected" @endif > |------ {{$cc->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">封面</label>
                    <input type="hidden" class="form-control" id="cover" name="cover" placeholder="" value="{{$article->cover}}">

                    <button id="up" type="button">上传封面</button>
                    <img src="{{ config('qiniu.host') }}/{{$article->cover}}" id="up_img" />
                </div>


                <div class="form-group">
                    <label for="">是否外部链接</label>
                    是<input type="radio" name="is_link" value="0" @if($article->is_link == 0) checked="true" @endif /> 否 <input type="radio" name="is_link" value="1" @if($article->is_link == 1) checked="true" @endif />
                    &nbsp&nbsp&nbsp&nbsp&nbsp
                    <label for="">地址:</label>
                    <input type="text" class="form-control" id="" name="link" placeholder="" value="{{$article->link}}">
                </div>


                <div class="form-group">
                    <label for="">标签</label>
                    <input type="text" class="form-control" id="" name="tags" placeholder="" value="{{$article->tags_string}}">
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

