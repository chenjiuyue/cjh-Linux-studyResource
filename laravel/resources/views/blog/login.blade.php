@extends('layouts.blog')
@section('title','登录界面')
@section('content')
    <form class="form-horizontal" role="form" style="margin-top:5%;" method="post" action="{{route('check-login')}}">
        {{ csrf_field() }}
        <div class="form-group" style="width:50%;margin-left:25%">
            <label for="firstname" class="col-sm-2 control-label">名字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="请输入名字" name="name">
            </div>
        </div>
        <div class="form-group" style="width:50%;margin-left:25%">
            <label for="lastname" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" placeholder="请输入密码" name="password">
            </div>
        </div>
        <div class="form-group" style="width:50%;margin-left:25%">
            <label for="lastname" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="请输入邮箱" name="email">
            </div>
        </div>

        <div class="form-group" style="width:50%;margin-left:25%">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">登录</button>
            </div>
        </div>
    </form>
@stop
