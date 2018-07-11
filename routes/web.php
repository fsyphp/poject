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

// 体验店
Route::get('home/shop','admin\ShopController@indexs');
Route::get('home/shop/detail/{id}','admin\ShopController@detail');

//商品列表页
Route::get('home/goods/list','home\DetailController@goodlist');


// 抽奖列表页
Route::get('home/lottery','home\DetailController@lottery');
// 积分兑换列表页
Route::get('home/integral','home\DetailController@integral');
//   首页
Route::get('/','home\HomeController@index'); 
//详情页
Route::any('home/detail/{id}','home\DetailController@detail');


   

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

// 实体店
Route::resource('admin/shop','admin\ShopController');


Route::group([],function(){
	Route::get('admin/banner/index','admin\BannerController@index');
	Route::get('admin/banner/create','admin\BannerController@create');
	Route::post('admin/banner/store','admin\BannerController@store');
	Route::get('admin/banner/edit/{id}','admin\BannerController@edit');
	Route::post('admin/banner/update/{id}','admin\BannerController@update');
	Route::get('admin/banner/destroy/{id}','admin\BannerController@destroy');	
});









//前台用户注册
Route::get('home/register','home\LoginController@register');
Route::post('home/insert','home\LoginController@insert');
Route::post('home/user','home\LoginController@user');
Route::get('home/email','home\LoginController@email');
Route::get('home/code','home\LoginController@code');