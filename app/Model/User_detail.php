<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'user_detail';

    //声明主键
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
    protected $fillable = ['user_id','img','tel','money','integral','sex','token'];
}
