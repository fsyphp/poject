<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/home/css/style.css" rel="stylesheet" type="text/css" />
<script src="/home/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/home/js/common_js.js" type="text/javascript"></script>
<script src="/home/js/footer.js" type="text/javascript"></script>
@section('css')

@show
<title>@yield('title')</title>
<style>
    .ershi{
        height:20px;
    }
</style>
</head>

<body>
<head>  
 <div id="header_top">
  <div id="top">
    <div class="Inside_pages">
      <div class="Collection">
      @if(!session('user_id'))
      <a href="/home/login" class="green">请登录</a> 
      @else
      <b>欢迎:<a href="/home/userinfo/index">{{session('unames')}}</a> <a href="/edit">退出</a></b>
      @endif
      <a href="/home/zhuce" class="green">免费注册</a></div>
  <div class="hd_top_manu clearfix">
	  <ul class="clearfix">
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="/">首页</a></li> 
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="/home/chat">消息中心</a></li>
       <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">商品分类</a></li>
        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="/home/show">我的购物车<b></b></a></li>	
	  </ul>
	</div>
    </div>  
  </div>
  @section('nav')
  <div id="header"  class="header page_style">
  <div class="logo"><a href="/"><img src="/home/images/logo.png" /></a></div>
  <!--结束图层-->
  <div class="Search">
        <div class="search_list">
            <ul>
                <li class="current"><a href="#">产品</a></li> 
            </ul>
        </div>
        <form action="/home/goods/list/" method="get">
            <div class="clear search_cur">
            <input name="gname" id="searchName" class="search_box" onkeydown="keyDownSearch()" type="text">
            <input type="submit" value="搜 索"  class="Search_btn"/>
            </div>
        </form>
        <div class="clear hotword">热门搜索词：香醋&nbsp;&nbsp;&nbsp;茶叶&nbsp;&nbsp;&nbsp;草莓&nbsp;&nbsp;&nbsp;葡萄&nbsp;&nbsp;&nbsp;菜油</div>
</div>
 <!--购物车样式-->
 <div class="hd_Shopping_list" id="Shopping_list">
   <div class="s_cart"><a href="#">我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount">0</i></div>
   <div class="dorpdown-layer">
    <div class="spacer"></div>
	 <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
	 <ul class="p_s_list">	   
		<li>
		    <div class="img"><img src="/home/images/AD_03.png"></div>
		    <div class="content"><p class="name"><a href="#">产品名称</a></p><p>颜色分类:紫花8255尺码:XL</p></div>
			<div class="Operations">
			<p class="Price">￥55.00</p>
			<p><a href="#">删除</a></p></div>
		  </li>
		</ul>		
	 <div class="Shopping_style">
	 <div class="p-total">共<b>1</b>件商品　共计<strong>￥ 515.00</strong></div>
	  <a href="Shop_cart.html" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
	 </div>	 
   </div>
 </div>
</div>
<!--菜单栏-->
	<div class="Navigation" id="Navigation">
		 <ul class="Navigation_name">
			<li><a href="/">首页</a></li>
            <li class="hour"><span class="bg_muen"></span><a href="#">半小时生活圈</a></li>
			<li class="shi"><a href="/home/shop">体验店</a></li>
			<li class="miao"><a href="/home/miao">秒杀专区</a><em class="hot_icon"></em></li>  
			<li class="chou"><a href="/home/lottery" >抽奖专区</a></li>
			<li class="ji"><a href="/home/integral">积分兑换专区</a></li>
			<li><a href="Brands.html">联系我们</a></li>
		 </ul>			 
		</div>
	<!-- <script>$("#Navigation").slide({titCell:".Navigation_name li",trigger:"click"});</script> -->
    </div>
</head>
@show

<!-- 中间主体内容 -->
@section('layout')
    <div style="height:1000px;"></div>
@show

@section('links')
 <!--友情链接-->
 <div class="link_style clearfix" style="margin:0 auto;">
 <div class="title">友情链接</div>
 <div class="link_name">
    @foreach(App\Model\FriendLink::friendLink() as $k=>$v)
      <dd style="float:left;margin-left:150px;margin:20px;"><a href="{{$v->url}}" style="color:block;font-size:20px;text-align:center;">{{$v->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></dd>
    @endforeach
 </div> 
 </div>
</div>
<!-- 友情链接结束 -->
@show
<div class="ershi"></div>
<!--网站地图-->
<div class="fri-link-bg clearfix">
    <div class="fri-link">
        <div class="logo left margin-r20"><img src="/home/images/fo-logo.jpg" width="152" height="81" /></div>
        <div class="left"><img src="/home/images/qd.jpg" width="90"  height="90" />
            <p>扫描下载APP</p>
        </div>
       <div class="">
    <dl>
	 <dt>新手上路</dt>
	 <dd><a href="#">售后流程</a></dd>
     <dd><a href="#">购物流程</a></dd>
     <dd><a href="#">订购方式</a> </dd>
     <dd><a href="#">隐私声明 </a></dd>
     <dd><a href="#">推荐分享说明 </a></dd>
	</dl>
	<dl>
	 <dt>配送与支付</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
	<dl>
	 <dt>售后保障</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
	<dl>
	 <dt>支付方式</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>	
    <dl>
	 <dt>帮助中心</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
     <dl>
	 <dt>帮助中心</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
     <dl>
	 <dt>帮助中心</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>	   
   </div>
    </div>
</div>
<!--网站地图END-->
<!--网站页脚-->
<div class="copyright">
    <div class="copyright-bg">
        <div class="hotline">为生活充电在线 <span>招商热线：****-********</span> 客服热线：400-******</div>
        <div class="hotline co-ph">
            <p>版权所有Copyright ©***************</p>
            <p>*ICP备***************号 不良信息举报</p>
            <p>总机电话：****-*********/194/195/196 客服电话：4000****** 传 真：********
                
                <a href="#" target="_blank">源码之家</a></p>
        </div>
    </div>
</div>

<!-- 页脚结束 -->

<!--右侧菜单栏购物车样式-->
<div class="fixedBox">
  <ul class="fixedBoxList">
    <li class="fixeBoxLi cart_bd" id="cartboxs"><a href="/home/show"><span class="fixeBoxSpan"></span> <strong>购物车</strong></a>
    <li class="fixeBoxLi Service "> <span class="fixeBoxSpan"></span> <strong>客服</strong>
      <div class="ServiceBox">
        <div class="bjfffs"></div>
        <dl onclick="javascript:;">
		    <dt><img src="/home/images/Service1.png"></dt>
		       <dd><strong>商城客服</strong>
		          <p class="p1">0:00-24:00</p>
		           <p class="p2"><a href="/home/chat">点击交谈</a></p>
		          </dd>
		        </dl>
	          </div>
     </li>
    <li class="fixeBoxLi Home"> <a href="/home/collect/index"> <span class="fixeBoxSpan"></span> <strong>收藏夹</strong> </a> </li>
    <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan"></span> <strong>返回顶部</strong> </li>
  </ul>
</div>

</body>
</html>

<!-- 结束 -->


