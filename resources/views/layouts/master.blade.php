<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', "hello world")</title>
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="author" content="@yield('author', 'Anthony Rappa')">

        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="{{ asset('lib/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset('lib/ionicons/2.0.1/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('dist/css/yascmf.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
        <!--
        <link href="{{ asset('dist/css/skins/skin-black.min.css') }}" rel="stylesheet" type="text/css" />
        -->
        <link href="{{ asset('plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <!--[if lt IE 9]>
           
        <![endif]-->
        @include('includes.nav')

        <div class="container">

        @yield('content')
        </div><!-- container -->

        <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>

        @yield('after_script')
    </body>
</html>
