<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
    <link rel="stylesheet" href="/home_login/css/base.css">
    <link rel="stylesheet" href="/home_login/css/iconfont.css">
    <link rel="stylesheet" href="/home_login/css/reg.css">
    <link href="/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
</head>
<body>
    <div id="ajax-hook"></div>
    <div class="wrap">
        <div class="wpn">
         @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissable" id='kong'>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <ul>
                            @foreach($errors -> all() as $error)
                               <li>{{ $error }}</li>
                            @endforeach
                        </ul>        
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissable tan" id='tan'>
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        {{session('error')}}
                </div>
            @endif
            <div class="form-data pos">
                <a href=""><img src="/home_login/img/logo.png" class="head-logo"></a>
                <form action="/home/zccz" method="post">
                    <p class="p-input pos">
                        <label for="tel">用户名</label>
                        <input type="text" id="uname" name='uname' autocomplete="off">
                    </p>
                    <p class="p-input pos">
                        <label for="tel">密码</label>
                        <input type="password" id="pass" name='pass' autocomplete="off">
                    </p>
                    <p class="p-input pos">
                        <label for="tel">邮箱</label>
                        <input type="text" id="email" name='email' autocomplete="off">
                    </p>
                    <input type="text" name='auth' value="2" style="display:none;">
                    {{csrf_field()}}
                <div class="reg_checkboxline pos">
                    <span class="z"><i class="icon-ok-sign boxcol" nullmsg="请同意!"></i></span>
                    <p>我已阅读并接受 <a href="#" target="_brack">《魏哥协议说明》</a></p>
                </div>
                <button class="lang-btn">注册</button>
                <div class="bottom-info">已有账号，<a href="/home/login">马上登录</a></div>
                </form>
                <p class="right">Powered by © 2018</p>
            </div>
        </div>
    </div>
    <script src="/home_login/js/jquery.js"></script>
    <script src="/home_login/js/agree.js"></script>
    <script src="/home_login/js/reg.js"></script>
    <script src="/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/admin/js/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
    $('#tan').fadeOut(3000);  // 渐隐渐显
    $('#kong').fadeOut(3000); // 渐隐渐显
    $.ajax({
    })
</script>
	<div style="text-align:center;">
</div>
</body>
</html>