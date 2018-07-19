<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\FriendLink;
class FriendLinkController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $flink = FriendLink::paginate(10);
        return view('admin.friendlink.index',['flink'=>$flink]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.friendlink.create',['title'=>'友情链接']);
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
        $data = $request -> except('_token');  
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
        ],[
            'name.required' => '链接名称不得为空!',
            'url.required' => '链接地址不能为空!',
        ]);

        try{
            $num = FriendLink::create($data);
            if($num){
                return redirect('/admin/friendlink/create')->with('添加成功!');
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
        //
        $res = FriendLink::find($id);
        return view('admin.friendlink.edit',['res'=>$res]);

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
        // dd($id);
        //
        $res = $request -> except('_token');

        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
        ],[
            'name.required' => '链接名称不得为空!',
            'url.required' => '链接地址不能为空!',
        ]);

        // $rs = DB::select("select * from friendship where id=$id");
        $num = DB::table('friendship')->where('id',$id) -> update([

            'name' => $res['name'],
            'url'  => $res['url'],
        ]);
        if($num){
            return redirect('/admin/friendlink/index')->with('seccess','修改成功');
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
        
        $res = FriendLink::where('id',$id)->delete();

        if($res){
            return redirect('/admin/friendlink/index')->with(['success'=>'删除成功']);
        }
    }
}
