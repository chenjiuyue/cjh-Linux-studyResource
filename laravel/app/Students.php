<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Students extends Model{

	//指定表名
	protected $table='student';
	//指定id
	protected $primaryKey='id';

	protected $fillable=['name','age'];
   //时间错
    public $timestamps=true;
    // protected function getDateomat(){
    // 	return time();
    // }

    protected function test(){
    	return 111;
    }
	public function test3(){
	}

}
