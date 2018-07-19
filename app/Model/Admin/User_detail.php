<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'user_detail';

    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['tel','img','sex','money','integral','token','status'];
}  
