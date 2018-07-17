<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User_address;
use App\Model\Goods;
use App\Model\Goods_deetail;
use App\Model\Orders;
use App\Model\Orders_detail;
use App\Model\User_detail;
use App\Model\Shopping;
use App\Model\Integral;
use App\Model\Change;
use App\Model\Lottery;
use DB;
use App\Model\Nocreate;

class OrdersController extends Controller
{
    //
    public function address()
    {
        // 用户结算 选择地址
        return view('home/shopping/addr');
    }

    // 查询用户是否有收货地址
    public function addr(Request $req)
    {   
        $gid = $req -> input('gid');
        session(['gid'=>$gid]);
        $sum = $req -> input('sum');
        session(['sum'=>$sum]);
        $gsum = $req -> input('gsum');
        session(['gsum'=>$gsum]);
        $user_id = session('user_id');
        $user_address = User_address::where('user_id',$user_id)->first();
        if($user_address == null){
            return '0';
        }
    }

    //添加收货地址
    public function commit(Request $req)
    {
        if($req -> input('city') == '请选择'){
            return 'city';
        } else if($req -> input('tel') == ''){
            return 'tel';
        } else if($req -> input('user') == ''){
            return 'user';
        } else if($req -> input('detail') == ''){
            return 'detail';
        } else {
            $data = $req -> all();
            $user_addr = User_address::create([
                'user_id' => session('user_id'),
                'address' => $data['addr'],
                'address_tel' => $data['tel'],
                'address_user' => $data['user'],
            ]);
            if($user_addr){
                return '01';
            } else {
                return '02';
            }
        }
    }

    // 确认生成订单页
    public function generate()
    {
        if(!session('user_id')){
            return redirect('/404');
        }
        if(!session('gid')){
            return redirect('/404');
        }
        // 商品的相关信息
        $user_id = session('user_id');
        // $gid = session('gid');
        $gid = explode(',',session('gid'));
        $sum = session('sum');
        $gsum = explode(',',session('gsum'));
        $goods_sum = array_sum($gsum);
        // 查询用户的收货地址
        $addr = User_address::where('user_id',$user_id) -> get();

        // 查询商品
        $count = count($gid)-1;
        $arr = [];
        $stock = [];
        for($i=0;$i<count($gid)-1;$i++){
            $arr[] = Goods::where('id',$gid[$i])->first();
            $stock[] = Goods_deetail::where('g_id',$gid[$i])->select('stock')->first();
        }

        $sk = [];
        foreach($stock as $k=>$v){
            $sk[] = $v->stock;
        }
        
        return view('home/shopping/generate',[
            'addr' => $addr,
            'arr' => $arr,
            'gsum' => $gsum,
            'sk' => $sk,
            'sum' => $sum,
            'goods_sum' => $goods_sum,
            'user_id' => $user_id,
            ]);
    }

    // 生成订单
    public function orders(Request $req)
    {
        // 商品id
        $goods_id = explode(',',session('gid'));
         array_pop($goods_id);
        // 获取购买商品的单价
        $arr = [];
        for($i=0;$i<count($goods_id);$i++){
            $arr[] = Goods::where('id',$goods_id[$i])->select('price')->first();
        }
        
        $brr = [];
        foreach($arr as $k=>$v){
            $brr[] = $v['price'];
        }
        // 购买数量
        $gsum = explode(',',session('gsum'));
        array_pop($gsum);
        // 用户 id
        $user_id = session('user_id');
        if($req -> input('adr') == null){
            return '0';
        }
        try{
            // 开启事务
            DB::beginTransaction();
            // 将积分更新到用户详情表
            $integral = DB::table('user_detail')->value('integral');
            $jf = $integral+$req -> input('jf');
            DB::table('user_detail')->where('user_id',session('user_id'))->update(['integral'=>$jf]);
            // 减去商品对应的余额
            $money = DB::table('user_detail')->value('money');
            $total = $req -> input('total');
            $balance = $money - $total;
            if($balance<0){
                return '3';
            } else {
                DB::table('user_detail') -> where('user_id',session('user_id'))->update(['money'=> $balance]);
            }
            // 获取商品购买的数量
            $data = Goods_deetail::whereIn('g_id',$goods_id)->select('stock','number')->get();
            $ay = [];
            foreach($data as $k=>$v){
                $ay['stock'] = $v->stock-$gsum[$k];
                $ay['number'] = $gsum[$k]+$v->number;
            }
            // 减库存 加销量
            $sto = Goods_deetail::whereIn('g_id',$goods_id)->update($ay);
            // 插入到订单主表 生成订单
            $orders = Orders::create([
                'number' => time().rand(0000,1111).rand(1111,9999).rand(000000,999999),
                'user_id' => $user_id,
                'address_user' => $req ->input('user'),
                'address' => $req -> input('adr'),
                'orders_at' => time(),
                'orders_tel' => $req -> input('tel'),
                'sum' => $req -> input('sum'),
                'total' => $req -> input('total'),
                'orders_msg' => $req -> input('msg'),
            ]);
            // 插入到订单详情表
            $id = $orders -> id ;
            $ord = Orders::find($id);
            $ordes_dei =[] ;
            foreach($goods_id as $k => $v){
                $crr = [];
                $crr['orders_id'] = $id;
                $crr['goods_id'] = $goods_id[$k];
                $crr['price'] = $brr[$k];
                $crr['cnt'] = $gsum[$k];
                $ordes_dei[] = $crr;
            }
            $orders_detail = $ord -> orders_detail() -> createMany($ordes_dei);
        }catch(\Exception $e){
            return '2';
        }
        if($orders && $ord){
            DB::commit();
            // 订单生成 成功 将购物车的信息删除
            Shopping::whereIn('gid',$goods_id)->delete();
            return '1';
        } else {
            DB::rollBack();
            return '2';
        }
    }

