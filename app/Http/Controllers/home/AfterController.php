<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\After;
class AfterController extends Controller
{
    public function index(){
        return view('home.after.index',['title'=>'售后管理']);
    }
    public function shouhou(){
        // dd(1);
        return view('home.after.shouhou',['title'=>'申请售后']);
    }
    public function after(Request $request){
        $data=$request->only('orders_id','content');
        $data['create_at']=time();
        $data['user_id']=session('user_id');
        if(empty($data['orders_id']) || empty($data['content'])){
            return back()->withInput();
        } 
        try{
            After::create($data);
            return redirect('home/after/liulan');
        }catch(\Exception $e){
            return back()->withInput();
        }
    }

    public function liulan(){
        $data=After::where('user_id',session('user_id'))->get();
        return view('home.after.liulan',['title'=>'申请记录','data'=>$data]);
    }
}
