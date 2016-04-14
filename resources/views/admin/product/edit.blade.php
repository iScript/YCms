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
        <form role="form" action="/admin/product/{{$product->id}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
                <div class="form-group">
                    <label for="">名称</label>
                    <input type="title" class="form-control" name="title" id="" placeholder="" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="">概述</label>
                    <input type="text" class="form-control" id="" name="description" placeholder="" value="{{$product->description}}">
                </div>


                <div class="form-group">
                    <label for="">分类</label>
                    <select name="cat_id" class="form-control">
                        @foreach($categories as $c)
                        <option value="{{$c->id}}" @if($c->id == $product->cat_id) selected="selected" @endif  >{{$c->name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="">价格</label>
                    <input type="text" class="form-control" id="" name="price" placeholder="" value="{{$product->price}}">
                </div>

                <div class="form-group">
                    <label for="">图片</label>
                    <button class="btn btn-sm btn-info" id="up">上传图片</button>
                    <input type="hidden" class="form-control" id="picture_input" name="picture" placeholder="" value="{{$product->picture}}">
                    <img src="{{config('qiniu.host')}}/{{$product->picture}}" id="up_img" width="80px" height="80px">
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
        var host = "";
        function uploadinit(){
            var uploader = new plupload.Uploader({
                runtimes : 'html5',
                browse_button : document.getElementById('up'), // you can pass an id...
                url : 'http://up.qiniu.com',
                //flash_swf_url : 'plupload/Moxie.swf',
                multipart_params: {
                    // token从服务端获取，没有token无法上传
                    token: token
                },
                filters : {
                    max_file_size : '2mb',
                    mime_types: [
                        {title : "Image files", extensions : "jpg,gif,png"},
                        {title : "Zip files", extensions : "zip"}
                    ]
                },

                init: {
                    PostInit: function() {
                        console.log("upload init");
                    },
                    FilesAdded: function(up, files) {

                        //选择文件后直接上传， 或可改成点击按钮上传
                        uploader.start();
                    },
                    UploadProgress: function(up, file) {

                    },
                    FileUploaded: function(up, file, info) {
                        //{response: "{"hash":"FjTrY2r9G1pXtxiN-jAi6qb2E1tz","key":"FjTrY2r9G1pXtxiN-jAi6qb2E1tz"}", status: 200, responseHeaders: "Pragma: no-cache"}
                        //上传成功 key则代表七牛的文件名 ， 使用域名+key 拼接
                        console.log(info.response);
                        $("#up_img").attr("src",host+"/"+JSON.parse(info.response).key);
                        $("#picture_input").val(JSON.parse(info.response).key);
                        //$("#up_img").show();
                    },
                    UploadComplete: function(up, files) {
                        // Called when all files are either uploaded or failed
                        console.log('[完成]');
                    },
                    Error: function(up, err) {
                        alert(err.response);
                    }
                }
            });
            uploader.init();

        }




        $.get("/qiniu/token", function(result){
            console.log(result);
            if(result.code != 200){
                console.log("token 获取失败~");return;
            }
            token = result.token;
            host = result.host;
            uploadinit();
        });


    </script>


@endsection

