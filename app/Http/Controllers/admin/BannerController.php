<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\admin\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banner = Banner::paginate(10);
        // $res = DB::table('broadcast')->get();
        // dd($res);
        // dd($banner);
        // foreach ($banner as $k  => $v) {
        //    echo $v->id;
        // }
        // die;
        return view('admin.banner.index',['banner'=>$banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.banner.create',['title' => '轮播图添加']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'url' => 'required|regex:/.\.{com|cn}/',
        // ],[
        //     'url.required' => '图片链接不能为空',
        //     'url.regex' => '链接格式不正确',
        // ])
        
        $res = $request->except('_token','pic');

        $img = $request-> hasFile('pic');

        if(!$img){

            return back() -> with('error','请上传图片');

        } else {

            //生成图片名称
            $img_name = uniqid(true).time();

            //获取上传图片后缀名
            $hz = $request->file('pic')->getClientOriginalExtension();

            //移动图片
            $request->file('pic')->move('./banner_img',$img_name.'.'.$hz);

            //
            $res['pic'] = '/banner_img/'.$img_name.'.'.$hz;

        }

        $row = DB::table('broadcast')->insert($res);

        if($row){
            return redirect('/admin/banner/index')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
        }

        // Image::make($res['profile'])->resize(50, 50)->save($thumb);

        // $res = DB::table('broadcast')->get();
        // dd($res);
        // return redirect('/admin/banner/index')->with('success','添加成功');

        // dd($res);
        

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

        $res = Banner::find($id);
        // return redirect('admin/banner/create')->with('success','修改成功');

        // dump($res);
        return view('admin.banner.edit',['res'=>$res]);
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

        $res = $request -> except('_token','_mothod','pic');

        $rs = DB::select("select * from broadcast where id=$id");

        $img = $request-> hasFile('pic');

        if(!$img){

            $res['pic'] = $rs[0]->pic;

        } else {

            //生成图片名称
            $img_name = uniqid(true).time();

            //获取上传图片后缀名
            $hz = $request->file('pic')->getClientOriginalExtension();

            //移动图片
            $request->file('pic')->move('./banner_img',$img_name.'.'.$hz);

            //
            $res['pic'] = '/banner_img/'.$img_name.'.'.$hz;

        }

        // dd($img);
        $num = DB::table('broadcast')->where('id',$id) -> update([

            'name' => $res['name'],
            'url'  => $res['url'],
            'pic'  => $res['pic']
        ]);
        // echo $num;die;
        if($num){
            return redirect('/admin/banner/index')->with('success','修改成功');
        }else{
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


        // dd($id);
        $res = Banner::where('id',$id)->delete();

        if($res){
            return redirect('/admin/banner/index')->with(['success'=>'删除成功']);
        }
        


    }
}
