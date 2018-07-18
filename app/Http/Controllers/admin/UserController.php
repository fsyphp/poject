<?php 
namespace App\Http\Controllers\admin; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Hash;

use App\Model\Admin\Users;
use App\Model\Admin\User_detail;
// use Config; 
use DB;
class UserController extends Controller
{   
    public function indexs()
    {
      return view('admin.layout.header',['title'=>'首页']);
    }

    public function create()
    {   
      return view('admin.user.create',['title'=>'用户添加页面']);
    }

    public function insert(Request $request)
    {   
        $add = $request -> except('_token','_method');  // 获取input传输过来的数据
        // $add = $request -> input('uname');
        $this->validate($request, [
            'uname' => 'required|regex:/^.{4,12}$/',
            'pass' => 'required|regex:/^\S{6,12}$/',
            'passs'=>'same:pass',
            'tel'=>'required|numeric|regex:/^1[3-9]\d{9}$/',
            'email' =>'required|regex:/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i',
        ],[
            'uname.required'=>'用户名不能为空',
            'uname.regex'=>'用户名格式不正确',
            'pass.required'=>'密码不能为空',
            'pass.regex'=>'密码格式不正确',
            'passs.same'=>'两次密码不一致',
            'tel.numeric' => '电话必须为纯数字',
            'tel.regex' =>'电话格式不正确',
            'tel.required' => '电话不能为空',
            'email.required' => '邮箱不能为空',
            'email.regex' => '邮箱格式不正确',
        ]);
        // dd($request->hasFile('img'));
        // dd($request->all());

        if($request->hasFile('img')){ // 判断是否为空

            // 获取用户
            $name = str_random(10).time();
            // dd($name);
            //获取后缀
            $suffix = $request->file('img')->getClientOriginalExtension();
            // dd($suffix);

            //移动
            $request->file('img')->move('./toux/',$name.'.'.$suffix);
            // dump($request);

            $add['img'] = '/toux/'.$name.'.'.$suffix;  // 获取文件名
            
        }
        // dd($add);

        $add['create_at'] = date('Y-m-d',time());  // 获取时间

        $add['pass'] = Hash::make($add['pass']);   // 加密密码

        $data = Users::create($add); // 添加数据到user表

        $user_id = $data->id;

        $u_detail = [];  // 定义为第2个数组

        $u_detail['img'] = $add['img']; // 将值放到另一个数组中
        $u_detail['tel'] = $add['tel'];
        $u_detail['money'] = $add['money'];
        $u_detail['integral'] = $add['integral'];
        $u_detail['sex'] = $add['sex'];

        $user_detail_id = Users::find($user_id);  // 通过查找users表来定义user_id

        try{
          $data = $user_detail_id->user_detail()->create($u_detail); // 查找的user_id主键 user_detaill()  模型中的关联  create一对一关联添加方法
          if($data){
            return redirect('admin/user/index')->with('success','添加成功');
          }
        }catch (\Execption $e){
          return back();
        }

        // dump($data);
        // dd($u_detail);
        
    }

    public function index(Request $request)
    {   
        // $data=Users::get()->toArray();
        // dd($data);
        // foreach ($data as $k => $v) {
        //    $user = Users::find($v['id'])->with('user_detail')->get()->toArray();  // 获取所有的信息
        // }
        $user = Users::with('user_detail')->get();  // 获取1对1关联数据
        // dd($user);

      return view('admin.User.index',['user'=>$user]);
    }


    public function delete(Request $request)
    {   
        
        $del = $request -> except('_toekn','_method');
        $id = $del['id'];

        // $user = Users::find($id)->with('user_detail')->delete();
        // dd($user);
        try{
            $user = DB::table('user')->where('id','=',$id)->delete();
            $user_detail = DB::table('user_detail')->where('user_id',$id)->delete();
            if($user && $user_detail){
                echo 1;
            }
        }catch(\Execption $e){
            echo 0;
        }
    }

    public function update($id = 0)
    {
        $id = $_GET['id'];
        // dd($id);

        $user = Users::where('id',$id)->with('user_detail')->first();
        // dd($user);
        // $user -> $user;
        // dd($user[0]->user_detail['img']); // 获取detail字段
        return view('admin.user.update',['user'=>$user]);
    }

    public function edit(request $request,$id)
    {   
        $date = $request -> except('_token','_method');
        // dd($date);
        $this->validate($request, [
            'uname' => 'required|regex:/^.{4,12}$/',
            'tel'=>'required|numeric|regex:/^1[3-9]\d{9}$/',
            'img'=>'required',
            'email' =>'required|regex:/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i',
        ],[
            'uname.required'=>'用户名不能为空',
            'uname.regex'=>'用户名格式不正确',
            'tel.numeric' => '电话必须为纯数字',
            'tel.regex' =>'电话格式不正确',
            'tel.required' => '电话不能为空',
            'img.required' => '头像不能为空',
            'email.required' => '邮箱不能为空',
            'email.regex' => '邮箱格式不正确',
        ]);

        $id = $request ->id;
        // dd($id);


        if($request->hasFile('img')){ // 判断是否为空
            // 获取用户
            $name = str_random(10).time();
            //获取后缀
            $suffix = $request->file('img')->getClientOriginalExtension();

            //移动
            $request->file('img')->move('./toux/',$name.'.'.$suffix);

            $date['img'] = '/toux/'.$name.'.'.$suffix;  // 获取文件名

        }
        $user = [];
        $user['create_at'] = date('Y-m-d',time());  // 获取时间
        $user['auth'] = $date['auth'];
        $user['uname'] = $date['uname'];
        $user['email'] = $date['email'];

        $users = Users::where('id',$id)->update($user);

        $u_detail = [];  // 定义为第2个数组

        $u_detail['img'] = $date['img'];
        $u_detail['tel'] = $date['tel'];
        $u_detail['money'] = $date['money'];
        $u_detail['integral'] = $date['integral'];
        $u_detail['sex'] = $date['sex'];
        // dd($u_detail);
        try{
            $data = DB::table('user_detail')->where('user_id',$id)->update($u_detail);
            // dump($data);
            if($data){
                return redirect('admin/user/index')->with('success','修改成功');
            }
        }catch (\Execption $e){

            return back();
        }
    }

    public function messaje()
    {
        return view('admin.user.messaje');
    }

}
    