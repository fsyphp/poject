<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table='shop';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable = ['shop_name','address','tel','shop_pic'];
}
