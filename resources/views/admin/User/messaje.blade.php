@extends('admin.layout.header')
@section('layout')
	<div class="wrapper wrapper-content animated fadeInRight quan" id='divs'>
		<form class="form-horizontal">
		  <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-4 biao1">
            <input type="test" class="form-control" name='uname' id="input1" style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' placeholder="任意字符4~12位" value="{{$user->uname}}">
            </div>
        </div>
		  <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">电话号码</label>
            <div class="col-sm-4 biao1">
            <input type="test" class="form-control" name='tel' id="input1" style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' placeholder="任意字符4~12位" value="{{$user['user_detail']->tel}}" >
            </div>
        </div>
		<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">电子邮箱</label>
            <div class="col-sm-4 biao1">
            <input type="test" class="form-control" name='email' id="input1" style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' placeholder="任意字符4~12位" value="{{$user->email}}" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">性别</label>
            <div class="col-sm-4 biao1">
            @if($user['user_detail']->sex == 'm')
            男
            @elseif($user['user_detail']->sex == 'w')
            女
            @else($user['user_detail']->sex == 'x')
            保密
            @endif
            </div>
        </div>
		<div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">积分</label>
            <div class="col-md-2">
            <div class="input-group m-b"><span class="input-group-addon">☆</span>
                <input type="text" class="form-control integral" value="{{$user['user_detail']->integral}}" name="integral" > <span class="input-group-addon">.00</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">余额</label>
            <div class="col-md-2">
            <div class="input-group m-b"><span class="input-group-addon">￥</span>
                <input type="text" class="form-control money" value="{{$user['user_detail']->money}}" name="money" > <span class="input-group-addon">.00</span>
            </div>
            </div>
        </div>
		</form>
	</div>
	<script src="/admin/js/bootstrap.min.js?v=3.3.5"></script>
@endsection