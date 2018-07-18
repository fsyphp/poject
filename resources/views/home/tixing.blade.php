<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>提示信息</title>
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
                <b>激活成功</b>
                <b>请去邮箱查看激活信息</b>
                {{header('Refresh: 3; url=http://www.project.com/home/login')}}
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
</script>
	<div style="text-align:center;">
</div>
</body>
</html>