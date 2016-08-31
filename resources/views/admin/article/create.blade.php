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
                </p>
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
                    <label for="">标题</label>
                    <input type="title" class="form-control" name="title" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">概述</label>
                    <input type="text" class="form-control" id="" name="description" placeholder="">
                </div>




                <div class="form-group">
                    <label for="">内容</label>


                    <script id="container" name="content" type="text/plain">

                    </script>
                </div>

                <div class="form-group">
                    <label for="">分类</label>
                    <select name="cat_id" class="form-control">
                        <option value="0">无</option>
                        @foreach($category as $c)

                            <option value="{{$c->id}}">{{$c->name}}</option>

                            @foreach ($c->children as $cc)
                                <option value="{{$cc->id}}"> |------ {{$cc->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">封面</label>
                    <input type="hidden" class="form-control" id="cover" name="cover" placeholder="">

                    <button id="up" type="button">上传封面</button>
                    <img src="" id="up_img" />
                </div>


                <div class="form-group">
                    <label for="">是否外部链接</label>
                    是<input type="radio" name="is_link" value="0" /> 否 <input type="radio" name="is_link" value="1" checked="true" />
                    &nbsp&nbsp&nbsp&nbsp&nbsp
                    <label for="">地址:</label>
                    <input type="text" class="form-control" id="" name="link" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">标签</label>
                    <input type="text" class="form-control" id="" name="tags" placeholder="">
                </div>


            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>





    <script type="text/javascript" src="/assets/plupload/plupload.full.min.js"></script>
    <script type="text/javascript">
        var token = "";
        var host = "{{config('qiniu.host')}}";
        function uploadinit() {
            var uploader = new plupload.Uploader({
                runtimes: 'html5',
                browse_button: document.getElementById('up'), // you can pass an id...
                url: 'http://up.qiniu.com',
                //flash_swf_url : 'plupload/Moxie.swf',
                multipart_params: {
                    // token从服务端获取，没有token无法上传
                    token: token
                },
                filters: {
                    max_file_size: '300kb',
                    mime_types: [
                        {title: "Image files", extensions: "jpg,gif,png"},
                        {title: "Zip files", extensions: "zip"}
                    ]
                },

                init: {
                    PostInit: function () {
                        console.log("upload init");
                    },
                    FilesAdded: function (up, files) {

                        //选择文件后直接上传， 或可改成点击按钮上传
                        uploader.start();
                    },
                    UploadProgress: function (up, file) {

                    },
                    FileUploaded: function (up, file, info) {
                        //{response: "{"hash":"FjTrY2r9G1pXtxiN-jAi6qb2E1tz","key":"FjTrY2r9G1pXtxiN-jAi6qb2E1tz"}", status: 200, responseHeaders: "Pragma: no-cache"}
                        //上传成功 key则代表七牛的文件名 ， 使用域名+key 拼接
                        console.log(info.response);
                        $("#up_img").attr("src", host + "/" + JSON.parse(info.response).key);
                        $("#cover").val(JSON.parse(info.response).key);
                        //$("#up_img").show();
                    },
                    UploadComplete: function (up, files) {
                        // Called when all files are either uploaded or failed
                        console.log('[完成]');
                    },
                    Error: function (up, err) {
                        alert('图片大小不能超过300kb');
                    }
                }
            });
            uploader.init();

        }


        $.get("/qiniu/token", function (result) {
            console.log(result);
            if (result.code != 200) {
                console.log("token 获取失败~");
                return;
            }
            token = result.token;
            //host = result.host;
            uploadinit();
        });


    </script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/assets/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/assets/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{

            autoHeightEnabled : true,
            initialFrameHeight : "400",
            toolbars: [[
                'fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                 'paragraph',  'fontsize','indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo',   'insertframe', 'insertcode',   '|',
                'horizontal',
                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                'print', 'preview', 'searchreplace', 'drafts'
            ]]
        });
    </script>

@endsection

