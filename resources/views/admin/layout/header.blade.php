<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>后台管理</title>

    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link href="/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">   
    <link href="/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
    <!-- Morris -->
    <link href="/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet"> 

    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <script src="/admin/js/jquery-3.2.1.min.js"></script>
    <script src="/js/layer.js"></script>
    <style>
        .shi{
            height:10px;
        }
        .ershi{
            height:20px;
        }
        .sanshi{
            height:30px;
        }
        .wushi{
            height:50px;
        }
        .pagination>.active>span{background:#337AB7;color:#fff;}
    </style>

    <link href="/admin/css/animate.min.css" rel="stylesheet"> 

    <!-- ueditor -->
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/admin/img/profile_small.jpg" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
                                </li>
                                <li><a class="J_menuItem" href="profile.html">个人资料</a>
                                </li>
                                <li><a class="J_menuItem" href="contacts.html">联系我们</a>
                                </li>
                                <li><a class="J_menuItem" href="mailbox.html">信箱</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="login.html">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                    <li>
                        <a href="/admin/index">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                        </a>

                    </li>
                    
                    <li>
                        <a href="#">
                            <i class="fa fa-male"></i>
                            <span class="nav-label">用户管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="/admin/indexs">浏览用户</a>
                                <!-- <a class="J_menuItem" href="graph_echarts.html">浏览用户</a> -->
                            </li>
                            <li>
                            <a class="J_menuItem" href="/admin/add">添加用户</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="graph_morris.html">修改用户</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="graph_rickshaw.html">删除用户</a>
                            </li>

                        </ul>
                    </li>

                    <li> 
                        <a href="mailbox.html"><i class="fa fa-line-chart"></i> <span class="nav-label">类别管理 </a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/admin/cate">分类浏览</a>
                            </li>
                            <li><a class="J_menuItem" href="/admin/cate/create">分类添加</a>
                            </li> 
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-shopping-cart"></i> <span class="nav-label">商品管理 </span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/admin/goods">商品浏览</a>
                            </li>
                            <li><a class="J_menuItem" href="/admin/goods/create">商品添加</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-university"></i> <span class="nav-label">实体店管理 </span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/">实体店浏览</a>
                            </li>
                            <li><a class="J_menuItem" href="/">实体店添加</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-hand-lizard-o"></i> <span class="nav-label">抽奖管理 </span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/admin/lottery">抽奖商品浏览</a>
                            </li>
                            <li><a class="J_menuItem" href="/admin/lottery/create">抽奖商品添加</a>
                            </li> 
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-calendar-plus-o"></i> <span class="nav-label">限时秒杀管理 </span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="mailbox.html">收件箱</a>
                            </li>
                            <li><a class="J_menuItem" href="mail_detail.html">查看邮件</a>
                            </li>
                            <li><a class="J_menuItem" href="mail_compose.html">写信</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-truck"></i> <span class="nav-label">订单管理 </span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="mailbox.html">收件箱</a>
                            </li>
                            <li><a class="J_menuItem" href="mail_detail.html">查看邮件</a>
                            </li>
                            <li><a class="J_menuItem" href="mail_compose.html">写信</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-shopping-cart"></i> <span class="nav-label">积分兑换管理 </span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="/admin/integral">浏览商品</a>
                            </li>
                            <li><a class="J_menuItem" href="/admin/integral/create">添加商品</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-ambulance"></i> <span class="nav-label">售后服务 </span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="mailbox.html">收件箱</a>
                            </li>
                            <li><a class="J_menuItem" href="mail_detail.html">查看邮件</a>
                            </li>
                            <li><a class="J_menuItem" href="mail_compose.html">写信</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div> 
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                         
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                            <span class="pull-right text-muted small">4分钟前</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-qq fa-fw"></i> 3条新回复
                                            <span class="pull-right text-muted small">12分钟钱</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a class="J_menuItem" href="notifications.html">
                                            <strong>查看所有 </strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a href="index_v1.html" class="J_menuItem" data-index="0"><i class="fa fa-cart-arrow-down"></i>网站首页</a>
                        </li>
                        <li class="dropdown hidden-xs">
                          <a href="login.html" class="oll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>  
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div id="content-main" style="overflow-y:auto" id="divs">
               
            @if(session('success'))
                <div class="mws-form-message info" id="dvs">
                   <li class="alert alert-success">{{session('success')}}</li>
                </div>
            @endif

            @if(session('error'))
                <div class="mws-form-message warning" id="dvs">
                    <li class="alert alert-danger">{{session('error')}}</li>
                </div>
            @endif

            <script>
                setTimeout(function(){
                    $('#dvs').hide();
                },2000);
            </script>
                 @section('layout')
                 <div class="wrapper wrapper-content">
                     
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-success pull-right">总额</span>
                                    <h5>收入</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">40 886,200</h1>
                                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i>
                                    </div>
                                    <small>总收入</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-info pull-right">全年</span>
                                    <h5>订单</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">275,800</h1>
                                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i>
                                    </div>
                                    <small>新订单</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-primary pull-right">历史访客</span>
                                    <h5>访客</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">106,120</h1>
                                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i>
                                    </div>
                                    <small>新访客</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <span class="label label-primary pull-right">当前时间</span>
                                    <h5>时间</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">2018-6-29</h1>
                                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i>
                                    </div>
                                    <small>新访客</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>订单</h5>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-white active">历史订单</button>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            
                            <div class="col-sm-3">
                                <ul class="stat-list">
                                    <li>
                                        <h2 class="no-margins">2,346</h2>
                                        <small>订单总数</small>
                                        <div class="stat-percent">48%  
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">4,422</h2>
                                        <small>抽奖订单</small>
                                        <div class="stat-percent">60%  
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">9,180</h2>
                                        <small>兑换订单</small>
                                        <div class="stat-percent">22%  
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 22%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


         
    </div>
                 @show
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2014-2015 <a href="http://www.zi-han.net/" target="_blank">zihan's blog</a>
                </div>
            </div>  
            
            
        </div>
        <!--右侧部分结束-->
      
       
        
    </div>
    <!-- <script src="/admin/js/jquery.min.js?v=2.1.4"></script> -->
    <script src="/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- <script src="/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> -->

    <!-- <script src="/admin/js/plugins/layer/layer.min.js"></script> -->
    <script src="/admin/js/hplus.min.js?v=4.0.0"></script>
</body>

</html>
