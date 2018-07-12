<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class user_address extends Model
{
    //用户收货地址表
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'user_address';

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
    protected $fillable = ['user_id','address','address_tel','address_user'];
}

