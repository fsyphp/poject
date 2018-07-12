<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    //添加商品至购物车
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'shopping';

    //主键
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
    protected $fillable = ['gid','user_id','size','sum'];

    //模型关联
    public function goods()
    {
        return $this->belongsTo('App\Model\Goods','gid');
    }
}
