<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//基本路由
Route::get('/', function () {
    return view('blog.index');
  // return 'hello world';
});

Route::get('layout',function(){
    return view('layouts.child',['name'=>'linux','number'=>2]);
});
Route::get('basic', function () {
    return 'hello world';
});

//博客理由
//首页
Route::get('index',['as'=>'index',function(){
    return view('blog.index');
}]);
//关于我
Route::get('about',['as'=>'about',function(){
    return view('blog.about');
}]);
//慢生活
Route::get('newlist',['as'=>'newlist',function(){
    return view('blog.newlist');
}]);
//碎言碎语
Route::get('moodlist',['as'=>'moodlist',function(){
    return view('blog.moodlist');
}]);
//分享模板
Route::get('share',['as'=>'share',function(){
    return view('blog.share');
}]);
//学无止境
Route::get('knowledge',['as'=>'knowledge',function(){
    return view('blog.knowledge');
}]);
//函数
Route::get('function',['as'=>'function',function(){
    return view('blog.function');
}]);
//数据库操作
//Route::get('curd',['as'=>'curds',function(){
//    return view('blog.curd');
//}]);


Route::get('user/{id}', 'User\UserController@show');

 //多请求路由
Route::match(['get','post'], 'mult1', function () {
    return 'mult1';
});

Route::any('mult2',function(){
    return 'mult2';
});

//路由参数
// Route::get('user/{id}',function($id){
// 	return 'user='.$id;
// });

// Route::get('user/{name?}',function($name= 'cjh'){
//      return 'user-name='.$name;
// });

Route::get('user/{name?}',function($name= 'cjh'){
     return 'user-name='.$name;
})->where('name','[a-zA-Z]+');


Route::get('test',['uses'=>'StudentsController@test']);

Route::get('sql',['uses'=>'StudentsController@sql_handle']);
Route::get('sql_insert',[
	'uses'=>'StudentsController@sql_insert',
	'as'=>'insert'
	]);
Route::get('sql_update',['uses'=>'StudentsController@sql_update']);
Route::get('sql_delete',['uses'=>'StudentsController@sql_delete']);
Route::get('db_insert',['uses'=>'StudentsController@query1']);
Route::get('db_update',['uses'=>'StudentsController@query2']);
Route::get('db_delete',['uses'=>'StudentsController@query3']);
Route::get('db_select',['uses'=>'StudentsController@query4']);
Route::get('orm1',['uses'=>'StudentsController@orm1']);
Route::get('orm2',['uses'=>'StudentsController@orm2']);
Route::get('students/urltest',['uses'=>'StudentsController@urlTest']);
Route::get('session1',['uses'=>'StudentsController@session1']);
Route::get('session2',['uses'=>'StudentsController@session2']);
Route::get('response',['uses'=>'StudentsController@response']);
Route::get('curd',['uses'=>'StudentsController@curd','as'=>'curd']); //数据库操作路由
Route::get('curd-update/{code}',['uses'=>'StudentsController@curd_update','as'=>'curd-update']); //数据库操作路由
Route::post('act-update',['uses'=>'StudentsController@act_update','as'=>'act_update']); //数据库操作路由
Route::post('curd_delete',['uses'=>'StudentsController@curd_delete','as'=>'curd_delete']); //数据库操作路由
Route::post('curd_add',['uses'=>'StudentsController@curd_add','as'=>'curd_add']); //数据库操作路由
Route::get('midds',['uses'=>'StudentsController@test_middleware','as'=>'midds']);
Route::get('export','ExcelController@export');
Route::get('import','ExcelController@import');
Route::get('fun','ExcelController@test_function');
Route::get('cache1','Study@cache1');
Route::get('cache2','Study@cache2');
Route::get('login',function(){
    return view('blog.login');
});
Route::get('login-in','Study@login_in');
Route::post('check-login',['uses'=>'Study@check_login','as'=>'check-login']); //数据库操作路由





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/export',function(){
    return view('export.export');
});
Route::any('uploads','Study@uploads');
Route::any('mail','Study@mail');
Route::get('error','Study@error');
Route::get('queue','Study@queue');
Route::get('crypt','Study@crypt');
