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

// // 聊天  
// Route::get('/home/t1','home\LtController@t1');
// Route::get('/home/t2','home\LtController@t2');
// Route::any('/home/sub','home\LtController@sub');
// Route::any('/home/pub','home\LtController@pub');
//友情链接
Route::group([],function(){
	Route::get('admin/friendlink/index','admin\FriendLinkController@index');
	Route::get('admin/friendlink/create','admin\FriendLinkController@create');
	Route::post('admin/friendlink/store','admin\FriendLinkController@store');
	Route::get('admin/friendlink/edit/{id}','admin\FriendLinkController@edit');
	Route::post('admin/friendlink/update/{id}','admin\FriendLinkController@update');
	Route::get('admin/friendlink/destroy/{id}','admin\FriendLinkController@destroy');
});
// 售后
Route::any('home/after','home\AfterController@index');
Route::any('home/after/shouhou','home\AfterController@shouhou');
Route::post('home/after/after','home\AfterController@after');
Route::get('home/after/liulan','home\AfterController@liulan');
// 体验店
Route::get('home/shop','admin\ShopController@indexs');
Route::get('home/shop/detail/{id}','admin\ShopController@detail');

//商品列表页
Route::get('home/goods/list','home\DetailController@goodlist');

// 用户收藏
Route::get('home/cang/{id}','home\DetailController@cang');


// 抽奖列表页
Route::get('home/lottery','home\DetailController@lottery');
Route::post('home/lottery/chou','home\DetailController@chou');
// 积分兑换列表页
Route::get('home/integral','home\DetailController@integral');
//   首页
Route::get('/','home\HomeController@index'); 
//详情页
Route::any('home/detail/{id}','home\DetailController@detail');
// 秒杀商品列表页
Route::any('home/miao','home\DetailController@miao_list');
// 收藏
Route::get('home/collect/index','home\CollectController@index');
Route::get('home/collect/delete','home\CollectController@delete');
// 用户个人信息
Route::get('home/userinfo/index','home\UserinfoController@index');
Route::get('home/userinfo/edit/{id}','home\UserinfoController@edit');
Route::post('home/userinfo/update/{id}','home\UserinfoController@update');



   



 
Route::group(['middleware'=>'login'],function(){
	// 分类管理
	Route::resource('admin/cate','admin\CateController');
	Route::post('admin/cate/update','admin\CateController@update');
	// 上架
	Route::any('admin/goods/sj','admin\GoodsController@sj');
	// 下架
	Route::any('admin/goods/xj','admin\GoodsController@xj');
	// 商品管理
	Route::resource('admin/goods','admin\GoodsController');
});

Route::group(['middleware'=>'login'],function(){
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
});

Route::group(['middleware'=>'login'],function(){
	Route::get('admin/banner/index','admin\BannerController@index');
	Route::get('admin/banner/create','admin\BannerController@create');
	Route::post('admin/banner/store','admin\BannerController@store');
	Route::get('admin/banner/edit/{id}','admin\BannerController@edit');
	Route::post('admin/banner/update/{id}','admin\BannerController@update');
	Route::get('admin/banner/destroy/{id}','admin\BannerController@destroy');
	Route::any('admin/after/shen','admin\AfterController@shen');

	Route::resource('admin/after','admin\AfterController');	
});

///后台
// 添加商品到购物车
Route::post('home/shoppadd','home\ShoppingController@shoppadd');
Route::get('home/show','home\ShoppingController@show')->middleware('hlogin'); //------------------
Route::post('home/dels','home\ShoppingController@del');
Route::post('home/del','home\ShoppingController@dell');
Route::post('home/delles','home\ShoppingController@dells');


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
Route::get('home/succes','home\OrdersController@success');


//前台用户注册
// Route::get('home/register','home\LoginController@register');
// Route::post('home/insert','home\LoginController@insert');
// Route::post('home/user','home\LoginController@user');
// Route::get('home/email','home\LoginController@email');
// Route::get('home/code','home\LoginController@code');

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

Route::group(['middleware'=>'login'],function(){
	/* ======================= 后台常规订单管理 ================================= */
	Route::resource('admin/orders','admin\OrdersController');
	// 订单详情
	Route::get('admin/ordersdetail/{id}','admin\OrdersController@ordersdetail');

	// 删除订单
	Route::post('admin/ordersDel','admin\OrdersController@ordersDel');
	// 商品发货
	Route::post('admin/sends','admin\OrdersController@sends');

	/* ============================ 后台抽奖兑换管理 =============================== */
	Route::resource('admin/lotDraw','admin\LotdrawController');
	// 发货
	Route::post('admin/fahuo','admin\LotdrawController@fahuo');
	// 订单详情
	Route::get('admin/lotDetail/{id}','admin\LotdrawController@lotdetail');
});

