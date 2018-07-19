<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>{{$title}}</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/login.min.css" rel="stylesheet">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>
  
</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-5">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissable tan" id='tan'>
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{session('error')}}
                        </div>
                    @endif
                <div class="signin-info">
                    <div class="logopanel m-b">
                        <h1>[ W+ ]</h1>
                    </div>
                    <div class="m-b"></div>
                    <h4>欢迎光临 <strong> 在线超市</strong></h4>
                    <ul class="m-b">
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势一</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势二</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势三</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势四</li>
                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势五</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-5">
                <form method="post" action="/admin/dologin" class="mws-form" >
                    <h4 class="no-margins">登录：</h4>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                        <input type="text" class="form-control uname" placeholder="用户名" name='uname' />
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                        <input type="password" class="form-control pword m-b" placeholder="密码" name='password' />
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                        <input type="text" class='form-control uname' placeholder="验证码" name='code' style="width:130px">
                        <img src="/admin/captcha" alt="" onclick='this.src=this.src+="?1"' style="float:right;margin-top:-32px;">
                        </div>
                    </div>
                        {{csrf_field()}}
                        <button class="btn btn-success btn-block">登录</button>
                        <br>
                        <a href="" style="color:yellow">忘记密码了？</a>
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2018 All Rights Reserved. W+
            </div>
        </div>
    </div>
</body>
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $('#tan').fadeOut(3000);  // 渐隐渐显
</script>

</html>