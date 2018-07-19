<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>密码重置</title>
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
    @if(session('error'))
        <div class="alert alert-danger alert-dismissable tan" id='tan'>
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            {{session('error')}}
        </div>
    @endif
    <form action="/home/pass" action="post">
        <div class="form-data find_password">
            <h4>重置密码</h4>
            <p class="p-input pos">
                <label for="">密码   6~16位</label>
                <input type="password" id="" name="pass">
            </p>
            <p class="p-input pos">
                <label for="">确认密码</label>
                <input type="password" id="" name="upass" >
            </p>
            <button class="lang-btn next">密码重置</button>
            {{csrf_field()}}
            <p class="right">Powered by © 2018</p>
        </div>
    </form>
    </div>
</div>
<script src="/home_login/js/jquery.js"></script>
<script src="/home_login/js/agree.js"></script>
<script src="/home_login/js/reset.js"></script>
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script>
    $('#tan').fadeOut(3000);  // 渐隐渐显
    $('#kong').fadeOut(3000); // 渐隐渐显
</script>
<div style="text-align:center;">
</div>
</body>
</html>