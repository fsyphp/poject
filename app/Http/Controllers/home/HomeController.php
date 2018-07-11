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
use App\Model\Cate;

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
        // 酒
        $jiu=Cate::where('path','like','%,15,%')->select('id')->get();
        foreach($jiu as $k=>$v){
            $j[]=$v->id;
        } 
        $jius=Goods::whereIn('category_id',$j)->paginate(4);
        // 食品
        $shi=Cate::where('path','like','%,7,%')->select('id')->get();
        foreach($shi as $k=>$v){
            $ship[]=$v->id;
        }
        $shipin=Goods::whereIn('category_id',$ship)->paginate(4);
        // 服装
        $fu=Cate::where('path','like','%,132,%')->select('id')->get();
        foreach($fu as $k=>$v){
            $fuz[]=$v->id;
        }
        $fuzhuang=Goods::whereIn('category_id',$fuz)->paginate(4); 
        return view('welcome',['maio'=>$maio,'xin'=>$xin,'chou'=>$chou,'dui'=>$dui,'re'=>$re,'fuzhuang'=>$fuzhuang,'jius'=>$jius,'shipin'=>$shipin,'lunbo'=>$lunbo,'title'=>'超市首页']);
    } 
}
   