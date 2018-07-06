<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
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
//分类封装
    static public function cates(){
        $cate=Cate::select(DB::raw('*,concat(path,id) as paths'))->orderBy('paths')->get();
        foreach($cate as $k=>$v){
            $res=substr_count($v->path,',')-1;
            $v->title=str_repeat('&nbsp;',$res*6).'ℳ--'.$v->title;
        }
        return $cate;
    }

 

}
