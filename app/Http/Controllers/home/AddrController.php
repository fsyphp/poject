<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User_address;

class AddrController extends Controller
{
    //
    public function addredit(Request $req, $id, $user_id)
    {
        if(!isset($_SERVER['HTTP_REFERER'])){
            return redirect('/404');
        }
        if($_SERVER['HTTP_REFERER'] == "http://www.project.com/home/goshopping"){
            $req->session()->flash('url', 1);
        }
        
        $addr = User_address::where('id',$id)->where('user_id',$user_id)->first();

        $adr = explode(' ',$addr['address'])[1];
        return view('home/collect/edit',['addr'=>$addr,'adr'=>$adr]);
    }

    public function addrupdate(Request $req)
    {
        $this->validate($req, [
            'address_user' => 'required',
            'address_tel' => 'required|regex:/\d+/',
            'addr' => 'required',
        ],[
            'address_user.required' => '收货人不得为空!',
            'address_tel.required' => '联系电话不得为空!',
            'address_tel.regex' => '联系电话只能是数字!',
            'addr.required' => '详细地址不得为空!',
        ]);
        if($req -> input('city') == '请选择'){
            return back()->with('error','请选择城市...');
        }
        $data = $req -> except('_token','id');
        $data['address'] = $data['city'].$data['county'].$data['town'].' '.$data['addr'];
        $row = User_address::where('id',$req -> input('id'))->update([
            'address_user' => $data['address_user'],
            'address_tel' => $data['address_tel'],
            'address' => $data['address'],
            ]);
        if($row){
            if(session('url')){
                return redirect('/home/goshopping')->with('success','修改成功...');
            } else {
                return redirect('/home/generate')->with('success','修改成功...');
            }
        } else {
            return back()->with('error','修改失败...');
        }
    }

    public function addrinsert(Request $req)
    {
        if(!isset($_SERVER['HTTP_REFERER'])){
            return redirect('/404');
        }
        $url = $_SERVER['HTTP_REFERER'];
        $req->session()->flash('url', $url);
        $addr = User_address::where('user_id',session('user_id'))->get();
        if( count($addr)>4 ){
            return back()->with('erro','收货地址添加已达上限...');
        }
        return view('home/collect/insert');
    }

    public function addrstore(Request $req)
    {
        if(!session('user_id')){
            return redirect('/404');
        }
        $this->validate($req, [
            'address_user' => 'required',
            'address_tel' => 'required|regex:/\d+/',
            'addr' => 'required',
        ],[
            'address_user.required' => '收货人不得为空!',
            'address_tel.required' => '联系电话不得为空!',
            'address_tel.regex' => '联系电话只能是数字!',
            'addr.required' => '详细地址不得为空!',
        ]);
        if($req -> input('city') == '请选择'){
            return back()->with('error','请选择城市...');
        }
        $ords = $req -> except('_token');
        $ordes['address'] = $ords['city'].$ords['county'].$ords['town'].' '.$ords['addr'];
        try{
            $adr = User_address::create([
                'user_id' => session('user_id'),
                'address' => $ordes['address'],
                'address_tel' => $ords['address_tel'],
                'address_user' => $ords['address_user'],
            ]);
        }catch(\exception $e){
            return back()->with('error','添加失败...');
        }
        if($adr){
            dump(session('url'));
            exit;
            return redirect( session('url') )->with('success','添加成功...');            
        } else{
            return back()->with('error','添加失败...');
        }
    }
}
