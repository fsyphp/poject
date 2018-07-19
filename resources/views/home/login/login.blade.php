<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="/home_login/css/base.css">
    <link rel="stylesheet" href="/home_login/css/iconfont.css">
    <link rel="stylesheet" href="/home_login/css/reg.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script></script>
</head>
<body>
    <div id="ajax-hook"></div>
<div class="wrap">
    <div class="wpn">  
    @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissable" id='che'>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <ul>
                            @foreach($errors -> all() as $error)
                               <li>{{ $error }}</li>
                            @endforeach
                        </ul>        
                </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissable" id='tan'>
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{session('error')}}
            </div>
        @endif
        <div class="form-data pos">
        <form method="post" action="/home/dologin">
            <a href=""><img src="/home_login/img/logo.png" class="head-logo"></a>
            <div class="change-login">
                <p class="account_number on">账号登录</p>
            </div>
            <div class="form1">
                <p class="p-input pos">
                    <label for="num">邮箱 / 用户名</label>
                    <input type="text" id="num" name="uname">
                </p>
                <p class="p-input pos">
                    <label for="pass">请输入密码</label>
                    <input type="password" id="pass" name="pass" autocomplete="new-password">
                </p>
                <input type="text" name='auth' value='2' style='display:none;'>
            </div>


            {{--<div class="form2 hide">
                <p class="p-input pos">
                    <label for="num2">手机号</label>
                    <input type="number" id="num2" name="tel">
                </p>
                <p class="p-input pos">
                    <label for="veri-code">输入验证码</label>
                    <input type="number" id="veri-code">
                    <a href="javascript:;" class="send">发送验证码</a>
                    <span class="time hide"><em>120</em>s</span>
                    <span class="tel-warn error hide">验证码错误</span>
                </p>
                <input type="text" name='auth' value='2' style='display:none;'>
            </div>--}}
            <div class="r-forget cl">
                <a href="/home/zhuce" class="z">账号注册</a>
                <a href="/home/gpass" class="y">忘记密码</a>
            </div>
            {{csrf_field()}}
            <button class="lang-btn">登录</button>
            <div class="third-party">
                <a href="#" class="log-qq icon-qq-round"></a>
                <a href="#" class="log-qq icon-weixin"></a>
                <a href="#" class="log-qq icon-sina1"></a>
            </div>
            <p class="right">Powered by © 2018</p>
        </form>
        </div>
    </div>
</div>
<script src="/home_login/js/jquery.js"></script>
<script src="/home_login/js/agree.js"></script>
<script src="/home_login/js/login.js"></script>
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $('#tan').fadeOut(3000);  // 渐隐渐显
    $('#che').fadeOut(3000);
</script>
<div style="text-align:center;">
</div>
</body>
</body>
</html>