/* =========================== 个人订单 ================================= */

Route::resource('home/userorders','home\UserordesController');

// 抽奖商品订单
Route::get('home/draw','home\UserordesController@draw');

// 抽奖商品收货
Route::post('home/lotfa','home\UserordesController@lotfa');

// 兑换商品订单
Route::get('home/exchange','home\UserordesController@exchange');

// 未付款订单
Route::get('home/nocreate','home\UserordesController@nocreate');               

// 删除未付款订单
Route::post('home/shanc','home\UserordesController@del');
Route::post('home/deeel','home\UserordesController@delels');

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

/* ========================== 用户管理 ========================= */
Route::group(['middleware'=>'login'],function(){
	// 后台
	Route::get('admin/indexs','admin\USerController@indexs');
	Route::get('admin/index','admin\USerController@index');
	/*------------ 用户 --------------*/
	Route::get('/admin/user/indexs','admin\UserController@indexs');  // 父类模板
	Route::get('/admin/user/create','admin\UserController@create')->middleware('logins');  // 添加页面
	Route::post('/admin/user/insert','admin\UserController@insert')->middleware('logins');   // 添加操作
	Route::get('/admin/user/index','admin\UserController@index'); // 显示用户
	Route::delete('/admin/user/delete','admin\UserController@delete')->middleware('logins');  // 用户删除
	Route::get('/admin/user/update','admin\UserController@update')->middleware('logins'); // 修改页面
	Route::post('/admin/user/edit/{id}','admin\UserController@edit')->middleware('logins'); // 修改方法
	Route::any('/admin/messaje','admin\UserController@messaje'); // 后台个人页面
});

/*================================ 后台登录============================ */
Route::any('/admin/captcha','admin\LoginController@captcha'); // 验证码
Route::any('/admin/loginout','admin\LoginController@loginout'); // 退出
Route::get('/admin/login','admin\LoginController@login'); // 登录页面
Route::post('/admin/dologin','admin\LoginController@dologin'); // 登录方法


/* =============================== 前台登录注册 =============================== */
Route::get('/home/login','home\LoginController@login'); // 前台登录
Route::post('/home/dologin','home\LoginController@dologin'); // 前台登录方法
Route::get('/home/zhuce','home\LoginController@zhuce'); // 前台注册
Route::post('/home/zccz','home\LoginController@zccz');  // 注册方法
Route::any('/home/jihuo','home\LoginController@jihuo');  // 用户激活
Route::get('/home/mima','home\LoginController@mima');  // 忘记密码
Route::get('/home/gpass','home\LoginController@gpass');  // 修改密码
Route::get('/home/captcha','home\LoginController@captcha'); // 验证码
Route::any('/home/gpass_cz','home\LoginController@gpass_cz'); // 修改密码操作
Route::any('/home/pass','home\LoginController@pass');  // 密码重置
Route::any('/edit','home\LoginController@edit'); // 退出登陆

 // ============================== 评价管理 ================================ 
Route::group(['middleware'=>'login'],function(){
	Route::get('/admin/comment/index','admin\CommentController@index');  // 显示页面
	Route::any('/admin/comment/delete','admin\CommentController@delete')->middleware('login'); // 删除操作

	Route::get('/home/comment/create','admin\CommentController@create');  /// 添加评论页面
	Route::any('/home/comment/insert','admin\CommentController@insert');  /// 添加评论操作
	Route::any('/home/comment/comment_over','admin\CommentController@over'); // 评价结束页
	Route::any('/admin/messaje','admin\UserController@messaje'); // 后台个人页面
});

/* =============================== 聊天客服 ================================== */
Route::group(['middleware'=>'login'],function(){
	Route::any('/home/indexs','home\ChatController@indexs'); //  前后台聊天页面公共页面
	Route::post('/admin/chat/create','admin\ChatController@create'); // ajax post 传值到前台页面
	Route::any('/admin/chat','admin\ChatController@chat')->middleware('logins'); // 后台聊天页面
});
Route::any('/home/chat','home\ChatController@chat')->middleware('hlogin'); // 前台聊天页面
Route::post('/home/chat/create','home\ChatController@create'); // ajax post 传值到后台页面