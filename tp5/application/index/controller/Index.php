<?php
//  Created by Administrator on 2017-08-10.
//  Copyright 2017 Administrator. All rights reserved.

namespace app\index\controller;
use think\Controller;
use app\index\model\Survey;
use app\index\model\User;
use think\Request;
use think\Db;
class Index extends Controller
{
    const HAVE_CP=1;
    const NO_CP=0;
    const HAVE_APPLY=3;
    //答题页面
    public function index()
    {
      echo 1;
    }
    //清除session
    public function empty_session(){
        session('openid',null);
        dump(session('openid'));
    }

    //入口 判断是否已经参与过
    public function root(){
        if(empty(session('openid'))) $this->get_openid(config('host').'root');



    }

//获取openid
    public  function get_openid($url){
        $redirect_uri=urlencode($url); //回调函数   urlencode将中文字符集转化为十六进制
        $code = input('code');
        if (empty($code)) {//判断是否有code
            $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".config('appid')."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
            $this->redirect($url);
        } else {
            $request_url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".config('appid')."&secret=".config('appsecret')."&code=".$code."&grant_type=authorization_code";
            $row=curl_get($request_url);
            $obj = json_decode($row);//json_decode — 对 JSON 格式的字符串进行编码 后面不带参数TRUE时，返回json对象,带有参数，返回数组
            $openid = $obj -> openid;
            $access_token = $obj -> access_token;//获取密钥
            session('openid', $openid);
        }
    }




    /*    以下内容为测试code*/

    /*  public function request(){
          $request=Request::instance();
          $url=$request->url();    ///survey/index.php/index/index/request
          $url=$request->url(true);    ///http://dfsyc.meiwuvr.com/survey/index.php/index/index/request
          $request->root(true);     //http://dfsyc.meiwuvr.com/survey/index.php/index/index/request
          if (request()->isGet()) echo "当前为 GET 请求";
      }

      public function header(){
          $head=request()->header();
          $test='Iam cache';
          Request::instance()->cache('__URL__',600);   //对当前页面开启10分钟的缓存

          dump($test);
          // print_r($head,true);
      }

      public function db_get(){
          // $data=Db::getTableInfo('df_survey', 'fields');
          $data=Db::name('survey')->where('id','exp','IN(8,9,10,11,12,13)')->select();
          $data=Db::table('df_survey')->whereTime('create_time', 'yesterday')->select(false); //查询昨天的数据  false参数打印sql语句
          $data=Db::table('df_survey')->whereTime('create_time', 'yesterday')->fetchSql()->select(); //打印sql语句
          $data=Db::table('df_survey')->whereTime('create_time', 'yesterday')->buildSql(); //打印sql语句
          //原生sql语句执行crud操作
          $data=Db::query("select * from df_survey where id=? AND have_complete=?",[14,1]);  //查询操作
          // 命名绑定  占位符
          $data= Db::execute("update df_survey set staff_name=:name where id=:id",['name'=>'json','id'=>'14']);
          dump($data);
      }*/

}
