<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Users;
use App\Model\Admin\User_detail;
use App\Model\Admin\Comment;

class CommentController extends Controller
{

	// 后台显示
    public function index(Request $request)
    {   
        // $comment = Comment::paginate(2);
        // dd($request->input('num','g_id'));
        $comment = Comment::where('g_id','like','%'.$request->input('g_id').'%')->paginate($request->input('num',2));

        $res = ['num'=>$request->input('num'),'g_id'=>$request->input('g_id')]; // 点击分页条件不变

        return view('/admin/Comment/index',['title'=>'评价浏览','comment'=>$comment,'res'=>$res,'request'=>$request]);
    }

    // 前台添加留言
    public function create()
    {   
        $g_id = $_GET['g_id'];
        session(['uname']);
        // dd($g_id);
    	return view('home.comment.create',['title'=>'评论页面','g_id'=>$g_id]);
    }

    // 添加到数据库
    public function insert(Request $request)
    {
        $res = $request -> except('_token');

        if($res['stars'] == ''){
            return redirect('home/comment/create')->with('error','请完善评论');
        }

        if($res['g_id'] == ''){
            return redirect('home/comment/create')->with('error','买没买动西自己心里没点笔数!!!');
        }
        // dd($res);
            
        $user = Users::where('uname',session('uname'))->with('user_detail')->first();
        if(!$user){
            return redirect('/home/login')->with('error','您的账号存在异常请重新登录');
        }
        // dd($user);
        // dd($user -> user_detail['user_id']);
        $res['create_at'] = date('Y-m-d H:i:s',time());
        // dd($res);
        $res['user_id'] = $user->user_detail['user_id'];

        $comment = Comment::create($res);
        if($comment){
            return redirect('/home/comment/comment_over')->with('success','添加成功');
        }

        return redirect('home/comment/create')->with('error','添加失败');
    }

    public function delete(Request $request)
    {
        $del = $request -> except('_toekn','_method');
        $id = $del['id'];

        try{
            $data = Comment::where('id',$id)->delete();
            if($data){
                echo 1;
            }
        }catch(\Execption $e){
            echo 0;
        }
    }

    // 评论结束页
    public function over()
    {
        return view('home.comment.comment_over');
    }

}
