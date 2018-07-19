<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
     protected $table = 'collect';

    // 主键
    protected $primaryKey = 'id';

    // 自动更新时间戳
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['uid','gid','id'];
     public function coll(){
        return $this->belongsTo('App\Model\Goods','gid');
    }
}
