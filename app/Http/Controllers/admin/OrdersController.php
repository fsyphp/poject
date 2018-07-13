<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Orders;
use App\Model\Orders_detail;
use App\Model\Goods;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查询订单信息
        $orders = Orders::get();
        // 显示订单信息
        return view('admin/orders/index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Orders::where('id',$id)->first();
        // 显示修改订单页面
        return view('admin/orders/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        // 修改订单
        $orders = $req -> except('_token','_method');
        $upd = Orders::where('id',$id)->update($orders);
        if($upd){
            return redirect('/admin/orders')->with('success','修改成功...');
        } else {
            return back()->with('error','修改失败...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 删除订单主表信息
        // 开启事务
        DB::beginTransaction();
        $del = Orders::where('id',$id)->delete();
        // 删除订单详情表信息
        $detail_del = Orders_detail::where('orders_id',$id)->delete();
        if($del && $detail_del){
            // 提交
            DB::commit();
            return redirect('/admin/orders')->with('success','删除成功...');
        } else {
            DB::rollBack();
            return back()->with('error','删除失败...');
        }
    }

    // 订单详情
    public function ordersdetail($id)
    {
        $orders_detail = Orders_detail::where('orders_id',$id)->get();
        //查询商品信息
        $arr = [];
        foreach($orders_detail as $k=>$v){
            $arr[] = $v->goods_id;
        }
        $goods = Goods::whereIn('id',$arr)->get();
        $brr = [];
        $crr = [];
        foreach($goods as $k=>$v){
            $brr[] = $v->gname;
            $crr[] = $v->gpic;
        }
        return view('admin/orders/detail',[
            'orders_detail'=>$orders_detail,
            'brr' => $brr,
            'crr' => $crr,
            ]);
    }
    
    // 商品发货
    public function sends(Request $req)
    {
        $st = Orders::where('id',$req -> input('id')) ->update(['static'=>1]);
        if($st){
            return '0';
        } else {
            return '1';
        }
    }

}
