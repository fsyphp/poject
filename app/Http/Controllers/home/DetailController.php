<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\Model\Goods_deetail;
class DetailController extends Controller
{
    public function detail($id)
    {
       $re=Goods_deetail::with('goods')->orderBy('number','desc')->paginate(6); 
       
       $goods=Goods::where('id',$id)->with('detail')->first(); 
       return view('home.detail.detail',['goods'=>$goods,'title'=>'商品详情页','re'=>$re]);
    }
    public function chou_list(Request $request){

    }
}
