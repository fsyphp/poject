<?php

    function fun($pid){
        if($pid==0){
            return '顶级分类';
        }else{
            // return DB::table('category')->where('id',$pid)->title;
            echo $pid;
        }
    }
?>