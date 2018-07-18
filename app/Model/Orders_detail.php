<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders_detail extends Model
{
    //订单详情表
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'orders_detail';

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
    protected $fillable = ['orders_id','price','goods_id','cnt'];


    /* 和商品表关联 

        商品表      订单详情表
           1          多
    */ 
    // public function goods_orders()
    // {
    //     return $this->belongsTo('App\Model\Goods','goods_id','id');
    // }

    /* 和订单主表表关联 

        订单主表      订单详情表
           1          多
    */ 
    // public function orders_goods()
    // {
    //     return $this->belongsTo('App\Model\Orders','orders_id','id');
    // }
    public function good(){
        return $this->belongsTo('App\Model\Goods','goods_id','id');
    }
   

}



