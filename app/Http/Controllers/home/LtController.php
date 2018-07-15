<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redis;
class LtController extends Controller
{
    public function t1(){
        return view('home.lt.t1');
    }
    public function t2(){
        return view('home.lt.t2');
    }

    public function sub(Request $request){
        //捕获频道中的聊天内容
        // $red->subscribe(array('用户','客服'),'callback');

        //定义回调处理聊天内容
        // function callback($red,$channel,$content){
        //     echo $channel.'说：'.$content;
        //     exit();
        // }	
        // Redis::con()->hmset('ming',['name'=>'一坨翔','age'=>21,'sex'=>'女']);
        // $redis=new Redis;
        // $redis->connect('127.0.0.1',6379);
        // $redis->auth('689230');
        // $redis->select(0);
        // $red->publish($request->input('user'),$request->input('content'));	//用户的聊天内容 客服的聊天内容	

    }
    public function pub(Request $request){
        // return 1;
        return $request->input('user');
        $redis=new Redis;
        $redis->connect('127.0.0.1',6379);
        $redis->auth('689230');
        $redis->select(0);
        $redis->hset('name',$request->input('user'));
        // $redis->subscribe(array('用户','客服'),'callback');

        //定义回调处理聊天内容
        // function callback($redis,$channel,$content){
        //     echo $channel.'说：'.$content;
        //     exit();
        // }		
    }
}
