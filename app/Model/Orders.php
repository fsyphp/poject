<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    // 订单主表
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'orders';

    // 主键
    protected $primaryKey = 'id';

    // 自动更新时间戳
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['number','user_id','address_user','address','orders_at','orders_tel','orders_msg','sum','total'];

    //和订单详情表关联 主表 详情表
                    // 1    多
     public function orders_detail()
    {
        return $this -> hasMany('App\Model\Orders_detail','orders_id');
    }
}
