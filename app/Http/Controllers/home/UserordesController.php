<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Orders;
use App\Model\Orders_detail;
use App\Model\Goods;
use DB;

class UserordesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 订单表和订单详情表 一对多获取数据  with
        /* $orders = Orders::with('orders_detail')->where('user_id',session('user_id'))->get();
        // dump($orders);
        $orders_detail = Orders_detail::with('goods_orders')->whereIn('orders_id',$arr)->get(); */

        // join
        $data = DB::table('orders_detail')
            ->join('orders', 'orders.id', '=', 'orders_detail.orders_id')
            ->join('goods', 'goods.id', '=', 'orders_detail.orders_id')
            ->get();
        dump($data);
        exit;
        /* $orders = Orders::with('orders_detail')->where('user_id',session('user_id'))->get();
        foreach($orders as $k=>$v){
            foreach($v->orders_detail as $j=>$x){
                $data = Orders_detail::with('goods_orders')->get();
                dump($data);
            }
        }
        exit; */
        /* foreach($data as $k=>$v){
            dump($v);
        }
        exit; */
        // 显示用户的所有订单
        return view('home/userorders/index',[
            'data' => $data,
            
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
