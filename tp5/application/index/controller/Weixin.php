<?php
namespace app\index\controller;

use think\Controller;
use think\Loader;
require_once 'Wechat.php';
class Weixin extends Controller
{
   public function responseWx(){
       $wechatObj=new \wechatCallbackapiTest();
           if(input('echostr')){
           //进行接入的操作
           $wechatObj->valid();
           //checkSignature();
       }else{
           //如果没有获取到，就说明接入成功
           $wechatObj->responseMsg();
       }

   }

  public function index()
    {  
             $wechatObj=new \wechatCallbackapiTest();
       echo input('echostr');exit();
        //return $this->fetch(':index');
    }

    
    static public function checkSignature()
	{
	    $signature = input("signature");
	    $timestamp = input("timestamp");
	    $nonce = input("nonce");
	    $token = 'weixin';
	    
	    $tmpArr = array($token,$timestamp,$nonce);
	    // use SORT_STRING rule
	    sort($tmpArr, SORT_STRING);
	    $tmpStr = implode($tmpArr);
	    $tmpStr = sha1($tmpStr);

	    if( $tmpStr == $signature ){
	    	
	        return true; 
	    }else{
	        return false;
	    }
	}

}
