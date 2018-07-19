<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 

use Hash;
use App\Model\Admin\Users;
use App\Model\Admin\User_detail;
use Session;
use Mail;
use DB;
   
class LoginController extends Controller
{
    public function login()
    {
    	return view('home.login.login');
    }

    public function dologin(Request $request)
    {

    	$date = $request -> except('_token');
        // dd($date['pass']);

    	$user = Users::where('uname',$date['uname'])->with('User_detail')->first();
        // dd($user['user_detail']->user_id);
    		// dd($user->pass);

        if($date['uname'] == '' || $date['pass'] == ''){
            return back()->with('error','用户名或密码不能为空');
        }

        if(!$user['uname']){

            return back()->with('error','用户名错误');
        }
        
    	if($user->user_detail['status'] != 'g'){
    		return back()->with('error','您的用户未激活或已被封');
    	}

	    

	    if(!Hash::check($date['pass'],$user->pass)){

	    	return back()->with('error','密码错误');
	    }

        $user_id = $user['user_detail'] -> user_id;
        session(['user_id'=>$user_id]);
	    session(['unames'=>$user->uname]);

	    return redirect('/');
    }

    // 显示注册页面
    public function zhuce()
    {
    	return view('home.login.zhuce');
    }


    // 用户注册
    public function zccz(Request $request)
    {	
    	$token = str_random(30);

    	$this->validate($request, [
            'uname' => 'required|regex:/^.{4,12}$/',
            'pass' => 'required|regex:/^\S{6,12}$/',
            'passs'=>'same:pass',
            'email' =>'required|regex:/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i',
        ],[
            'uname.required'=>'用户名不能为空',
            'uname.regex'=>'用户名格式不正确',
            'pass.required'=>'密码不能为空',
            'pass.regex'=>'密码格式不正确',
            'passs.same'=>'两次密码不一致',
            'email.required' => '邮箱不能为空',
            'email.regex' => '邮箱格式不正确',
        ]);

    	$res = $request -> except('_token');
    	// dd($res);

    	$res['create_at'] = date('Y-m-d',time());
    	$res['pass'] = Hash::make($res['pass']); // 加密密码

    	
    	$user = Users::create($res); // 将数据添加到用户主表
    	$id = $user ->id;
    	$user_id = $user->id;
    	// dd($id);

    	$user_detail['token'] = $token; // 获取随机验证码
    	$user_detail['status'] = 'gg';  // 禁用状态
    	$user_detail['img'] = '/toux/default.png';

    	$user_detail_id = Users::find($user_id);  // 定义user_id

    	$user_detail = $user_detail_id->user_detail()->create($user_detail);  // 添加关联表数据
    	// dd($user_detail);

    	$token = $user_detail->token;

    	if($user || $user_detail){
    		Mail::send('emails.remind', ['id'=>$id,'token'=>$token], function($m) use ($res) {
  
	            $m->from(env('MAIL_USERNAME'), '在线商城');

	            $m->to($res['email'], $res['uname'])->subject('注册激活码');
    		});

    		return view('home.tixing');
    	}else{
    		Users::where('uname',$res['uname'])->delete();

    		return back()->with('error','注册失败');
    	}
    	
    }

    // 激活验证
    public function jihuo(Request $request)
    {
    	$id = $request -> input('id');

    	$token = $request -> input('token');
    	// dd($token);

    	$date = Users::where('id',$id)->with('user_detail')->first();
    	// dd($date);
    	if($date->user_detail['token'] != $token){
    		abort(404);
    	}

    	$res['status'] = 'g';

    	$info = DB::table('user_detail')->update($res);
    	// dd($info);
    	if($info){
    		return redirect('/home/login')->with('success','激活成功');
    	}
    }


    // 修改密码
    public function gpass()
    {
    	return view('home.login.gpass',['title'=>'找回密码']);
    }

    // 邮箱验证
    public function gpass_cz(Request $request)
    {
    	$res = $request -> except('_token');
        session(['unames'=>$res['uname']]);
        // dd($res);
        if(session('code') != $res['code']){
            return back()->with('error','验证码错误');
        }

        $user = Users::where('uname',$res)->first();
        // dd($user);

        if(!$user){
            return back()->with('error','用户名错误');
        }

        return view('home.login.pass');
    }

    // 验证码
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 30, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        //可以使用
        // Session::flash('code', $phrase);

        //
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: yes-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    // 忘记密码
    public function pass(Request $request)
    {
        $res = $request -> except('_token');

        if($res['pass']=='' || $res['upass']==''){
            return back()->with('error','密码不能为空');
        }

        if($res['pass'] != $res['upass']){
            return back()->with('error','密码不一致');
        }

        $date = [];
        $date['pass'] = Hash::make($res['pass']);
        // dd($date);

        $user = Users::where('uname',session('unames'))->update($date);

        if(!$user){
            return back()->with('error','重置失败');
        }

        return redirect('/home/login')->with('success','重置成功');
    }

    public function edit()
    {
        session(['unames'=>'']); //清空session值
        return redirect('/home/login')->with('success','退出成功');
    }

}
      
