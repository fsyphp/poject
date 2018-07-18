@extends('admin.layout.header')
@section('layout')
    <div class="wrapper wrapper-content animated fadeInRight quan" id='divs'>
   
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
        <form  class="form-horizontal" method="post" action="/admin/user/insert" enctype="multipart/form-data">
         {{ csrf_field() }}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">权限</label>
            <div class="col-sm-6">
                <select name='auth' class="form-control sel">
                    <option id='op0' value='2'>普通用户</option>
                    <option id='op1' value='1'>普通管理员</option>
                    <option id='op2' value='0'>超级管理员</option>
                </select>  
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-6 biao1">
            <input type="test" class="form-control" name='uname' id="input1" style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' placeholder="任意字符4~12位">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-6 biao2">
                <input type="password" class="form-control" name='pass' id="input2" style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' placeholder="数字字母下划线6~14位">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-6 biao3">
                <input type="password" class="form-control" name='passs' id="input3" style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' placeholder="请于上方密码一致">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-6 biao1">
            <input type="test" class="form-control" name='email' style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' placeholder="请按照邮箱格式填写">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">电话</label>
            <div class="col-sm-6 ">
                <input type="num" class="form-control tel" name='tel' style='border-top-right-radius:8px;border-top-left-radius:8px;border-bottom-right-radius:8px;border-bottom-left-radius:8px;' placeholder="请填写11位数字">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
            <div class="radio">
                <label><input type="radio" checked="" value="m" id="optionsRadios1" name="sex">男</label>
                <label><input type="radio" value="w" id="optionsRadios2" name="sex">女</label>
                <label><input type="radio" value="x" id="optionsRadios2" name="sex">保密</label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">头像</label>
            <div class="col-md-3">
                <input class="form-control img" type="file" name="img">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">积分</label>
            <div class="col-md-3">
            <div class="input-group m-b"><span class="input-group-addon">☆</span>
                <input type="text" class="form-control integral" value="" name="integral" > <span class="input-group-addon">.00</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">余额</label>
            <div class="col-md-3">
            <div class="input-group m-b"><span class="input-group-addon">￥</span>
                <input type="text" class="form-control money" value="" name="money" > <span class="input-group-addon">.00</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id='tj' class="btn btn-success">添加</button>
            </div>
        </div>
        </form>
        
    </div>
    <script src="/admin/js/jquery.min.js"></script>

    <script type="text/javascript">
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    

    // var na = '';
    // var ps = '';
    // var pz = '';

        // $("#input1").blur(function(){
        //     var name = /^.{4,12}$/;  // 用户名正则
        //     var uname = $("#input1").val();
        //     if(name.exec(uname)){
        //             $('#dui1').remove(); // 删除节点
        //             $('.biao1').after("<button id='dui1' class='btn btn-info btn-circle' type='button'><i class='fa fa-check'></i>");
        //             na = true;
        //         }else{
        //             $('#dui1').remove();
        //             $('.biao1').after("<button id='dui1' class='btn btn-warning btn-circle' type='button'><i class='fa fa-times'></i>");
        //             na = false;
        //         }
        // })

        // $("#input2").blur(function(){
        //     var upwd = /^\w{6,14}$/;
        //     var password = $("#input2").val();
        //     if(upwd.exec(password)){
        //         $('#dui2').remove(); // 删除节点
        //         $('.biao2').after("<button id='dui2' class='btn btn-info btn-circle' type='button'><i class='fa fa-check'></i>");
        //         ps = true;
        //     }else{
        //         $('#dui2').remove();
        //         $('.biao2').after("<button id='dui2' class='btn btn-warning btn-circle' type='button'><i class='fa fa-times'></i>");
        //         ps = false;
        //         }
        // })

        // // password = $("#input2").val(); // 获取密码值

        // $("#input3").blur(function(){
        //     var password = $("#input2").val(); // 获取上方密码值
        //     var passwords = $("#input3").val(); // 获取确认密码值
        //     if(passwords != ''){
        //         if(passwords == password){

        //             $('#dui3').remove();
        //             $('.biao3').after("<button id='dui3' class='btn btn-info btn-circle' type='button'><i class='fa fa-check'></i>");
        //             pz = true;
        //         }else{
        //             $('#dui3').remove();
        //             $('.biao3').after("<button id='dui3' class='btn btn-warning btn-circle' type='button'><i class='fa fa-times'></i>");
        //             pz = false;
        //         }
               
        //     }else{
        //         $('#dui3').remove();
        //         $('.biao3').after("<button id='dui3' class='btn btn-warning btn-circle' type='button'><i class='fa fa-times'></i>");
        //         pz = false;
                
        //     }
            
        // })

        // $("#tj").click(function(){
        //     if(na && ps && pz){
        //         var auth = $(".sel").val(); // 用户权限
        //         var uname = $("#input1").val(); // 用户名
        //         var password = $("#input2").val(); // 用户密码
        //         var passwords = $("#input3").val(); // 确认密码
        //         var tel = $('.tel').val(); // 电话号码
        //         var integral = $('.integral').val(); // 用户积分
        //         var img = $('.img').val(); // 用户头像
        //         var money = $('.money').val(); // 用户余额
        //         // var sex = $('#').val(); // 获取性别
        //         $.ajax({
        //             url:'/admin/user/insert',
        //             data:{'uname':uname,'auth':auth,'pass':password,'passs':passwords,'tel':tel,'integral':integral,'img':img,'money':money},
        //             type:'POST',
        //             dataType:'json',
        //             success:function(data){
        //                 console.log(data);
        //                 if(data == 1){
        //                     alert('添加成功');
        //                     // var info = $('<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>添加成功</div>');
        //                     // $('#divs').before(info);
        //                     location.href = 'http://www.project.com/admin/user/index';
        //                 }else{
        //                     var error = $('<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>添加失败</div>');
        //                     $('#divs').before(error);
        //                 }
        //             },
        //             error:function(error){
        //                 console.log(error);
        //             },
        //             async:true
        //         })

        //         return false;
        //     }else{
        //         $('#dui1').remove();
        //         $('.biao1').after("<button id='dui1' class='btn btn-warning btn-circle' type='button'><i class='fa fa-times'></i>");

        //         $('#dui2').remove();
        //         $('.biao2').after("<button id='dui2' class='btn btn-warning btn-circle' type='button'><i class='fa fa-times'></i>");

        //         $('#dui3').remove();
        //         $('.biao3').after("<button id='dui3' class='btn btn-warning btn-circle' type='button'><i class='fa fa-times'></i>");

        //         return false;
        //     }
        // }) 
        // ajax 暂时注释
      
    </script>
@endsection