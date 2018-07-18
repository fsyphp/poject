<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

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
    protected $fillable = ['id','number','user_id','address_user','address','orders_at','orders_tel','orders_msg','sum','total'];

    //和订单详情表关联 主表 详情表
                    // 1    多
    //  public function orders_detail()
    // {
    //     return $this -> hasMany('App\Model\Orders_detail','orders_id');
    // }
  
    
    
    public function orderDetail(){
        return $this->hasMany('App\Model\Orders_detail','orders_id','id');
    }
    public  function demo(){
        $data = $this->with(['orderDetail.good:id,gname,price','orderDetail:id,orders_id,goods_id'])->where('user_id',session('user_id'))->get();
        if(count($data) > 0){
            return $data->toArray();
        }
        return array();
   }   
}

