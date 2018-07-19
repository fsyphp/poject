<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\Model\Goods_deetail;
use App\Model\Lottery;
use App\Model\Integral;
use App\Model\Cate;  
use App\Model\Admin\Comment;  
use App\Model\Admin\Users;
use DB; 
class DetailController extends Controller
{
    public function detail($id)
    {
        $comment = Comment::where('g_id',$id)->get(); // 根据商品id获取数据
        // dd($comment[0]->user_id);
        if(!empty($comment[0])){
            foreach($comment as $k=>$v){
                $u_id[] = $v -> user_id;
            }

            $user = Users::where('id',$u_id)->with('user_detail')->get();
        }else{
            $user = '';
        }

        /*============ 上面魏远洋的代码 ==============*/
       $re=Goods_deetail::with('goods')->orderBy('number','desc')->paginate(6);
       $goods=Goods::where('id',$id)->with('detail')->first(); 
       return view('home.detail.detail',['goods'=>$goods,'title'=>'商品详情页','re'=>$re,'comment'=>$comment,'user'=>$user]);
    }
    // 积分兑换列表页
    public function integral(){
        $goods=Integral::paginate(12);
        return view('home.integral.list',['goods'=>$goods,'title'=>'积分兑换列表页']);
    }

    // 抽奖商品列表页
    public function lottery(){
        $lottery=DB::table('user_detail')->where('user_id',session('user_id'))->select('integral')->first();  
        $goods=json_encode(Lottery::get());
        return view('home.lottery.list',['goods'=>$goods,'title'=>'抽奖商品列表页','lottery'=>$lottery]);
    }
    public function chou(Request $request){
        $lottery=DB::table('user_detail')->where('user_id',$request->input('id'))->select('integral')->first();
        $num=$lottery->integral-1000;
        $res['integral']=$num;
        try{
            $data=Db::table('user_detail')->where('user_id',$request->input('id'))->update($res);
            return $num;

        }catch(\Exception $e){
            return 0;
        }
    }

    // 用户收藏
    public function cang($id)
    {
        $row = DB::table('collect')->insert(['gid'=>$id,'uid'=>session('user_id')]);
        if($row){
            return redirect('/home/collect/index')->with('success','收藏成功');
        } else {
            return back()->with('error','收藏失败');
        }
    }



// 商品列表页
   public function goodlist(Request $request){    
        // $goods=Goods::where(function($query) use($request){  
        //             $id=$request->input('id');
        //             $gname=$request->input('gname'); 
        //             $cid[]=$request->input('id'); 
        //             $id=DB::table('category')->where('path','like',"%,{$request->input('id')},%")->select('id')->get()->toArray(); 
        //             foreach($id as $k=>$v){
        //                 $cid[]=$v->id;
        //             }  
        //             if(!empty($gname)){
        //                 $query->where('gname','like','%'.$gname.'%');
        //             }
        //             if(!empty($id)){
        //                 $query->whereIn('category_id',$cid); 
        //             }
        //     })->paginate(12)->appends($request->all()); 
        //     dump($goods);
            // if($goods)
           $id=$request->input('id');
           if(!empty($id)){
            //    查询子分类
               $cate_id=Cate::where('path','like','%,'.$id.',%')->select('id')->get();
                        // 判断子分类是否为空
                        if(empty($cate_id)){
                                $goods=Goods::where('category_id',$id)->paginate(12);
                                // dump($goods);
                        }else{
                                $category_id[]=$id;
                                foreach($cate_id as $k=>$v){
                                    $category_id[]=$v->id;
                                }
                                $goods=Goods::whereIn('category_id',$category_id)->paginate(12)->appends($request->all()); 
                        } 
           }else{
                $goods=Goods::where(function($query) use($request){
                        $gname=$request->input('gname');
                        if(!empty($gname)){
                            $query->where('gname','like','%'.$gname.'%');
                        }
                })->paginate(12)->appends($request->all()); 
           }
               
           
            return view('home.goods.goodlist',['title'=>'商品列表页','goods'=>$goods]);

        }
    
        // 秒杀列表
        public function miao_list(){
            $goods=Goods::where('g_static','0')->paginate(12); 
            return view('home.miao.list',['title'=>'秒杀专区','goods'=>$goods]);
        }

   }



  

