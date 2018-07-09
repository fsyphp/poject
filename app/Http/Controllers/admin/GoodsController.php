<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cate;
use DB;
use App\Http\Requests\GoodsRequest;
use App\Model\Goods;
use App\Model\Goods_deetail;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 
        $data=Goods::where('gname','like','%'.$request->input('gname').'%')->where('price','like','%'.$request->input('price').'%')->with('detail')->paginate($request->input('num',10));
        // $data=Goods::orderBy('id','asc')
        //     ->where(function($query) use($request){
        //         $gname=$request->input('gname');
        //         $price=$request->input('price');
        //         if(!empty($gname)){
        //             $query->where('gname','like','%'.$gname.'%');
        //         }
        //         if(!empty($price)){
        //             $query->where('price','like','%'.$price.'%');
        //         }
        // })->with('detail')->paginate($request->input('num','10')); 
        return view('admin.Goods.index',['data'=>$data,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       $cate=Cate::Cates();
        return view('admin.Goods.create',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        // $this->validate($request,[
        //     'gname' => 'required|regex:/^\w{6,12}$/',
        //     'price' => 'required|regex:/^\d{1,7}$/'
        //     ],[
        //         'gname.required'=>'用户名不能为空',
        //         'price.regex'=>'用户名格式不正确' 
        //     ]);
        // 商品主表信息 
                $goods=$request->only(['gname','category_id','price','g_static']);
        
                if(empty(trim($goods['gname']))){
                    return back()->with('error','商品名称不能为空')->withInput();
                }else if(empty(trim($goods['price']))){
                    return back()->with('error','价格不能为空')->withInput();
                }
                if($request->has('gpic')){
                        $files=rand().time().microtime(true);
                        $goods['gpic']=$files.'.'.$request->file('gpic')->getClientOriginalExtension();
                        $request->file('gpic')->move('./upload/goods/',$goods['gpic']);
                }else{
                    return back()->with('error','商品图片不能为空')->withInput();
                } 

                
        // 商品详情信息
                $goods_detail=$request->only(['gram','stock','baby']);
                $goods_detail['gram']=implode(',',$goods_detail['gram']);
               
                if(empty($goods_detail['stock'])){
                    return back()->with('error','库存不能为空')->withInput();
                }else if(empty($goods_detail['baby'])){
                    return back()->with('error','详情不能为空')->withInput();
                }

                $manypic=$request->file('manypic'); 
                if($request->has('manypic')){ 
                    foreach($manypic as $k=>$v){
                    //   $arr[]=$v->getClientOriginalName();
                        $name=rand().time().microtime(true);
                        $arr[]=$files=$name.'.'.$v->getClientOriginalExtension();
                        $v->move('./upload/goods/',$files);
                    } 
                    $goods_detail['manypic']=implode(',',$arr);
                    // dump($request->except(['_token','gpic','manypic']));
                }else{
                        return back()->with('error','请添加详情图片')->withInput();
                }
              
              
                try{
                    if(empty(Goods::where('gname',$goods['gname'])->first())){
                        $data=Goods::create($goods); 
                        $id=$data->id; 
                        $goods_detail['g_id']=$id; 
                        $goods_del=Goods::find($id); 
                        $goods_del->detail()->create($goods_detail);
                        return redirect('/admin/goods')->with('success','添加成功');
                    }else{
                        return back()->with('error','商品已存在')->withInput();
                    }
                   
                }catch(\Exception $e){
                    return back()->with('error','添加失败')->withInput();
                 }
                
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
        $data=Goods::where('id',$id)->with('detail')->first(); 
        echo $data['detail']['stock'];
        return view('admin.Goods.edit',['data'=>$data]);
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
        // 主表处理
         if($request->has('gpic')){ 
            $name=rand().time().microtime(true);
            $files=$name.'.'.$request->file('gpic')->getClientOriginalExtension();
            $request->file('gpic')->move('./upload/goods/',$files);
            $goods=$request->only(['category_id','gname','price','g_static']);
            $goods['gpic']=$files;
            $upload=Goods::where('id',$id)->first()->gpic;
            // $link='./upload/goods/'.$upload;
        // 删除原图
            // unlink($link);
            $data=Goods::where('id',$id)->update($goods);
            $goods_del=$request->only(['gram','stock','baby']);
            $goods_del['gram']=implode(',',$goods_del['gram']);

        // 附表处理
                if($request->has('manypic')){
                    $manypic=Goods_deetail::where('g_id',$id)->first()['manypic'];
                    $manypic=explode(',',$manypic);
                // 删除原图
                //    foreach($manypic as $k=>$v){
                    //    $link='./upload/goods/'.$v;
                    //    unlink($link);
                //    }
                    $arr=[];
                    foreach($request->file('manypic') as $k=>$v){
                        $name=rand().time().microtime(true);
                        $files=$name.'.'.$v->getClientOriginalExtension();
                        $v->move('./upload/goods/',$files);
                        $arr[]=$files;
                    }
                    $goods_del['g_id']=$id;
                    $goods_del['manypic']=implode(',',$arr);
                  
                }else{
                    echo 3;
                } 
                $res=Goods_deetail::where('id',$id)->update($goods_del);
                if($res){
                    return redirect('/admin/goods')->with('修改成功');
                }else{
                    return back()->with('error','修改失败');
                }
         }else{
            //  如果没有换图片处理
            // 主表    
                $goods=$request->only(['category_id','gname','price','g_static']); 
                Goods::where('id',$id)->update($goods);
            // 附表
                $goods_del=$request->only(['gram','stock','baby']);
                $goods_del['gram']=implode(',',$goods_del['gram']);
                // $goods_del['g_id']=$id;
                // dd($goods_del);
                $res=Goods_deetail::where('g_id',$id)->update($goods_del);
                if($res){
                    return redirect('/admin/goods')->with('success','修改成功');
                }else{
                    return back()->with('error','修改失败');
                }
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
        $goods=Goods::find($id);
        $goods->delete();
        $res=$goods->detail()->delete();
        if($res){
            return 00;
        }else{
            return 11;
        }

    }
    // 上下架
  
    public function sj(Request $request){
        $id=$request->input('id');
        $g_static=Goods::where('id',$id)->first()->g_static; 
        if($g_static=='3'){
            $data['g_static']='2';
            $res=Goods::where('id',$id)->update($data);
           
        }else{ 
            $data['g_static']='3';
            $res=Goods::where('id',$id)->update($data);
             
        } 
            $mes['static']=$data['g_static'];
            $mes['mes']=1;
            if($res){
               return $mes;
            }else{
                return 0;
            }
    }    
    
}
