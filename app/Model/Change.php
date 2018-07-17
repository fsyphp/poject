<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    // 商品兑换和抽奖商品表
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'change';

    // 主键
    protected $primaryKey = 'id';

    // 自动更新时间戳
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['number','user_id','address_user','int_id','address','orders_at','orders_tel','orders_msg','deliver','total'];

    // 和积分商品表关联
    public function int()
    {
        return $this->belongsTo('App\Model\Integral','int_id');
    }

    // 和抽奖商品表关联
    public function lot()
    {
        return $this->belongsTo('App\Model\Lottery','int_id');
    }
}
