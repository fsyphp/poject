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
// 秒杀商品列表页
Route::any('home/miao','home\DetailController@miao_list');

   

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

// 添加商品到购物车
Route::post('home/shoppadd','home\ShoppingController@shoppadd');
Route::get('home/show','home\ShoppingController@show');
Route::post('home/del','home\ShoppingController@del');

// 添加购物车要登录
Route::get('home/shop_login','home\ShoppingController@shop_login');
// 通过 ajax 判断用户名和密码
Route::post('home/shoplogin','home\ShoppingController@shoplogin');

// 测试存 session
Route::get('home/add','home\ShoppingController@add');

//用户填写地址
Route::get('home/addres','home\OrdersController@address');
Route::post('home/commit','home\OrdersController@commit');
Route::post('home/addr','home\OrdersController@addr');
// 生成订单
Route::get('home/generate','home\OrdersController@generate');

// 立即购买
Route::post('home/go','home\OrdersController@go');
Route::post('home/goorders','home\OrdersController@goorders');
Route::get('home/goshopping','home\OrdersController@goshopping');

// 取消订单
Route::post('home/nocreate','home\OrdersController@nocreate');

Route::post('home/orders','home\OrdersController@orders');
Route::get('home/success','home\OrdersController@success');


//前台用户注册
Route::get('home/register','home\LoginController@register');
Route::post('home/insert','home\LoginController@insert');
Route::post('home/user','home\LoginController@user');
Route::get('home/email','home\LoginController@email');
Route::get('home/code','home\LoginController@code');

/* =================== 前台个人中心地址管理 ================================= */
// 用户地址管理
Route::resource('home/address','home\AddressController');
// 显示修改地址表单
Route::get('home/modifier/{id}','home\AddressController@modifie');
// 更新地址
Route::post('home/addressupdate','home\AddressController@addressupdate');

/* ================= 后台订单 ========================= */
// 订单收货地址修改
Route::get('home/addredit/{id}/edit/{user_id}','home\AddrController@addredit');
// 更新收货地址
Route::post('home/update','home\AddrController@addrupdate');
// 显示添加收货地址页面
Route::get('home/insert','home\AddrController@addrinsert');
// 添加收货地址
Route::post('home/store','home\AddrController@addrstore');

// 后台订单管理
Route::resource('admin/orders','admin\OrdersController');
// 订单详情
Route::get('admin/ordersdetail/{id}','admin\OrdersController@ordersdetail');
// 商品发货
Route::post('admin/sends','admin\OrdersController@sends');


/* =========================== 个人订单 ================================= */

Route::resource('home/userorders','home\UserordesController');

// 抽奖商品订单
Route::get('home/draw','home\UserordesController@draw');

// 兑换商品订单
Route::get('home/exchange','home\UserordesController@exchange');

// 未付款订单
Route::get('home/nocreate','home\UserordesController@nocreate');

// 删除未付款订单
Route::post('home/del','home\UserordesController@del');

// 待发货订单
Route::get('home/when','home\DeliveryController@when');

// 待收货订单
Route::get('home/collect','home\DeliveryController@collect');

// 交易完成
Route::get('home/success','home\DeliveryController@success');

// 确认收货
Route::post('home/belong','home\DeliveryController@belong');

// 删除已收货订单
Route::post('home/delete','home\DeliveryController@delete');

/* ====================== 抽奖商品和兑换商品 ================================ */

// 兑换商品
Route::post('home/act','home\UserordesController@act');

// 生成兑换商品订单提示页
Route::get('home/scdd','home\UserordesController@scdd');

// 生成订单
Route::post('home/huan','home\OrdersController@huan');

// 生成抽奖商品订单提示页
Route::get('home/jiesuan/{id}','home\UserordesController@jiesuan');

// 生成订单
Route::post('home/chous','home\OrdersController@chous');