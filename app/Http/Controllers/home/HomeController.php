<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\Model\Goods_deetail;
use App\Model\Lottery;
use App\Model\Integral;
use DB;
use App\Model\Banner;
class HomeController extends Controller
{
    public function index(){
        $maio=Goods::where('g_static','0')->get(); 
        $xin=Goods::where('g_static','1')->paginate(5);
        $chou=Lottery::paginate(5);
        $dui=Integral::paginate(5);
        // $re=Goods::with('detail')->orderBy('number')->paginate(5);
        $lunbo=Banner::paginate(5);
        $re=Goods_deetail::with('goods')->orderBy('number','desc')->paginate(5);  
        return view('welcome',['maio'=>$maio,'xin'=>$xin,'chou'=>$chou,'dui'=>$dui,'re'=>$re,'lunbo'=>$lunbo,'title'=>'超市首页']);
    } 
}
