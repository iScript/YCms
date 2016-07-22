<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        <title>@yield('title', "app")</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/assets/font-awesome-4.5.0/css/font-awesome.css">
        <!-- Ionicons -->
        {{--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
        <!-- Theme style -->
        <link rel="stylesheet" href="/assets/AdminLTE/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="/assets/AdminLTE/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 2.1.4 -->
        <script src="//cdn.bootcss.com/jquery/2.2.3/jquery.js"></script>
        <script src="/assets/layer/layer.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
        @include('admin.includes.header')
        @include('admin.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('page-header')

            </section>

            <!-- Main content -->
            <section class="content">
                
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        @include('admin.includes.footer')
        @include('admin.includes.right_slidebar')
    </div><!-- ./wrapper -->

    

    <!-- REQUIRED JS SCRIPTS -->


    <!-- Bootstrap 3.3.5 -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/AdminLTE/js/app.min.js"></script>

    <script src="/assets/admin/scripts/admin.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->


    @yield('after-scripts-end')
    </body>
</html>