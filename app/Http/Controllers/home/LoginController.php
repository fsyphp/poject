<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 
use App\Model\User;
use App\Model\User_detail;
use Hash;
use Session;

class LoginController extends Controller
{
    //显示注册表单
    public function register()
    {
        return view('home/register/reg');
    }

    //接收表单的值 插入数据库
    public function insert(Request $req)
    {
        $this->validate($req, [
            'uname' => 'required|unique:user|regex:/\w{6,12}/',
            'pass' => 'required|regex:/\w{6,12}/',
            'repass' => 'same:pass',
            'email' => 'required|regex:/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/',
            'code' => 'required',
        ],[
            'uname.required' => '用户名不得为空!',
            'uname.regex' => '用户名不得少于6位!',
            'pass.required' => '密码不得为空!',
            'pass.regex' => '密码不得少于6位!',
            'repass.same' => '两次密码不一致!',
            'email.required' => '邮箱不得为空!',
            'email.regex' => '邮箱格式不正确!',
            'code.required' => '验证码不得为空!',
        ]);
        $user = $req -> except('_token','repass');
        $user['create_at'] = time();
        $user['pass'] = Hash::make($req->pass);
        $user['token'] = str_rondom(10);
        //将数据插入到用户主表数据库
        DB::beginTransaction();
        $row = User::create([
            'uname' => $user['uname'],
            'pass' => $user['pass'],
            'emaile' => $user['email'],
            'create_at' => $user['create_at'],
        ]);

        //插入 token 到详情表
        $id = User::find($row->id);
        $detail = $id -> detail() ->create([
            'token' => $user['token'],
        ]);

        if($row && $detail){
            DB::commit();
            return redirect('/home/email')->with('success','添加成功!');
        } else {
            DB::rollBack();
            return back() -> with('error','添加失败!');
        }
    }

    // ajax 查询用户名是否存在
    public function user(Request $req)
    {
        $user_name =  $req -> input('name');
        $user = User::where('uname',$user_name)->get()->first();
        if($user){
            return 1;
        }
    }

    //用户添加成功发送邮件
    public function email()
    {
        return '添加成功!';
    }

    //验证码
    public function code()
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
        $builder->build($width = 85, $height = 37, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

}
