<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nocreate extends Model
{
    //未生成订单表
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'noCreate';

    // 主键
    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['goods_id','gsum','user_id'];
}
