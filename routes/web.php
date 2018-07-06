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
// 商品管理
Route::resource('admin/goods','admin\GoodsController');

//积分商品管理
Route::resource('admin/integral','admin\IntegralController');

//通过ajax修改积分商品名称
Route::post('admin/title','admin\IntegralController@title');


//轮播
Route::get('admin/banner/index','admin\BannerController@index');
Route::get('admin/banner/create','admin\BannerController@create');
Route::post('admin/banner/store','admin\BannerController@store');
Route::get('admin/banner/edit/{id}','admin\BannerController@edit');
Route::post('admin/banner/update/{id}','admin\BannerController@update');
Route::get('admin/banner/destroy/{id}','admin\BannerController@destroy');









