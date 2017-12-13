<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Students;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class StudentsController extends Controller{

	public function test(){
		return  view('student.test',['test'=>'Test']);
	}

	public function curd(Request $request){
		//Storage::disk('local')->put('file.txt', 'Contents');  //写入文件
		//echo asset('storage/file.txt'); //   创建文件url
		$url = Storage::url('file.txt');
		//echo $url;
		$path =public_path();
		//var_dump($path);
		//echo str_random(3);
		info('Some helpful information!');//写入日志
		logger('Debug message');//写入debug级别的日志
		if($request->isMethod('get')){
			$country=DB::table('country')->get();
			//dd($country);
			return view('blog.curd',['country'=>$country]);
		}
	}

	public function curd_delete(Request $request){
		$code=$request->input('code');
		$res=DB::table('country')->where('code',$code)->delete();
		if($res) echo Config::get('constants.WELL');

	}

	public function curd_add(){
		$data=request()->all();
		$res=DB::table('country')->insert($data);
		if($res) echo Config::get('constants.WELL');

	}

	public function curd_update(){
		$code=request()->route('code'); //获取路由参数
		$detail=DB::table('country')->where('code',$code)->first();
        return view('blog.curd-update',['detail'=>$detail]);
	}
	public function act_update(){
		$data=request()->post();
		$old_code=$data['old_code'];
		$data= array_except($data,['old_code']);
		$res=DB::table('country')->where('code',$old_code)->update($data);
		if($res)
			echo Config::get('constants.WELL');
		else
			echo  Config::get('constants.NONE');

	}

	public function test_middleware(){
		$this->middleware('MyMiddleware');
		//你也可以继续使用其他中间件
		return View('welcome');
	}


	








//通过原生的sql语句 添加数据   F DB
	public function  sql_handle(){
		$students=DB::select('select * from student where name = ?',['test1']); //查询 带条件where
		dd($students);
//return view('student.sql',['student'=>$students]);
	}

	public function sql_insert(){
		$res=DB::insert('insert into student (name,age) value (?,?)',['testas',20]); //插入
		if($res)  var_dump($res);

	}

	public function sql_update(){
		$res=DB::update('update student set age=? where name=?',['22','test3']);  //修改
		if($res) var_dump($res);
	}

	public function sql_delete(){
		$res=DB::delete('delete from student where name=?',['test5']);  //删除
		if($res) var_dump($res);
	}



//查询构造器
	public function query1(){
//$res=DB::table('student')->insert(['name'=>'luo','age'=>18,'create_time'=>time()]);
		//$lastid=DB::table('student')->insertGetId(['name'=>'luo','age'=>18,'create_time'=>time()]);  //插入
		$res=DB::table('country')->get();  //插入
		var_dump($res);
	}

	public function query2(){
		$res=DB::table('student')->where('id','10')->update(['name'=>'never']);     //修改
		var_dump($res);
	}

	public function query3(){
		$res=DB::table('student')->where('id','<=',5)->delete();     //删除
		var_dump($res);
	}

	public function query4(){
		$data=DB::table('student')->where('id','>=',3)->get();//get 查询  返回所有结果  单条件
		$data=DB::table('student')->whereRaw('id>=? and age>=?',[3,20])->get();//get 查询返回所有结果  多条件  写法一
		$data=DB::table('student')->where(['id'=>9,'age'=>18])->get();//get 查询  返回所有结果  多条件    写法二dd
		$data=DB::table('student')->orderBy('id','desc')->first();//get 查询  返回所有结果
		$data=DB::table('student')->orderBy('id','desc')->pluck('name');//get 查询  返回所有结果
//$data=DB::table('student')->lists('name');//get 查询  返回所有结果 
		$data=DB::table('student')->select('name','age')->get();//get 查询  返回所有结果
//dd($data);
		echo '<pre>';
		$data=DB::table('city')->orderBy('id','desc')->chunk(5,function($city){
			dd($city);
		});
	}
//orm方法
	public function orm1(){
		$data=Students::all(); //所有记录
		$data=Students::find(10); //查找一条
		$data=Students::findOrFail(12); //没查到报错
		$data=Students::get(); //查找所有
		$data=Students::where('id','>','8')->orderby('id','desc')->first();
		echo '<pre>';
		Students::chunk(2,function($students){
			//var_dump($students);
		});
		$data=Students::count();
		// $stud=new Students();
		// $stud->name='json';
		// $stud->age='55';
		// $res=$stud->save();
		$data=Students::test();
		//使用create方法
		//$data=Students::create(['name'=>'json','age'=>'22']);
		// $data=Student::firstOrCreate(
		//       ['name'=>'json']
		// 	);

		dd($data);

	}

	public function orm2(){
		// $data=Students::find(10);
		$data=new Students();
		$data->name='fff';
		$data->age='22';

		$bool=$data->save();
		//$bool=Students::where('id',12)->update(['name'=>'luo']);
		dd($bool);
	}

	public function urlTest(Request $request){
		// echo $res=$request->input('name');
		//echo $res=$request->input('names','xxx');
		//echo $request->method();
		$res= $request->isMethod('POST');
		$res=$request->ajax();
		$res=$request->is('students/*');
		$res=$request->url();
		var_dump($res);

	}

	public function session1(Request $request){
		//session()->put('key','is_session');
		//echo $request->session()->get('key2');
		//直接创建session变量
		Session::put('key2','no_session');
		//将session存到数组
		Session::push('key3.name','have_session');
		Session::push('key3.id','1');
		$res=Session::get('key3','default');
		Session::forget('key');//删除session
		//Session::flush 清空所有session
		$res=Session::all(); //获取所有session数据
		Session::flash('key-flash','val-flash');//暂存session 第二次访问就没有
		$get=Session::get('messge','default');
		//$get=$request->input('messge');
		dd($get);

	}
	public function session2(){
		//以数组的形式存数据
       $res=session('session',['name'=>'iam','value'=>'session']);
		$res=Session::get('key-flash');
		var_dump($res);
	}

	public function response(){
		$data=[
			'errCode'=>0,
			'errMsg'=>'success',
			'data'=>'array'
		];
		//return response()->json($data); //响应json
		return redirect('session1')->with('messge','我是快闪数据'); //重定向

	}






}