<!doctype html>
<html>
<head>
    <meta charset="gb2312">
    <title>导出-签到信息</title>
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{URL::asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('static')
    <style>
        .btn{
            margin-left: 20px;
        }
        a{
            color:white;
        }
    </style>
</head>
<body>
<h2 style="text-align: center;margin-top: 5%">东风会议签到信息导出</h2>
<p style="margin-top:5%;text-align: center;">
    <button type="button" class="btn btn-info btn-lg"><a href="http://dfsyc.meiwuvr.com/hy/home/data/export/type/1">外来人</a></button>
    <button type="button" class="btn btn-success btn-lg"><a href="http://dfsyc.meiwuvr.com/hy/home/data/export/type/0">非外来</a></button>
    <button type="button" class="btn btn-warning btn-lg"><a href="http://dfsyc.meiwuvr.com/hy/home/data/export2/type/0">未签到</a></button>
</p>
</body>
</html>
