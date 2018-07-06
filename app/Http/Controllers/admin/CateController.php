<?php

namespace App\Http\Controllers\admin;
use  CateClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cate;
use DB;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        // echo 11;die;   
        $data=DB::table('category')->select('*',DB::raw('concat(path,id) as paths'))->orderBy('paths')->where('title','like','%'.$request->input('title').'%')->paginate($request->input('num',10)); 
        foreach($data as $k=>$v){
            $rs=substr_count($v->path,',')-1; 
            $v->title=str_repeat('&nbsp;',$rs*6).'ℳ--'.$v->title; 
        }
       return view('admin.Category.index',['data'=>$data,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Cate::cates();
        return view('admin.Category.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data=$request->all();
        $data=$request->except('_token');  
        if($data['pid']==0){
            $data['path']='0,';
        }else{
            $data['path']=Cate::where('id',$data['pid'])->first()->path.$data['pid'].',';
        }
        // return $data;
        try{
            Cate::create($data);
            // return $data;
            return 00;
        }catch(\Exception $e){
            return 11;
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
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $title=Cate::where('id',$id)->first();
       $pid=Cate::where('id',$title->pid)->first(); 
       return view('admin.Category.edit',['title'=>$title,'pid'=>$pid]);
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
        $data=$request->except('_token','_method');
        try{
            Cate::where('id',$id)->update($data);
            return redirect('/admin/cate')->with('success','修改成功');
        }catch(\Exception $e){
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
        $res=Cate::where('pid',$id)->first();
       if(empty($res)){
           try{
                Cate::destroy($id);
           }catch(\Exception $e){
                return 22;    
           }
           return 00;
       }else{
           return 11;
       }
    }
}
