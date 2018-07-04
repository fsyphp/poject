<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Integral extends Model
{
    //积分兑换商品表
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'integral';

    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    //批量赋值
    protected $fillable = ['title','img','stock','create_at','price','desc','static'];
}
