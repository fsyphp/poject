<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lottery;
use DB;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //显示奖品
        $lottery = Lottery::where('title','like', '%'.$req -> input('title').'%') -> paginate(5);
        return view('admin/lottery/index',[
            'lottery'=>$lottery,
            'title' => $req -> input('title'),
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
        return view('admin/lottery/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //表单验证
        $this->validate($req, [
            'title' => 'required|unique:lottery',
            'stock' => 'required|regex:/^\d+$/',
            'status' => 'regex:/^[0,1]$/',
            'desc' => 'required',
        ],[
            'title.required' => '奖品名称不得为空!',
            'title.unique' => '奖品名称已存在!',
            'stock.required' => '请填写奖品库存',
            'stock.regex' => '库存只能是数字',
            'status.regex' => '非法操作',
            'desc.required' => '请填写奖品介绍',
        ]);
        //接收表单传过来的值
        $lottery = $req -> except('_token','img');
        $lottery['create_at'] = time();
        $img = $req -> hasFile('img');
        if(!$img){
            return back()->with('error','请上传奖品图片');
        } else {
            //生成商品图片名
            $img_name = uniqid(true).time();
            //获取文件后缀名
            $hz = $req -> file('img')->getClientOriginalExtension();
            //移动图片
            $req -> file('img') -> move('./lottery_img/'.date('Y/m/d'),$img_name.'.'.$hz);
            $lottery['img'] = '/lottery_img/'.date('Y/m/d/').$img_name.'.'.$hz;
        }
        try{
            $num = Lottery::create($lottery);
            if($num){
                return redirect('/admin/lottery')->with('添加成功!');
            } else {
                return back() -> with('error','添加失败!');
            }
        }catch(\Expction $e){
            return back() -> with('error','添加失败!');
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
        $ed = Lottery::find($id);
        //显示修改模板
        return view('admin/lottery/edit',['ed' => $ed]);
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
        //将获取过来的数据更新到数据库
        //表单验证
        $this->validate($req, [
            'title' => 'required',
            'stock' => 'required|regex:/^\d+$/',
            'status' => 'regex:/^[0,1]$/',
            'desc' => 'required',
        ],[
            'title.required' => '奖品名称不得为空!',
            'stock.required' => '请填写奖品库存',
            'stock.regex' => '库存只能是数字',
            'status.regex' => '非法操作',
            'desc.required' => '请填写奖品介绍',
        ]);
        //接收表单传过来的值
        $lottery = $req -> except('_token','img','_method');
        $data_img = Lottery::find($id);
        //检测是否有文件上传
        $img = $req -> hasFile('img');
        if(!$img){
            $lottery['img'] = $data_img -> img;
        } else {
            //删除原图片
            unlink('.'.$data_img->img);
            //生成商品图片名
            $img_name = uniqid(true).time();
            //获取文件后缀名
            $hz = $req -> file('img')->getClientOriginalExtension();
            //移动图片
            $req -> file('img') -> move('./lottery_img/'.date('Y/m/d'),$img_name.'.'.$hz);
            $lottery['img'] = '/lottery_img/'.date('Y/m/d/').$img_name.'.'.$hz;
        }
        $row = Lottery::where('id',$id)->update($lottery);
        if($row){
            return redirect('/admin/lottery')->with('seccess','修改成功');
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
        //
        $row = Lottery::where('id',$id)->delete();
        if($row){
            return redirect('/admin/lottery')->with('success','删除成功!');
        } else {
            return redirect('/admin/lottery')->with('error','删除失败!');
        }
    }

    public function static(Request $req)
    {
        $id = $req -> input('id');
        $lottery = Lottery::find($id);
        if( $lottery->static == 1 ){
             $num = lottery::where('id',$id) -> update([
                 'static' => 0,
             ]);
            if($num){
                return '1';
            }
        } else {
             $num = lottery::where('id',$id) -> update([
                 'static' => 1,
             ]);
            if($num){
                return '0';
            }
        }
    }
}
