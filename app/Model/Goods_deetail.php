<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods_deetail extends Model
{
    //
    protected $table='goods_detail';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable = ['g_id','manypic','gram','baby','stock',];
    public function goods(){
        return $this->hasOne('App\Model\Goods','id');
    }
}
