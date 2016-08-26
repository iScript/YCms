<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', "hello world")</title>
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="author" content="@yield('author', 'ykq')">

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <link rel="stylesheet" href="/assets/styles/ycms.css">
        <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 9]>
           
        <![endif]-->

        @include('includes.nav')

        @yield("container-header")

        <div class="container">
        @yield('content')
        </div><!-- container -->



        @yield('after_script')

        <div class="footer l-box is-center">
            View the source of this layout to learn more. Made with love by the YUI Team.
        </div>
    </body>
</html>
