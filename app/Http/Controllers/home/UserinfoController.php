<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\User_detail;
use DB;  
class UserinfoController extends Controller
{
    public function index(Request $request)
    {

    	$id = session('user_id');

    	$data = User::where('id',$id)->with('detail')->first(); 

    	return view('home.userinfo.userinfo',['data'=>$data,'title'=>'个人信息']);
    }



    public function edit($id)
    { 
        
        $data = User::with('detail')->where('id',session('user_id'))->first(); 
        // dd($data);
    	return view('home.userinfo.edit',['data'=>$data,'title'=>'个人信息']);
    }




    public function update(Request $request, $id)
    {  

        if($request-> has('img')){
            //生成图片名称
            $img_name = uniqid(true).time();

            //获取上传图片后缀名
            $hz = $request->file('img')->getClientOriginalExtension();

            //移动图片
            $request->file('img')->move('./img',$img_name.'.'.$hz);

            //
            $data['img'] = '/img/'.$img_name.'.'.$hz;
            $img=User_detail::where('user_id',$id)->update($data);
            if($img){
                return redirect('/home/userinfo/index')->with('success','修改头像成功');
            }else{
                return back()->with('error','修改头像失败');
            }
        } else {
          
             $data=$request->only('uname','email');
            $detail=$request->only('tel','sex');
            try{
                 $num = DB::table('user')->where('id',$id)->update($data);
                 $detail = DB::table('user_detail')->where('user_id',$id)->update($detail);
                 return redirect('/home/userinfo/index'); 
            }catch(\Exception $e){
                return back()->with('error','修改失败');
            }
        }

        // dd($img);
      

        // echo $num;die;
        
    }
}
