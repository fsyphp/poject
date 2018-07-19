<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\Model\Collect;
use DB;
class CollectController extends Controller
{
    //
    public function index(){
    	$data=Collect::where('uid',session('user_id'))->with('coll')->paginate(6); 
    	return view('home.collect.index',['title'=>'用户收藏','data'=>$data]);
    }
    public function delete(Request $request){
    	try{
    		Collect::where('id',$request->input('id'))->delete();
    		return 0;
    	}catch(\Exception $e){
    		return 1;
    	}
    }
}