    // 订单 生成 成功提示页
    public function success()
    {
        // 查询订单号和总金额
        $orders = Orders::where('user_id',session('user_id')) -> select('number','total')->get();
        $row = count($orders)-1;
        $num = $orders[$row]->number;
        $total = $orders[$row]->total;
        return view('home/shopping/success',['num'=>$num,'total'=>$total]);
    }

    // 立即购买
    public function go(Request $req)
    {
        if(!session('user_id')){
            return '01';
        }
        // 商品 id
        session(['gid'=>$req -> input('gid')]);
        // 购买数量
        session(['gsum'=>$req -> input('sum')]);
        // 规格
        session(['weight'=>$req -> input('size')]);

        return '00';
    }

    
    // 生成立即购买订单
    public function goorders(Request $req)
    {
        // 商品id
        $goods_id =session('gid');
        // 获取购买商品的单价
        $pri = Goods::where('id',$goods_id)->select('price')->first();
        // 用户 id
        $user_id = session('user_id');
        if($req -> input('adr') == null){
            return '0';
        }
        try{
            // 开启事务
            DB::beginTransaction();
            // 将积分更新到用户详情表
            $integral = DB::table('user_detail')->value('integral');
            $jf = $integral+$req -> input('jf');
            DB::table('user_detail')->where('user_id',session('user_id'))->update(['integral'=>$jf]);
            // 减去商品对应的余额
            $money = DB::table('user_detail')->value('money');
            $total = $req -> input('total');
            $balance = $money - $total;
            if($balance<0){
                return '3';
            } else {
                DB::table('user_detail') -> where('user_id',session('user_id'))->update(['money'=> $balance]);
            }
            // 减库存 加销量
            $data = Goods_deetail::where('g_id',$goods_id)->select('stock','number')->first();
            // 购买数量
            $stk = $data->stock-$req -> input('sum');
            // 加销量
            $num = $data->number+$req -> input('sum');
            $data = Goods_deetail::where('g_id',$goods_id)->update([
                'stock' => $stk,
                'number' => $num,
            ]);
            // 插入到订单主表 生成订单
            $orders = Orders::create([
                'number' => time().rand(0000,1111).rand(1111,9999).rand(000000,999999),
                'user_id' => $user_id,
                'address_user' => $req ->input('user'),
                'address' => $req -> input('adr'),
                'orders_at' => time(),
                'orders_tel' => $req -> input('tel'),
                'sum' => $req -> input('sum'),
                'total' => $req -> input('total'),
                'orders_msg' => $req -> input('msg'),
            ]);
            // 插入到订单详情表
            $id = $orders -> id ;
            $ord = Orders::find($id);
            $orders_detail = Orders_detail::create([
                'orders_id' => $id,
                'goods_id' => $goods_id,
                'price' => $pri->price,
                'cnt' => session('gsum'),
                ]);
        }catch(\Exception $e){
            return '2';
        }
        if($orders && $ord){
            DB::commit();
            return '1';
        } else {
            DB::rollBack();
            return '2';
        }
    }


