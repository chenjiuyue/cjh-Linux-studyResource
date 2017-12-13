<?php
namespace app\admin\controller;
use think\Controller;
use think\Log;
use think\Loader;
use think\Validate;
class Index extends Controller
{
    static public function log_init(){
        Log::init([
            'type'  =>  'File',
            'path'  =>  APP_PATH.'logs/',
            'level' => ['notice'],
        ]);
    }
    public function index()
    {
       // cache('name','缓存数据',3600);
        //cache('name', NULL);
        self::log_init();//初始化日志类
        Log::write('测试日志信息3','notice');
       return $this->fetch('index');
    }

    public function tables(){//表格
        return $this->fetch('tables');
    }
    public function charts(){//图表
        return $this->fetch();
    }

    public function forms(){//表单
        return $this->fetch();
    }


    public function test_val(){
        $data = [
            'name'=>'thinkphp',
            'email'=>'thinkphp@qq.com'
        ];
        //$validate = Loader::validate('User');
        $validate = validate('User'); //使用助手函数
        if(!$validate->check($data)){
            dump($validate->getError());
        }
    }

    public function ui(){//ui图标
        return $this->fetch();
    }
    public function widgets1(){//插件1
        return $this->fetch();
    }

    public function widgets2(){//插件2
        return $this->fetch();
    }

    public function widgets3(){//插件3
        return $this->fetch();
    }
    public function getip(){
        $ip=request()->ip();
        echo $ip;
    }
}
