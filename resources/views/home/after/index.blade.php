@extends('home.layout.header')
@section('title',$title)
@section('layout')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/home/css/user_style.css" rel="stylesheet" type="text/css" />
<link href="/home/skins/all.css" rel="stylesheet" type="text/css" />
<script src="/home/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/home/js/common_js.js" type="text/javascript"></script>
<script src="/home/js/footer.js" type="text/javascript"></script>
<script src="/home/js/iCheck.js" type="text/javascript"></script>
<script src="/home/js/custom.js" type="text/javascript"></script>
<script src="/home/layer/layer.js" type="text/javascript"></script>

<!--账户管理样式-->
<div class="user_style clearfix">
 <div class="user_center clearfix" style="width:1250px">
 <div class="left_style">
     <div class="menu_style">
     <div class="user_title">用户中心</div>
     <div class="user_Head">
     <div class="user_portrait">
      <a href="#" title="修改头像" class="btn_link"></a> <img src="images/people.png">
      <div class="background_img"></div>
      </div>
      <div class="user_name">
       <p><span class="name">化海天堂</span><a href="#">[修改密码]</a></p>
       <p>访问时间：2016-1-21 10:23</p>
       </div>           
     </div>
     <div class="sideMen">
     <!--菜单列表图层-->
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_1"></em>订单管理</dt>
      <dd>
        <ul>
          <li> <a href="用户中心-我的订单.html">我的订单</a></li>
          <li> <a href="用户中心-收货地址.html">收货地址</a></li>
          <li> <a href="#">缺货登记</a></li>
        </ul>
      </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_2"></em>会员管理</dt>
        <dd>
      <ul>
        <li> <a href="#"> 用户信息</a></li>
        <li> <a href="用户中心-我的收藏.html"> 我的收藏</a></li>
        <li> <a href="#"> 我的留言</a></li>
        <li> <a href="#">我的标签</a></li>
        <li> <a href="#"> 我的推荐</a></li>
        <li><a href="#"> 我的评论</a></li>
      </ul>
    </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_3"></em>申请售后</dt>
      <dd>
       <ul>
        <li><a href="/home/after/shouhou">申请售后</a></li>
        <li><a href="/home/after/liulan">浏览记录</a></li>    
      </ul>
     </dd>
    </dl>
     <dl class="accountSideOption1">
        <dt class="transaction_manage"><em class="icon_4"></em>分销管理</dt>
        <dd>
            <ul>
            <li> <a href="#">店铺管理</a></li>
            <li> <a href="#">我的盟友</a></li>
            <li> <a href="#">我的佣金</a></li>
            <li> <a href="#">申请提现</a></li>
            </ul>
        </dd>
    </dl>
    </div>
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script>
   </div>
 </div>
            <div class="right_style">
        @section('content') 
                <div class="title_style"><em></em>账户管理</div> 
                <div class="user_Account_style">
                    <div class="user_Account">
                        <div class="title_name">我的账户余额：（小充钱包）</div>
                        <div class="Balance clearfix">
                            <p class="je_Balance">账户余额：<b><i>1</i><i>2</i><i>3</i><i>4</i>.<i>3</i></b>元 </p>
                            <p class="clearfix Account_btn"><a href="#" class="Recharge_btn" id="Recharge_btn">充值</a><a href="#" class="withdraw_btn" id="cz_Records_btn">充值记录</a></p>
                    </div>
                </div>
        @show

            </div>
  </div>
 </div>
</div>
  <script type="text/javascript">
         //弹出一个iframe层
$('#cz_Records_btn').on('click', function(){
    layer.open({
        type: 2,
        title: '充值记录',
        maxmin: true,
        shadeClose: true, //点击遮罩关闭层
        area : ['900px' , '450px'],
        content:'分销管理-提现账单.html'
    });
});</script>
 

@endsection