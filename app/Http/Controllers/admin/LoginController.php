<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Model\Admin\Users;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 
use Session;

class LoginController extends Controller   
{
    public function login()
    {
    	return view('admin.login.login',['title'=>'后台登录']);
    }

    public function dologin(Request $request)
    {
    	$login = $request -> except('_token');
    	// dd($login);

    	$uname = Users::where('uname',$login['uname'])->with('user_detail')->first();
    	// dd($uname);

    	// 用户名判断
    	if(!$uname){
    		return back()->with('error','用户名或密码错误');
    	}

    	// 用户密码判断
    	if(!Hash::check($login['password'],$uname->pass)){
    		return back()->with('error','用户名或密码错误');
    	}

    	// dd(session('code'));
    	// 验证码验证
    	if(session('code') != $login['code']){
    		return back()->with('error','验证码错误');
    	}

    	session(['uname'=>$uname->uname]);
    	session(['auth'=>$uname->auth]);
    	session(['img'=>$uname->user_detail->img]);
    	// dd(session('img'));

    	return redirect('admin/user/index'); // 返回后台主页

    }

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

    public function loginout()
    {	
    	// 清除session的缓存
    	session(['uname'=>'']);
    	session(['auth'=>'']);
    	session(['img'=>'']);

    	return redirect('admin/login');
    }
}
