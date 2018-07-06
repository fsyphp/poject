<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'broadcast';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['name','profile','url'];
}




