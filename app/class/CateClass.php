<?php 
use App\Model\Cate;
    class CateClass
    {
        public static function cates($pid){
            
            if($pid==0){
                return '顶级分类';
            }else{
               return Cate::where('id',$pid)->first()->title; 
            }
        }
    }
?>