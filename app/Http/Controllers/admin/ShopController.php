<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shop;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $shop=Shop::paginate(5);
       return view('admin.shop.index',['shop'=>$shop]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only(['shop_name','sheng','shi','xian','tel','address','content']);
        if(empty($data['shop_name']) || empty($data['sheng']) || empty($data['shi']) || empty($data['xian']) || empty($data['address'])){
                return back()->with('error','地址或店铺名称不能为空')->withInput();
        }else{
            if($request->has('shop_pic')){

                $data['address']=$data['sheng'].','.$data['shi'].','.$data['xian'].','.$data['address'];
                unset($data['sheng'],$data['shi'],$data['xian']);
                // dump($data);
                $files=rand().time().microtime(true);
                $data['shop_pic']=$files.'.'.$request->file('shop_pic')->getClientOriginalExtension();
                $request->file('shop_pic')->move('./upload/goods/',$data['shop_pic']);
                $res=Shop::create($data);
                if($res){
                    return redirect('/admin/shop')->with('success','添加成功');
                }else{
                    return back()->with('error','添加失败');
                }
            }else{
                return back()->with('error','图片不能为空')->withInput();
            }
           
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
        $shop=Shop::where('id',$id)->first();
        return view('admin.shop.edit',['shop'=>$shop]);
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
        $data=$request->only(['shop_name','sheng','shi','xian','tel','address','content']);
        if(empty($data['shop_name']) || $data['sheng']=='请选择' || $data['shi']=='请选择' || $data['xian']=='请选择' || empty($data['address'])){
                return back()->with('error','地址或店铺名称不能为空')->withInput();
        }else{
                if($request->has('shop_pic')){

                    $data['address']=$data['sheng'].','.$data['shi'].','.$data['xian'].','.$data['address'];
                    unset($data['sheng'],$data['shi'],$data['xian']); 
                    $files=rand().time().microtime(true);
                    $data['shop_pic']=$files.'.'.$request->file('shop_pic')->getClientOriginalExtension();
                    $request->file('shop_pic')->move('./upload/goods/',$data['shop_pic']);
        
                    $res=Shop::where('id',$id)->update($data);
                    if($res){
                        return redirect('/admin/shop')->with('success','修改成功');
                    }else{
                        return back()->with('error','修改失败');
                    }
                }else{
                    $data['address']=$data['sheng'].','.$data['shi'].','.$data['xian'].','.$data['address'];
                    unset($data['sheng'],$data['shi'],$data['xian']);
                    $res=Shop::where('id',$id)->update($data);
                    if($res){
                        return redirect('/admin/shop')->with('success','修改成功');
                    }else{
                        return back()->with('error','修改失败')->withInput();
                    }
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
        $res=Shop::destroy($id);
        if($res){
            return 00;
        }else{
            return 1;
        }
    }
    public function indexs(){ 
        $shop=Shop::paginate(5);
        return view('home.shop.index',['shop'=>$shop,'title'=>'体验店']);
    }
    public function detail($id){
        $shop=Shop::where('id',$id)->first();
        return view('home.shop.detail',['title'=>'实体店','shop'=>$shop]);
        // echo 1;
    }
}
