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
            <h3 class="box-title">编辑资讯</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/article/{{$article->id}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">

                    <div class="form-group">
                        <label for="">分类</label>
                        <select name="cate_id"  >


                            @foreach($data as $v)
                                <option value={{$v->id}} @if($v->id==$article->cate_id) selected @endif>{{@$v->name}}</option>

                            @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label for="">是否置顶</label>
                    <select name="is_top" style="margin-left: 10px">


                        <option value="0" @if($article->is_top==0) selected @endif>否</option>
                        <option value="1" @if($article->is_top==1) selected @endif >是</option>

                    </select>

                </div>
                <div class="form-group">
                    <label for="">是否推荐</label>
                    <select name="is_rec" style="margin-left: 10px">


                        <option value="0" @if($article->is_rec==0) selected @endif>否</option>
                        <option value="1" @if($article->is_rec==1) selected @endif >是</option>

                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">关联游戏</label>
                        <select name="relate_game_id"  >


                            @foreach($game as $v)
                                <option value={{$v->id}} @if($v->id==$article->relate_game_id) selected @endif>{{@$v->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">标题</label>
                    <input type="title" class="form-control" name="title" id="" placeholder="" value="{{$article->title}}">
                </div>

                <div class="form-group">
                    <label for="">概述</label>
                    <input type="text" class="form-control" id="" name="description" placeholder="" value="{{$article->description}}">
                </div>
                <div class="form-group">
                    <label for="">封面</label>
                    <div class="pure-control-group">
                        <button class="btn btn-sm btn-info" id="up" type="button" >上传封面</button>
                        <p>
                            <img src="{{$article->cover2}}" id="up_img" style="max-width: 300px;max-height: 300px">

                            <input type="hidden" class="form-control" id="picture_input" name="cover" placeholder="" value="{{$article->cover}}">
                        </p>
                    </div>


            <label style="font-size:15px;">图片不能超过200kb,尺寸为156*110/720*508（置顶）</label>

                <div class="form-group">
                    <label for="">内容</label>
                    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
                    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
                    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
                    <script id="editor" type="text/plain"  name="content" style="width:860px;height:500px;">{!!$article->content!!}</script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor',{

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
                    <style>
                        .edui-default{line-height: 28px;}
                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                        {overflow: hidden; height:20px;}
                        div.edui-box{overflow: hidden; height:22px;}
                    </style>
                </div>



            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </form>
    </div>


    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
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
                    max_file_size: '200kb',
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
                        $("#picture_input").val(JSON.parse(info.response).key);
                        //$("#up_img").show();
                    },
                    UploadComplete: function (up, files) {
                        // Called when all files are either uploaded or failed
                        console.log('[完成]');
                    },
                    Error: function (up, err) {
                        console.log(err);
                        // alert('图片大小不能超过300kb');
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




@endsection

