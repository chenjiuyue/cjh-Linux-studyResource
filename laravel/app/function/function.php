<?php


/*公共函数*/
function test(){
    //获取laravel版本
    return 'laravel版本:'.app()::VERSION.'  '.'自定义常量:'.Config::get('constants.WELL').' '.'配置参数:'.config('app.timezone');
}

//检查是否登录
function check(){
    if(Auth::check() == false){
        // return redirect()->route('login'); 有路由别名的
        //echo 222;
        return redirect('login');
    }else{
        echo '已经登录';
    }
}