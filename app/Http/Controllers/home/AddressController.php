<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User_address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session('user_id')){
            return redirect('/404');
        }
        // 查询用户的收货地址
        $user_addr = User_address::where('user_id',session('user_id'))->get();
        // 显示收货地址
        return view('home/address/index',[
            'user_addr' => $user_addr,
            'title' => '收货地址管理'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 新增收货地址
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = User_address::where('user_id',session('user_id'))->get();
        if(count($data)>4){
            return back()->with('errs','最多添加五条收货地址...');
        }
        $this->validate($req, [
            'address_user' => 'required',
            'address_tel' => 'required|regex:/\d+/',
            'detail' => 'required',
        ],[
            'address_user.required' => '收货人不得为空!',
            'address_tel.required' => '联系电话不得为空!',
            'address_tel.regex' => '联系电话只能是数字!',
            'detail.required' => '详细地址不得为空!',
        ]); 
        if($req -> input('city') == '请选择'){
            return back()->with('error','请选择城市...');
        }
        // 添加收货地址
        $addr =  $req -> except('_token');
        $address = $req -> input('city').$req -> input('county').$req -> input('town').' '.$req -> input('detail');
        $user_address = User_address::create([
            'user_id' => session('user_id'),
            'address' => $address,
            'address_tel' => $addr['address_tel'],
            'address_user' => $addr['address_user'],
        ]);
        if($user_address){
            return back() -> with('success','添加成功!');
        } else {
            return back() -> with('error','添加失败!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $id)
    {
        // 修改收货地址
        return 1;
        // $adr =  $req -> input('address');
        // $user_adr = User_address::where('address',$adr)->first();
        // return $user_adr;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = User_address::where('id',$id)->first();
        if($data->user_id != session('user_id')){
            return back()->with('error','非法操作');
        }  
        $row = User_address::where('id',$id)->delete();
        if($row){
            return back()->with('success','删除成功...');
        } else {
            return back()->with('error','删除失败...');
        }
    }

    // 显示修改地址表单
    public function modifie($id)
    {
        $user_address = User_address::where('id',$id)->first();
        $addr = explode(' ',$user_address->address)[1];
        return view('home/address/edit',[
            'user_address' => $user_address,
            'addr' => $addr,
        ]);
    }

    // 更新地址到数据库
    public function addressupdate(Request $req)
    {
        $this->validate($req, [
            'address_user' => 'required',
            'address_tel' => 'required|regex:/\d+/',
            'detail' => 'required',
        ],[
            'address_user.required' => '收货人不得为空!',
            'address_tel.required' => '联系电话不得为空!',
            'address_tel.regex' => '联系电话只能是数字!',
            'detail.required' => '详细地址不得为空!',
        ]); 
        $data = $req -> except('_token','id');
        $addr = $data['city'].$data['county'].$data['town'].' '.$data['detail'];
        // 查询地址
        $str = User_address::where('id',$req ->input('id'))->select('address')->first();
        $arr = explode(' ',$str->address);
        if($data['city']=='请选择'){
            $address = User_address::where('id',$req->input('id'))->update([
                'address' => $arr[0].' '.$req -> input('detail'),
                'address_tel' => $data['address_tel'],
                'address_user' => $data['address_user'],
            ]);
        } else {
            // 将修改的数据插入数据库
            $address = User_address::where('id',$req->input('id'))->update([
                'address' => $addr,
                'address_tel' => $data['address_tel'],
                'address_user' => $data['address_user'],
            ]);
        }
        if($address){
            return redirect('/home/address')->with('success','修改成功...');
        } else{
            return back()->with('error','修改失败...');
        }
    }
}
