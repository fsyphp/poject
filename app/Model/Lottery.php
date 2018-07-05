<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    //奖品表
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'lottery';

    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    //批量赋值
    protected $fillable = ['title','img','stock','create_at','desc','static'];
}
