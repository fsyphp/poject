<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
     protected $table = 'collect';

    // 主键
    protected $primaryKey = 'id';

    // 自动更新时间戳
    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['uid','gid','id'];
     public function coll(){
        return $this->belongsTo('App\Model\Goods','gid');
    }

    public function addCollect($data){
        try{
            return $this->create($data);
            // 如果传过来的数据有值就编辑,没有就不修改
            // return $this->updateOrCreate(['id'=>$id],$data);
        }catch(Exception $e){
            return $e;
        }
    }
}
