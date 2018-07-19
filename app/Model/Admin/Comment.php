<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'goods_comment';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['g_id','user_id','content','stars','create_at'];
}
  