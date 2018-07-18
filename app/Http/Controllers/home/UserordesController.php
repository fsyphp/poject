<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Orders;
use App\Model\Orders_detail;
use App\Model\Goods; 
use App\Model\Nocreate;
use App\Model\User_address;
use App\Model\Integral;
use App\Model\Change;
use App\Model\Lottery;

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

        $model = new Orders();
        $data = $model->demo();
        // dd($data);

        // 订单表和订单详情表 一对多获取数据  with
        /* $orders = Orders::with('orders_detail')->where('user_id',session('user_id'))->get();
        // dump($orders);
        $orders_detail = Orders_detail::with('goods_orders')->whereIn('orders_id',$arr)->get(); */

        // join
        /* $data = DB::table('orders_detail')
            ->join('orders', 'orders.id', '=', 'orders_detail.orders_id')
            ->join('goods', 'goods.id', '=', 'orders_detail.orders_id')
            ->get(); 
        dump($data);
        exit; */

        $orders = new Orders();
        $data = $orders -> demo();
        if($data == null){
            $data = [];
        }
        // 查询未完成订单
        $no = Nocreate::where('user_id',session('user_id'))->get();
        // dump($data);  
        // exit;
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
    // 确认兑换商品
    public function act(Request $req)
    {
        if(!session('user_id')){
            return '02';
        }
        session(['gid'=>$req->input('id')]);
        return '00';
    }


    // 显示兑换商品订单生成页面
    public function scdd()
    {
        if(!session('user_id')){
            return redirect('/404');
        }
        if(!session('gid')){
            return redirect('/404');
        }
        // 商品的相关信息
        $user_id = session('user_id');
        // 查询用户的收货地址
        $addr = User_address::where('user_id',$user_id) -> get();
        // 查询商品
        $goods = Integral::where('id',session('gid'))->first();
        /* dump($goods);
        dump($addr);
        exit; */
        return view('home/go/scdd',[
            'addr' => $addr,
            'goods' => $goods,
            'user_id' => $user_id,
        ]);
    }

    // 抽奖商品信息入库
    // public function 

    // 兑换商品订单显示
    public function exchange()
    {
        // 查询兑换商品信息
        $int = Change::with('int')->where('deliver',0)->get();
        return view('home/Integral/int',[
            'data' => [],
            'no' => [],
            'int' => $int,
            ]);
    }

    // 抽奖商品生成订单提示
    public function jiesuan($id)
    {
        session(['gid'=>$id]);
        // 商品的相关信息
        $user_id = session('user_id');
        // 查询用户的收货地址
        $addr = User_address::where('user_id',$user_id) -> get();
        // 查询抽奖商品的信息
        $goods = Lottery::where('id',$id)->first();
        return view('admin/Integral/draw',[
            'addr' => $addr,
            'user_id'=> $user_id,
            'goods' => $goods,
        ]);
    }

    public function draw()
    {
        // 查询抽奖商品信息
        $chou = Change::with('lot')->where('deliver',1)->get();
        return view('home/userorders/draw',[
            'data' => [],
            'no' => [],
            'chou' => $chou,
        ]);
    }

    // 待付款订单
    public function nocreate()
    {
        //  查询我的已付款订单数
        $orders = new Orders();
        $data = $orders -> demo();
       
        // 查询我的未完成订单数
        $no = Nocreate::with('nogoods')->where('user_id',session('user_id'))->get(); 
        return view('home/userorders/nocreate',[
            'data' => $data,
            'no' => $no,
        ]);
    }

    // 删除未完成订单
    public function del(Request $req)
    {
        $id = $req -> input('id');
        $del = Nocreate::where('id',$id)->delete();
        if($del){
            return '00';
        } else {
            return '01';
        }
    } 
}
