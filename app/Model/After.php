<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class After extends Model
{
    //
    protected $table='after';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable = ['id','user_id','create_at','static','content','orders_id'];
}
