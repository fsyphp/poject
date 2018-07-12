<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Cate;
class Goods extends Model
{
    //
    protected $table='goods';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable = ['gname','category_id','price','g_static','gpic'];

    public function detail(){
        return $this->hasOne('App\Model\Goods_deetail','g_id');
    }
    static public function status($status){
        if($status==0){
            return '秒杀';
        }else if($status==1){
            return '新品';
        }else if($status==2){
            return '在售';
        }else{
            return '已下架';
        }
    }

    static public function cates($id){
        return Cate::where('id',$id)->first()['title'];
    }

  
}
