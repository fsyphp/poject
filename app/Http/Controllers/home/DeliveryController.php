<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Orders;
use App\Model\Orders_detail;
use App\Model\Nocreate;
use App\Model\Change;
use DB;

class DeliveryController extends Controller
{
    // 待发货
    public function when()
    {   
        // 我的订单
        $orders = new Orders();
        $data = $orders -> demo();

        // 查询未完成订单
        $no = Nocreate::where('user_id',session('user_id'))->get();
        // 查询未发货订单
        $orders = new Orders();
        $when = $orders -> when();
        // 查询抽奖和兑换后未发货的商品
        $wei = Change::where('static',0)->where('user_id',session('user_id'))->get();
        return view('home/userorders/when',[
            'data'=>$data,
            'no'=>$no,
            'when'=>$when,
        ]);
    }

    // 待收货
    public function collect()
    {
        // 我的订单
        $orders = new Orders();
        $data = $orders -> demo();

        // 查询未完成订单
        $no = Nocreate::where('user_id',session('user_id'))->get();
        // 查询已发货订单
        $orders = new Orders();
        $coll = $orders -> coll();
        return view('home/userorders/collect',[
            'data' => $data,
            'no' => $no,
            'coll' => $coll,
            ]);
    }

    // 交易完成
    public function success()
    {
        // 我的订单
        $orders = new Orders();
        $data = $orders -> demo();

        // 查询未完成订单
        $no = Nocreate::where('user_id',session('user_id'))->get();
        // 查询已收货订单
        $orders = new Orders();
        $success = $orders -> success();

        return view('home/userorders/success',[
            'success' => $success,
            'data' => $data,
            'no' => $no,
            ]);
    }

    // ajax 确认收货
    public function belong(Request $req)
    {
        $id = $req -> input('id');
        $orders = Orders::where('id',$id)->update(['static'=>2]);
        if($orders){
            return '00';
        } else {
            return '01';
        }
    }

    // ajax 删除已收货订单
    public function delete(Request $req)
    {
        $id = $req -> input('id');
        //  开启事务
        DB::beginTransaction();
        // 删除订单主表的数据
        $del = Orders::where('id',$id)->delete();
        // 删除订单详情表中的内容
         $detail_del = Orders_detail::where('orders_id',$id)->delete();
        if($del && $detail_del){
            // 提交
            DB::commit();
            return '00';
        } else {
            // 回滚
            DB::rollBack();
            return '01';
        }
    }
}
