<?php

namespace App;
use App\Bus;
use Illuminate\Database\Eloquent\Model;

class Huiyi extends Model
{
    protected $table='think_user';
    //
    public function bus()
    {
        return $this->hasOne(Bus::class,'bus_number','bus_number');//设置表关联 附属模型Bus
    }
}
