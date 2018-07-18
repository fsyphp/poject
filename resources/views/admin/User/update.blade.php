@extends('admin.layout.header')
@section('layout')

    <div class="wrapper wrapper-content animated fadeInRight quan">
     @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <ul>
                    @foreach($errors -> all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                </ul>        
        </div>
        @endif
        <form action='/admin/user/edit/{{$user->id}}' method='post' class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">权限</label>
            <div class="col-sm-6">
                <select name='auth' class="form-control sel">
                    <option id='op0' value='2' @if($user->auth == '2') checked='checked' @endif >普通用户</option>
                    <option id='op1' value='1' @if($user->auth == '1') checked='checked' @endif >普通管理员</option>
                    <option id='op2' value='0' @if($user->auth == '0') checked='checked' @endif >超级管理员</option>
                </select>  
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-6 biao1">
            <input type="test" class="form-control" name='uname' id="input1" style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' value="{{$user->uname}}" placeholder="任意字符4~12位">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-6 biao1">
            <input type="test" class="form-control" name='email' id="input1" style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' value="{{$user->user_detail['email']}}" placeholder="请使用正常邮箱格式">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">电话</label>
            <div class="col-sm-6 ">
                <input type="num" class="form-control tel" name='tel' style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' value="{{$user->user_detail['tel']}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
            <div class="radio">
                <label><input type="radio" value="m" name="sex" @if($user->user_detail['sex'] == 'm') checked='checked' @endif >男</label>
                <label><input type="radio" value="w" name="sex" @if($user->user_detail['sex'] == 'w') checked='checked' @endif >女</label>
                <label><input type="radio" value="x" name="sex" @if($user->user_detail['sex'] == 'x') checked='checked' @endif >保密</label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">头像</label>
            <div class="col-md-3">
                <input class="form-control img" type="file" name="img" value="{{$user->user_detail['img']}}">
                <img src="{{$user->user_detail['img']}}" alt="" width="150">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">积分</label>
            <div class="col-md-3">
            <div class="input-group m-b"><span class="input-group-addon">☆</span>
                <input type="text" class="form-control integral" value="{{$user->user_detail['integral']}}" name="integral" > <span class="input-group-addon">.00</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">余额</label>
            <div class="col-md-3">
            <div class="input-group m-b"><span class="input-group-addon">￥</span>
                <input type="text" class="form-control money" value="{{$user->user_detail['money']}}" name="money" > <span class="input-group-addon">.00</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id='tj' class="btn btn-success">修改</button>
            </div>
        </div>
        </form>

    </div>
    <script src="/admin/js/jquery.min.js"></script>
    
    <script>
    	// $("#input1").blur(function(){
    	// 	var uname = $("#input1").val();
    	// 	var name = /^.{4,12}$/;
    	// 	if(name.exec(uname)){
    	// 		$('#dui1').remove();
     //            $('.biao1').after("<button id='dui1' class='btn btn-info btn-circle' type='button'><i class='fa fa-check'></i>");
    	// 	}else{
    	// 		$('#dui1').remove();
     //            $('.biao1').after("<button id='dui1' class='btn btn-warning btn-circle' type='button'><i class='fa fa-times'></i>");

     //            return false;
    	// 	}
    	// 	return false;
    	// })

    </script>
@endsection