    // 生成兑换商品订单
    public function huan(Request $req)
    {
        // 商品id
        $goods_id =session('gid');
        // 获取购买商品的积分
        $pri = Integral::where('id',$goods_id)->select('price')->first();
        // 用户 id
        $user_id = session('user_id');
        if($req -> input('adr') == null){
            return '0';
        }
        try{
            // 开启事务
            DB::beginTransaction();
            // 将积分更新到用户详情表
            $integral = DB::table('user_detail')->where('user_id',session('user_id'))->value('integral');
            $jf = $integral-$req -> input('total');
            if($jf<0){
                return '3';
            }
            $user = DB::table('user_detail')->where('user_id',session('user_id'))->update(['integral'=>$jf]);
            // 减库存 加销量
            $data = Integral::where('id',$goods_id)->select('stock','salecent')->first();
            // 减库存
            $stk = $data->stock-1;
            // 加销量
            $num = $data->salecent+1;
            $data = Integral::where('id',$goods_id)->update([
                'stock' => $stk,
                'salecent' => $num,
            ]);
            // 插入到订单主表 生成订单
            $orders = Change::create([
                'number' => time().rand(0000,1111).rand(1111,9999).rand(000000,999999),
                'user_id' => $user_id,
                'int_id' => $goods_id,
                'address_user' => $req ->input('user'),
                'address' => $req -> input('adr'),
                'orders_at' => time(),
                'orders_tel' => $req -> input('tel'),
                'total' => $req -> input('total'),
                'orders_msg' => $req -> input('msg'),
            ]);
        }catch(\Exception $e){
            return '2';
        }
        if($orders && $user){
            DB::commit();
            return '1';
        } else {
            DB::rollBack();
            return '2';
        }
    }



    // 生成抽奖商品订单
    public function chous(Request $req)
    {
        // 商品id
        $goods_id = session('gid');
        /* // 获取购买商品的积分
        $pri = Integral::where('id',$goods_id)->select('price')->first(); */
        // 用户 id
        $user_id = session('user_id');
        if($req -> input('adr') == null){
            return '0';
        }
        try{
            // 开启事务
            DB::beginTransaction();
            // 插入到订单主表 生成订单
            $data = Lottery::where('id',$goods_id)->select('stock','salecent')->first();
            // 减库存
            $stk = $data->stock-1;
            // 加销量
            $num = $data->salecent+1;
            $data = Lottery::where('id',$goods_id)->update([
                'stock' => $stk,
                'salecent' => $num,
            ]);
            $orders = Change::create([
                'number' => time().rand(0000,1111).rand(1111,9999).rand(000000,999999),
                'user_id' => $user_id,
                'int_id' => $goods_id,
                'address_user' => $req ->input('user'),
                'address' => $req -> input('adr'),
                'orders_at' => time(),
                'orders_tel' => $req -> input('tel'),
                'deliver' => '1',
                'total' => 0,
                'orders_msg' => $req -> input('msg'),
            ]);
        }catch(\Exception $e){
            return '2';
        }
        if($orders){
            DB::commit();
            return '1';
        } else {
            DB::rollBack();
            return '2';
        }
    }







    // 生成抽奖商品订单
    public function chou()
    {
        return 1;
    }


    public function goshopping()
    {
        // 用户 id 
        $user_id = session('user_id');
        if(!$user_id){
            return redirect('/404');
        }
        // 商品id
        $id = session('gid');
        if(!$id){
            return redirect('/404');
        }
        // 购买数量
        $sum = session('gsum');
        // 规格
        $size = session('weight');
        // 查询商品信息
        $goods = Goods::where('id',$id)->first();
        // 查询商品的库存
        $goods_stock = Goods_deetail::where('g_id',$goods->id)->select('stock')->first();
        // 获取用户的地址信息
        $addr = User_address::where('user_id',$user_id)->get();
        return view('home/go/shopping',[
            'user_id' => $user_id,
            'goods' => $goods,
            'sum' => $sum,
            'size' => $size,
            'addr' => $addr,
            'goods_stock' => $goods_stock,
        ]);
    }





    // 取消订单 将商品信息在未付款订单显示
    public function nocreate(Request $req)
    {
        // 用户 id
        $user_id = session('user_id');
        // 商品 id
        $goods_id = session('gid');
        $goods_id = explode(',',$goods_id);
        array_pop($goods_id);
        // 将信息插入未生成订单表
        $nocreate = [];
        foreach($goods_id as $k=>$v){
            $arr = [];
            $arr['goods_id'] = $v;
            $arr['user_id'] = $user_id;
            $arr['create_at'] = time();
            $nocreate[] = $arr;
        }
        $no = DB::table('nocreate')->insert($nocreate);
        if($no){
            return '0';
        } else {
            return '1';
        }
    }

}
