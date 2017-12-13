<?php

namespace App;
use App\Huiyi;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table='think_bus_msg';
    public function user()
    {
        return $this->belongsTo(Huiyi::class,'bus_number','bus_number');
    }
}
