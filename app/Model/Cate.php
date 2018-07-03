<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
   protected $table='category';
   protected $primaryKey='id';
   public $timestamps = false;
   protected $fillable = ['title','pid','path'];
   static public function getCate($cate=[],$pid=0){
    if(empty($cate)){
       $cate=Cate::get();
    }
    $arr=[];
    foreach($cate as $k=>$v){
        if($v->pid==$pid){
            $v->sub=self::getCate($cate,$v->id);
            $arr[]=$v;
        }
    }
        return $arr;
}

}
