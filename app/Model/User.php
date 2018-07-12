<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'user';

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
    protected $fillable = ['uname','pass','email'];

    //管理用户详情表
    public function detail()
    {
        return $this->hasOne('App\Model\User_detail','user_id');
    }

}
