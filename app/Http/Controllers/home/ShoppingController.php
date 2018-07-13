<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shopping;
use Sessionn;
use Cookie;
use App\Model\Goods;
use App\Model\User;
use Hash;

class ShoppingController extends Controller
{

    //添加商品到购物车
    public function shoppadd(Request $req)
    {
        $user_id = session('user_id');
        // return $user_id;
        if(!$user_id){
            return '0';
        } else {
            $cart = $req -> all();
            $data = Shopping::where('gid',$cart['gid'])->where('user_id',$user_id)->first();
            if($data){
                if($cart['sum'] == $data->sum && $cart['size'] == $data->size){
                    return '2';
                } else {
                    $upd = Shopping::where('gid',$cart['gid'])->update([
                        'size'=> $cart['size'],
                        'sum'=> $cart['sum'],
                    ]);
                    if($upd){
                        return '1';
                    } else {
                        return '2';
                    }
                }
            }
            try{
                $row = Shopping::create([
                'gid' => $cart['gid'],
                'user_id' => $user_id,
                'size'=> $cart['size'],
                'sum'=> $cart['sum'],
                ]);
                if($row){
                    return '1';    
                }
            }catch(\Exception $e){
                return '2';
            }
        }
    }

    //展示购物车的内容
    public function show(Request $req)
    {
        // $_SESSION['user_id'] = 1;
        //用户登录的 id
        $id = session('user_id');
        if(!$id){
            return redirect('/404');
        }
        // 获取用户对应的购物车的信息
        $shop = Shopping::where('user_id',$id) -> get();
        $sum = [];
        $size = [];
        $gid = [];
        foreach($shop as $k=>$v){
            $sum[] = $v->sum;
            $size[] = $v->size;
            $gid[] = $v->gid;
        }
        // 获取商品的详细信息
        $goods = [];
        foreach($shop as $k=>$v){
            $id = $v->gid;
            $goods[] = Goods::find($id);
        }
        $info = true;
        if(empty($goods)){
            $info = false;
        }
        return view('home/shopping/cart',[
            'goods' => $goods,
            'sum' => $sum,
            'size' => $size,
            'gid' => $gid,
            'info' => $info,
        ]);
        /* $goods = [];
        foreach($data as $k=>$v){
            $goods[] = $v->gname;
            $goods[] = $v->gpic;
            $goods[] = $v->price;
        } */
        // /* $cart = [];
        // foreach($shop as $k=>$v){
        //     $cart[] = Goods::where('id',$v->gid)->get();
        // }
        // // $cart = Goods::where('id',[implode(',',$arr)])->get();
        // // dump($cart);
        // // exit;
        // $arr = [];
        // foreach($cart as $k=>$v){
        //     foreach($v as $j=>$x){
        //         $arr['gname'] = $x->gname;
        //         $arr['gpic'] = $x->gpic;
        //         $arr['price'] = $x->price;
        //     }
        //     // dump($v->gname);
        //     /* $arr['gname'] = $v->gname;
        //     $arr['gpic'] = $v->gpic;
        //     $arr['price'] = $v->price; */
        // }
        // echo '<pre>';
        // dump($arr);
        // exit; */
    }

    //通过 ajax 移除购物车中的商品
    public function del(Request $req)
    {
        $gid = $req -> input('gid');
        $row = Shopping::where('gid',$gid)->where('user_id',session('user_id'))->delete();
        if($row){
            return '1';
        } else {
            return '0';
        }
    }

    public function add()
    {
        session(['user_id'=>null]);        
    }

    //
    /* public function shoppadd(Request $req)
    {
        $shop_info = $req -> all();
        $gid = $req ->input('gid');
        $size = $req ->input('size');
        $sum = $req ->input('sum');
        if(session('user_id')){
            Shopping::create([
                'gid' => $gid,
                'size' => $size,
                'sum' => $sum,
                'user_id' => session('user_id'),
                ]);
        } else {
            $goods = [];
            $arrCart[] = array(    // 要添加到cookie中的商品数据   以数组的方式可以避免多个的话覆盖
                'gid' => $shop_info['gid'],
                'sum' => $shop_info['sum'],
                'size' => $shop_info['size'],
            );
            //序列化数组
            $arr_cart = serialize($arrCart);
            //将序列化的数组存入 cookie
            setcookie('cart',$arr_cart,time()+36000);
        }
        // $cookie = stripslashes ( $_COOKIE ['cart'] );    //去除addslashes添加的反斜杠
        exit;
        // $arr = ($cookie);
        var_dump( unserialize(cookie()) );
    }
    public function add()
    {
        $cartUnSer = unserialize ( $_COOKIE['cart'] );       //反序列化cookie
        echo '<pre>';
        var_dump($cartUnSer);
        echo '<hr>';
        var_dump( count($cartUnSer) );
    } */

    // 添加购物车 用户登录窗口
    public function shop_login()
    {
        return view('home/shopping/shop_login');
    }

    // ajax 验证账号密码
    public function shoplogin(Request $req)
    {
        if(!$req -> input('uname') || !$req -> input('pass')){
            return '01';
        }
        $uname = $req -> input('uname');

        $pass = $req -> input('pass');

        // 通过用户名查询密码
        $user = User::where('uname',$uname)->select('pass','id')->first();
        if(!$user){
            return '02';
        }
        // 验证密码
        if (Hash::check($pass, $user->pass)) {
            session(['user_id'=>$user->id]);
            $req->session()->flash('success', 'success');
            return '00';
        } else {
            return '02';
        }
    }
}


