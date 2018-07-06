<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>注册</title>
<link href="/home/css/base.css" rel="stylesheet" type="text/css">
<link href="/home/css/css.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="/home/js/jquery-2.1.1.min.js"></script>
<script src="/js/layer.js"></script>
<style>
.tab {
	overflow: hidden;
	margin-top: 20px; margin-bottom:-1px;
}
.tab li {
	display: block;
	float: left;
	width: 100px;padding:10px 20px; cursor:pointer; border:1px solid #ccc; 
}
.tab li {
	background: #90B831; color:#FFF;padding:10px 20px;
}
.conlist {
    padding:30px; border:1px solid #ccc; width:450px;
}
.conbox {
	float:left;
}
.code{
    height: 38px;
    line-height: 38px;
    padding-left: 42px;
    border: 1px solid #bdbdbd;
    margin-top: 20px;
    background: url(/home/images/l_04.png) left 5px center no-repeat;
    width: 145px;
    float:left;
    margin-left:24px;
}
.phone{
    height: 38px;
    line-height: 38px;
    padding-left: 42px;
    border: 1px solid #bdbdbd;
    margin-top: 22px;
    background: url(/home/images/phone.jpg) left 5px center no-repeat;
    width: 250px;
}
.message{
    height: 38px;
    line-height: 38px;
    padding-left: 42px;
    border: 1px solid #bdbdbd;
    margin-top: 22px;
    background: url(/home/images/message.jpg) left 5px center no-repeat;
    width: 125px;
}
.email{
    height: 38px;
    line-height: 38px;
    padding-left: 42px;
    border: 1px solid #bdbdbd;
    margin-top: 25px;
    background: url(/home/images/email.jpg) left 5px center no-repeat;
    width: 250px;
}
</style>
</head>

<body>
<div class="login-top">
    <div class="wrapper">
        <div class="fl font30">LOGO</div>
        <div class="fr">您好，欢迎为生活充电在线！</div>
    </div>
</div>
<div class="l_main">
    <div class="l_bttitle2"> 
        <!-- <h2>登录</h2>-->
        <h2><a href="#">< 返回首页</a></h2>
    </div>
    <div class="loginbox fl">
        <div class="tab">
                <li>用户注册</li>
            </ul>
        </div>
        <div class="conlist">
        <form action="/home/insert" id="form" method="post">
         {{ csrf_field() }}
            <div class="conbox" style="display:block;">
                <p>
                    <input type="text" name="uname" placeholder=" 请输入6~12位用户名" class="loginusername">
                </p>
                <p>
                    <input type="password" name="pass" placeholder=" 请设置6~12密码" class="loginuserpassword pass">
                </p>
                <p>
                    <input type="password" name="repass" placeholder=" 两次密码需一致" class="loginuserpassword repass">
                </p>
                <p>
                    <input type="text" class="code" placeholder=" 请输入验证码" />
                    <img src="/home/code" alt="" style="margin-top:20px;cursor:pointer;" onclick='this.src=this.src += "?1"'>
                </p>
                <!-- <p>
                    <input type="text" name="tel" placeholder=" 请输入手机号码" class="phone">
                </p>
                <p>
                    <input type="text" class="message" placeholder=" 请输入短信验证码" />
                </p> -->
                <p>
                    <input type="text" name="email" placeholder=" 请输入邮箱" class="email">
                </p>
                <p><span class="fl fntz14 margin-t10"><a href="#" style="color:#ff6000">立即注册</a></span><span class="fr fntz12 margin-t10"><a href="#">忘记密码？</a></span></p>
                <p>
                    <input type="submit" class="loginbtn" value="注  册">
                </p>
            </div>
            </form>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <div class="fr margin-r100 margin-t45"><img src="images/login-pic.jpg" width="507" height="325"></div>
</div>
</body>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var uname = false;
var pass = false;
var repass = false;
var email = false;
var code = false;

    //判断用户名
   $('.loginusername').blur(function(){
       var name = $(this).val();
       var reg = /\w{6,12}/;
       if(!reg.test(name)){
            msg('请输入6~12位用户名');
       } else{
           uname = true;
           //发送 ajax 判断用户名是否存在
           $.post('/home/user',{name:name},function(data){
               if(data=='1'){
                   msg('用户名已存在!');
               }
           });
       }
   });

   //判断密码
   $('.pass').blur(function(){
       var upass = $(this).val();
       var reg = /\w{6,12}/;
       if(!reg.test(upass)){
            msg('请输入6~12位密码');
       } else {
           pass = true;
       }
   });

   //确认密码
   $('.repass').blur(function(){
       var reupass = $(this).val();
       var upass = $('.pass').val();
       if(reupass!=upass){
            msg('两次密码不一致!');
       } else {
           repass = true;
       }
   });

   //判断验证
   $('.code').blur(function(){
       var codes = $(this).val();
       var val = $(this).attr('val');
       console.log(val);
    //    if(codes)
   });

   //判断邮箱
   $('.email').blur(function(){
       var emai = $(this).val();
       var reg = /(\w)+(\.\w+)*@(\w)+((\.\w+)+)/;
       if(!reg.test(emai)){
            msg('邮箱格式不正确!');
       } else {
            email = true;
       }
   });

    $('.loginbtn').click(function(){
        if(uname && pass && repass && email){
            return true;
        } else {
            console.log(uname,pass,repass,email);
            msg('请填写正确信息!');
            return false;
        }
    });







   function msg($content){
       layer.open({
                title: '错误提示!',
                content: $content,
                offset: ['150px','600px'],
                closeBtn: 2,
                anim: 6,
                icon: 2,
            });
   }
</script>
</html>
