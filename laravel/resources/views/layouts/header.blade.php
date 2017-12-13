<!doctype html>
<html>
<head>
    <meta charset="gb2312">
    <title>个人博客-@yield('title')</title>
    <meta name="keywords" content="个人博客模板,博客模板" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
    <link href="{{URL::asset('blog/css/base.css')}}" rel="stylesheet">
    <link href="{{URL::asset('blog/css/index.css')}}" rel="stylesheet">
    <link href="{{URL::asset('blog/css/about.css')}}" rel="stylesheet">
    <link href="{{URL::asset('blog/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('blog/css/share.css')}}" rel="stylesheet">
    <link href="{{URL::asset('blog/css/learn.css')}}" rel="stylesheet">
    <link href="{{URL::asset('blog/css/template.css')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('static')

</head>
<body>
@section('nav')
    <header>
        <div id="logo"><a href="/"></a></div>
        <nav class="topnav" id="topnav"><a href="{{route('index')}}"><span>首页</span><span class="en">Protal</span></a><a href="{{route('about')}}"><span>关于我</span><span class="en">About</span></a><a href="{{route('newlist')}}"><span>慢生活</span><span class="en">Life</span></a><a href="{{url('moodlist')}}"><span>碎言碎语</span><span class="en">Doing</span></a><a href="{{route('share')}}"><span>模板分享</span><span class="en">Share</span></a><a href="{{route('knowledge')}}"><span>学无止境</span><span class="en">Learn</span></a><a href="{{route('function')}}"><span>辅助函数</span><span class="en">Function</span></a><a href="{{route('curd')}}"><span>数据库操作</span><span class="en">CURD</span></a></nav>
        </nav>
    </header>
@show
