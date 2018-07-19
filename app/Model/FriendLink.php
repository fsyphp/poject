<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class FriendLink extends Model
{
     //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'friendship';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['name','url'];



   static public function friendLink(){
        $friendLink=DB::table('friendship')->get();
        return $friendLink;
    }
}
