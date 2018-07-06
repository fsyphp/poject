<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/404',function(){
    abort(404);
});

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('admin/indexs','admin\USerController@indexs');
Route::get('admin/index','admin\USerController@index');

// 分类管理
Route::resource('admin/cate','admin\CateController');
Route::post('admin/cate/update','admin\CateController@update');
// 上架
Route::any('admin/goods/sj','admin\GoodsController@sj');
// 下架
Route::any('admin/goods/xj','admin\GoodsController@xj');
// 商品管理
Route::resource('admin/goods','admin\GoodsController');
 

//积分商品管理
Route::resource('admin/integral','admin\IntegralController');

//通过ajax修改积分商品名称
Route::post('admin/title','admin\IntegralController@title');

//抽奖商品
Route::resource('admin/lottery','admin\LotteryController');

//通过 ajax 改变奖品状态
Route::post('admin/static','admin\LotteryController@static');


