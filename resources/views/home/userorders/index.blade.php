<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="css/common.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/user_style.css" rel="stylesheet" type="text/css" />
        <link href="skins/all.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery-1.8.3.min.js" type="text/javascript">
        </script>
        <script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript">
        </script>
        <script src="js/common_js.js" type="text/javascript">
        </script>
        <script src="js/footer.js" type="text/javascript">
        </script>
        <script src="layer/layer.js" type="text/javascript">
        </script>
        <script src="js/iCheck.js" type="text/javascript">
        </script>
        <script src="js/custom.js" type="text/javascript">
        </script>
        <title>
            订单管理
        </title>
    </head>
    
    <body>
        
        <head>
            <div id="header_top">
                <div id="top">
                    <div class="Inside_pages">
                        <div class="Collection">
                            <a href="#" class="green">
                                请登录
                            </a>
                            <a href="#" class="green">
                                免费注册
                            </a>
                        </div>
                        <div class="hd_top_manu clearfix">
                            <ul class="clearfix">
                                <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                                    <a href="#">
                                        首页
                                    </a>
                                </li>
                                <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                                    <a href="#">
                                        我的小充
                                    </a>
                                </li>
                                <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                                    <a href="#">
                                        消息中心
                                    </a>
                                </li>
                                <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                                    <a href="#">
                                        商品分类
                                    </a>
                                </li>
                                <li class="hd_menu_tit" data-addclass="hd_menu_hover">
                                    <a href="#">
                                        我的购物车
                                        <b>
                                            (23)
                                        </b>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="header" class="header page_style">
                    <div class="logo">
                        <a href="index.html">
                            <img src="images/logo.png" />
                        </a>
                    </div>
                    <!--结束图层-->
                    <div class="Search">
                        <div class="search_list">
                            <ul>
                                <li class="current">
                                    <a href="#">
                                        产品
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        信息
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clear search_cur">
                            <input name="searchName" id="searchName" class="search_box" onkeydown="keyDownSearch()"
                            type="text">
                            <input name="" type="submit" value="搜 索" class="Search_btn" />
                        </div>
                        <div class="clear hotword">
                            热门搜索词：香醋&nbsp;&nbsp;&nbsp;茶叶&nbsp;&nbsp;&nbsp;草莓&nbsp;&nbsp;&nbsp;葡萄&nbsp;&nbsp;&nbsp;菜油
                        </div>
                    </div>
                    <!--购物车样式-->
                    <div class="hd_Shopping_list" id="Shopping_list">
                        <div class="s_cart">
                            <a href="#">
                                我的购物车
                            </a>
                            <i class="ci-right">
                                &gt;
                            </i>
                            <i class="ci-count" id="shopping-amount">
                                0
                            </i>
                        </div>
                        <div class="dorpdown-layer">
                            <div class="spacer">
                            </div>
                            <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
                            <ul class="p_s_list">
                                <li>
                                    <div class="img">
                                        <img src="images/tianma.png">
                                    </div>
                                    <div class="content">
                                        <p class="name">
                                            <a href="#">
                                                产品名称
                                            </a>
                                        </p>
                                        <p>
                                            颜色分类:紫花8255尺码:XL
                                        </p>
                                    </div>
                                    <div class="Operations">
                                        <p class="Price">
                                            ￥55.00
                                        </p>
                                        <p>
                                            <a href="#">
                                                删除
                                            </a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="Shopping_style">
                                <div class="p-total">
                                    共
                                    <b>
                                        1
                                    </b>
                                    件商品　共计
                                    <strong>
                                        ￥ 515.00
                                    </strong>
                                </div>
                                <a href="Shop_cart.html" title="去购物车结算" id="btn-payforgoods" class="Shopping">
                                    去购物车结算
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--菜单栏-->
                <div class="Navigation" id="Navigation">
                    <ul class="Navigation_name">
                        <li>
                            <a href="Home.html">
                                首页
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                你身边的超市
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                预售专区
                            </a>
                            <em class="hot_icon">
                            </em>
                        </li>
                        <li>
                            <a href="products_list.html">
                                商城
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                半小时生活圈
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                好评商户
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                热销活动
                            </a>
                        </li>
                        <li>
                            <a href="Brands.html">
                                联系我们
                            </a>
                        </li>
                    </ul>
                </div>
                <script>
                    $("#Navigation").slide({
                        titCell: ".Navigation_name li",
                        trigger: "click"
                    });
                </script>
            </div>
        </head>
        <div class="user_style clearfix">
            <div class="user_center clearfix">
                <div class="left_style">
                    <div class="menu_style">
                        <div class="user_title">
                            <a href="用户中心.html">
                                用户中心
                            </a>
                        </div>
                        <div class="user_Head">
                            <div class="user_portrait">
                                <a href="#" title="修改头像" class="btn_link">
                                </a>
                                <img src="images/people.png">
                                <div class="background_img">
                                </div>
                            </div>
                            <div class="user_name">
                                <p>
                                    <span class="name">
                                        化海天堂
                                    </span>
                                    <a href="#">
                                        [修改密码]
                                    </a>
                                </p>
                                <p>
                                    访问时间：2016-1-21 10:23
                                </p>
                            </div>
                        </div>
                        <div class="sideMen">
                            <!--菜单列表图层-->
                            <dl class="accountSideOption1">
                                <dt class="transaction_manage">
                                    <em class="icon_1">
                                    </em>
                                    订单管理
                                </dt>
                                <dd>
                                    <ul>
                                        <li>
                                            <a href="/home/userorders">
                                                我的订单
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/home/address">
                                                收货地址
                                            </a>
                                        </li>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                        <script>
                            jQuery(".sideMen").slide({
                                titCell: "dt",
                                targetCell: "dd",
                                trigger: "click",
                                defaultIndex: 0,
                                effect: "slideDown",
                                delayTime: 300,
                                returnDefault: true
                            });
                        </script>
                    </div>
                </div>
                <!--右侧样式-->
                <div class="right_style">
                    <div class="title_style">
                        <em>
                        </em>
                        订单管理
                    </div>
                    <div class="Order_form_style">
                        <div class="Order_form_filter">
                            <a href="/home/userorders" class="on">
                                我的订单（{{count($data)}}）
                            </a>
                            <a href="#" class="on">
                                抽奖订单（23）
                            </a>
                            <a href="#" class="on">
                                兑换订单（23）
                            </a>
                            <a href="/home/nocreate" class="number">
                                未完成（<span>{{count($no)}}</span>）
                            </a>
                            <a href="/home/when" class="">
                                待发货（3）
                            </a>
                            <a href="/home/collect" class="">
                                待收货（5）
                            </a>
                            <!-- <a href="#" class="">退货/退款（0）</a> -->
                            <a href="/home/success" class="">
                                交易成功（0）
                            </a>
                        </div>

                        @section('orders')
                        <div class="Order_form_list">
                            <table>
                                <thead>
                                    <tr>
                                        <td class="list_name_title0">
                                            商品
                                        </td>
                                        <td class="list_name_title1">
                                            单价(元)
                                        </td>
                                        <td class="list_name_title2">
                                            数量
                                        </td>
                                        <td class="list_name_title4">
                                            实付款(元)
                                        </td>
                                        <td class="list_name_title5">
                                            订单状态
                                        </td>
                                        <td class="list_name_title6">
                                            操作
                                        </td>
                                    </tr>
                                </thead>
                                @foreach($data as $k=>$v)
                                <tbody>
                                    <tr class="Order_info">
                                        <td colspan="6" class="Order_form_time">
                                            下单时间：{{date('Y-m-d',$v['orders_at'])}} | 订单号：{{$v['number']}}
                                            <em>
                                            </em>
                                        </td>
                                    </tr>
                                    @foreach($v['orders_detail'] as $j=>$x)
                                    <tr class="Order_Details">
                                        <td colspan="3">
                                            <table class="Order_product_style">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="product_name clearfix">
                                                            
                                                                <a href="#" class="product_img">
                                                                    <img src="{{Config('app.gpic').$x['goods_orders']['gpic']}}" width="80px" height="80px">
                                                                </a>
                                                            
                                                                <a href="3" class="p_name">
                                                                    
                                                                </a>
                                                                <p class="specification">
                                                                    {{$x['goods_orders']['gname']}}
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        {{$x['price']}}
                                                        </td>
                                                        <td>
                                                            {{$x['cnt']}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        @endforeach
                                        <td class="split_line">
                                            {{$v['total']}}
                                        </td>
                                        <td class="split_line">

                                            <p style="color:#F30">
                                                @if($v['static']=='0')
                                                    待发货
                                                @elseif($v['static']=='1')
                                                    已发货
                                                @elseif($v['static']=='2')
                                                    <a href="#" class="btn btn-info btn-xs" style="width:50px;margin-left:35px;">
                                                        去评价
                                                    </a>
                                                @else
                                                    异常
                                                @endif
                                            </p>
                                        </td>
                                        <td class="operating">
                                        @if($v['static'] == '1')
                                            <a href="#" gid="{{$v['id']}}" class="btn btn-info btn-xs success" style="width:60px;font-size:13px;height:20px;line-height:20px;margin-left:30px;">
                                                确定收货
                                            </a>
                                        @endif
                                            <a href="#">
                                                联系客服
                                            </a>
                                            <a href="#">
                                                删除
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                               @endforeach 
                            </table>
                        </div>
                        @show
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--网站地图-->
        <div class="fri-link-bg clearfix">
            <div class="fri-link">
                <div class="logo left margin-r20">
                    <img src="images/fo-logo.jpg" width="152" height="81" />
                </div>
                <div class="left">
                    <img src="images/qd.jpg" width="90" height="90" />
                    <p>
                        扫描下载APP
                    </p>
                </div>
                <div class="">
                    <dl>
                        <dt>
                            新手上路
                        </dt>
                        <dd>
                            <a href="#">
                                售后流程
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                购物流程
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                订购方式
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                隐私声明
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                推荐分享说明
                            </a>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            配送与支付
                        </dt>
                        <dd>
                            <a href="#">
                                保险需求测试
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                专题及活动
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                挑选保险产品
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                常见问题
                            </a>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            售后保障
                        </dt>
                        <dd>
                            <a href="#">
                                保险需求测试
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                专题及活动
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                挑选保险产品
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                常见问题
                            </a>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            支付方式
                        </dt>
                        <dd>
                            <a href="#">
                                保险需求测试
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                专题及活动
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                挑选保险产品
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                常见问题
                            </a>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            帮助中心
                        </dt>
                        <dd>
                            <a href="#">
                                保险需求测试
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                专题及活动
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                挑选保险产品
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                常见问题
                            </a>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                            帮助中心
                        </dt>
                        <dd>
                            <a href="#">
                                保险需求测试
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                专题及活动
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                挑选保险产品
                            </a>
                        </dd>
                        <dd>
                            <a href="#">
                                常见问题
                            </a>
                        </dd>
                    </dl>
                    <dl>
                </div>
            </div>
        </div>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.success').click(function(){
                var is = $(this);
                var text = $(this).parents('tr').find('td').eq(5);
                var id = $(this).attr('gid');
                $.post('/home/belong',{id:id},function(data){
                    if(data=='00'){
                        text.empty();
                        is.remove();
                        text.html('<a href="#" class="btn btn-info btn-xs" style="width:50px;margin-left:35px;">去评价</a>');
                        layer.msg('快去评价你买的商品吧...',{time: 3000});
                    } else {
                        layer.msg('网络繁忙,请稍后再试...',{
                            time: 3000,
                        });
                    }
                });
                return false;
            });
        </script>

        <!--网站地图END-->
        <!--网站页脚-->
        <div class="copyright">
            <div class="copyright-bg">
                <div class="hotline">
                    为生活充电在线
                    <span>
                        招商热线：****-********
                    </span>
                    客服热线：400-******
                </div>
                <div class="hotline co-ph">
                    <p>
                        版权所有Copyright ©***************
                    </p>
                    <p>
                        *ICP备***************号 不良信息举报
                    </p>
                    <p>
                        总机电话：****-*********/194/195/196 客服电话：4000****** 传 真：********
                </div>
            </div>
        </div>
    </body>

</html>