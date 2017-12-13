<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;
use Auth;
use Redirect;
use Storage;
use Mail;
use Log;
use App\Jobs\SendEmail;
use Crypt;

class Study extends Controller
{


    public function uploads(Request $request){//文件上传
        if($request->isMethod('POST')){
            $file=$request->file('file');
            if($file->isValid()){
                $originalName = $file->getClientOriginalName();//原文件名
                $ext = $file->getClientOriginalExtension();   //扩展名
                $type = $file->getClientMimeType();       //
                $realPath = $file->getRealPath();     //临时绝对路径
                $filename = date("y-m-d-h-i-s").uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                var_dump($bool);
            }
            exit();
        }
        return view('file.uploads');
    }

    public function mail(){//发送邮件
        Mail::raw('邮件内容-laravel',function($message){
            $message->from('cjh_justjoke@163.com','cc九月');
            $message->subject('laravel-邮件程序TEST');
            $message->to('596032364@qq.com');
        });
    }




    public function login_in(){
        if(Auth::check() == false){
            //  return  redirect('login');
            return Redirect::guest('login');
        }
        return view('blog.login-in');
    }

    //检查登录
    public function check_login(){
        $data=request()->post();
        if (Auth::attempt(array('email' => $data['email'], 'password' => $data['password'])))
        {
            return Redirect::intended('/');
        }
    }

    static public function check(){
        if(Auth::check() == false){
            // return redirect()->route('login'); 有路由别名的
            return redirect('cache2');
        }else{
            echo '22';
        }
    }

    //缓存
    public function cache1(){
        Cache::put('key1','val1',10);
        //Cache::add('key2','val2',20);//若key2不存在，则添加成功 否则，添加失败
        //Cache::forever('key3','val3');//永久保存对象到缓存
        //Cache::has('key1');//判断是否存在
        // Cache::forget('key1');//删除缓存
    }
    public function cache2(){
        $data = Cache::get('key1');//取值
        //$data = Cache::pull('key1');//取值后删除
        dd($data);
    }

    public function error(){
        //  abort('501');//501页面报错
        Log::info('这是一个info级别的日志');
        Log::error('这是一个错误级别的日志',['name'=>'cjh','age'=>'15']);
    }

    public function queue(){//测试队列
      dispatch(new SendEmail('754047561@qq.com'));
    }

    public function crypt(){
        $encrypted = Crypt::encryptString('Hello world.');//加密一个值
        echo $encrypted;
        $decrypted = Crypt::decryptString($encrypted);//解密
       // echo  $decrypted;
    }


}
