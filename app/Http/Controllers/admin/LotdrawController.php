<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Change;
use App\Model\Lottery;
use App\Model\Integral;

class LotdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 显示详细信息
        $lot = Change::get();
        return view('admin/orders/lot',[
            'lot' => $lot,
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
        //  显示修改订单信息的表单
        // 查询指定数据
        $lotedit = Change::where('id',$id)->first();
        return view('admin/orders/lotedit',['lotedit'=>$lotedit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {   
        $this->validate($req, [
            'address_user' => 'required',
            'orders_tel' => 'required|numeric',
            'address' => 'required',
        ]);
        // 更新数据
        $arr = $req->except('_token','_method');
        $edit = Change::where('id',$id)->update($arr);
        if($edit){
            return redirect('/admin/lotDraw')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
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
        //  删除指定数据
        $del = Change::where('id',$id)->delete();
        if($del){
            return back()->with('success','删除成功...');
        } else {
            return back()->with('error','删除失败...');
        }
    }

    // ajax 发货
    public function fahuo(Request $req)
    {
        $id = $req -> input('id');
        $fh = Change::where('id',$id)->update(['static'=>1]);
        if($fh){
            return '0';
        } else {
            return '1';
        }
    }

    // 订单详情
    public function lotdetail($id)
    {
        $deliver = Change::where('id',$id)->select('int_id','deliver')->first();
        // 兑换商品
        if($deliver->deliver=='0'){
           $detail = Integral::where('id',$deliver->int_id)->first();
        } else if($deliver->deliver=='1'){
           $detail = Lottery::where('id',$deliver->int_id)->first();
        }
        return view('admin/orders/lotdetail',['detail'=>$detail]);
    }
}
