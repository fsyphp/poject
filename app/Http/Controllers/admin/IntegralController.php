<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Model\Integral;
use App\Http\Requests\FormRequest;

class IntegralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {   
        if(!empty($req -> input('price'))){

            $integral = Integral::where('title','like','%'.$req -> input('title').'%') -> where('price',$req -> input('price')) -> paginate(5);

        } else {

            $integral = Integral::where('title','like','%'.$req -> input('title').'%') -> where('price','like','%'.$req -> input('price').'%') -> paginate(5);
        }
        //查询数据
        $title = $req -> input('title');
        $price = $req -> input('price');
        //显示积分商品
        return view('admin/integral/index',[
            'title'=>'浏览积分商品',
            'integral' => $integral,
            'title' => $title,
            'price' => $price,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示积分兑换商品添加表单
        return view('admin/integral/create',['title'=>'积分商品添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $req)
    {
        //接收表单传过的值
        $integral = $req -> except('_token','img');
        //商品图片上传
        $integral_img = $req -> hasFile('img');
        if(!$integral_img){
            return back()->with('error','请上传商品图片');
        } else {
            //生成图片名称
            $img_name = uniqid(true).time().rand(0000,9999);
            //获取上传文件的后缀名
            $hz = $req -> file('img')->getClientOriginalExtension();
            //上传缩略图
            // $image = Image::make($req->file('img'))->resize(100, null, function ($constraint) {$constraint->aspectRatio();})->save('./integral_img/'.date('Y/m/d'), $img_name.'.'.$hz);
            //移动上传文件
            $img= $req->file('img')->move('./integral_img/'.date('Y/m/d'), $img_name.'.'.$hz);

            $img = '/integral_img/'.date('Y/m/d').'/'. $img_name.'.'.$hz;
        }
        $integral['img'] = $img;
        //添加时间
        $integral['create_at'] = time();
        
        //将数据存入数据库
        try{
            $da = Integral::create($integral);
            if($da){
                return redirect('/admin/integral')->with('success','添加成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加失败');
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
        //获取指定数据
        $integral = Integral::find($id);
        //显示修改的表单
        return view('admin/integral/edit',[
            'title' => '修改积分商品',
            'integral' => $integral, 
            ]);
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
        //更新数据到数据库
        $data = $req -> except('_token','_method');
        $is_img = $req -> hasFile('img');
        if($is_img){
            //先删除图片
            $img = Integral::find($id);
            $link = $img -> img;    
            unlink('.'.$link);
            //生成图片名称
            $img_name = uniqid(true).time().rand(0000,9999);
            //获取上传文件的后缀名
            $hz = $req -> file('img')->getClientOriginalExtension();
            //上传缩略图
            // $image = Image::make($req->file('img'))->resize(100, null, function ($constraint) {$constraint->aspectRatio();})->save('./integral_img/'.date('Y/m/d'), $img_name.'.'.$hz);
            //移动上传文件
            $img= $req->file('img')->move('./integral_img/'.date('Y/m/d'), $img_name.'.'.$hz);
            
            $img = '/integral_img/'.date('Y/m/d').'/'. $img_name.'.'.$hz;

            $data['img'] = $img;
        }
        try{
            $up = Integral::where('id',$id)->update($data);
            if($up){
                return redirect('/admin/integral')->with('success','修改成功');
            } else {
                return back()->with('error','修改失败');
            }
        }catch(\Exception $e){
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
        //删除指定资源
        $del = Integral::where('id',$id)->delete();
        if($del){
            return redirect('/admin/integral')->with('success','删除成功!');
        } else {
            return redirect('/admin/integral')->with('error','删除失败!');
        }
    }

    public function title(Request $req)
    {
        $id = $req -> input('id');
        $data['title'] = $req -> input('name');
        $cishu = Integral::where('id',$id)->update($data);
        if($cishu){
            return 1;
        } else {
            return 0;
        }
    }
}
