@extends('home/layout/header')

@section('css')
    <style>
        #province select{margin-right:10px;width:85px;height:30px;}
    </style>
    <link href="/home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/user_style.css" rel="stylesheet" type="text/css" />
    <link href="/home/skins/all.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://lib.h-ui.net/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/js/jquery.provincesCity.js"></script>
	<script type="text/javascript" src="/js/provincesData.js"></script>	
    <!-- <script src="/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> -->
    <!-- <script src="/home/js/common_js.js" type="text/javascript"></script> -->
    <!-- <script src="/home/js/footer.js" type="text/javascript"></script> -->
    <!-- <script src="/home/layer/layer.js" type="text/javascript"></script> -->
    <!-- <script src="/home/js/iCheck.js" type="text/javascript"></script> -->
    <!-- <script src="/home/js/custom.js" type="text/javascript"></script> -->
@endsection

@section('title','用户收货地址管理')

@section('layout')

    <div class="user_style clearfix">
 <div class="user_center clearfix">
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
      <dt class="transaction_manage"><i class="icon_1"></i>订单管理</dt>
      <dd>
        <ul>
          <li> <a href="用户中心-我的订单.html">我的订单</a></li>
          <li> <a href="用户中心-收货地址.html">收货地址</a></li>
        </ul>
      </dd>
    </dl>
    </div>
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script>
   </div>
 </div>
 <!--右侧样式属性-->
 <div class="right_style">
 <!--地址管理-->
  <div class="user_address_style">
    <div class="title_style">修改地址</div> 
   <div class="add_address">
    <span class="name">添加送货地址</span>
    <table cellpadding="0" cellspacing="0" width="100%">
    <form action="/home/addressupdate" method="post">
    {{ csrf_field() }}
    <input type="hidden" name"id" value="{{$user_address->id}}" >
     <tr><td class="label_name">收&nbsp;货&nbsp;&nbsp;人：</td><td><input name="address_user" value="{{$user_address->address_user}}" type="text"  class="add_text" style=" width:100px"/></td></tr>
     <tr><td class="label_name">手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</td><td><input name="address_tel" value="{{$user_address->address_tel}}" type="text" class="add_text" style=" width:200px"/>&nbsp;&nbsp;</td></tr>     
     <tr>
     <td class="label_name">选择城市：</td>
     <td>
        <div id="province"></div>
        <script type="text/javascript">
            /*调用插件*/
            $(function(){
                $("#province").ProvinceCity();
            });
        </script>
     </td>
     </tr>
     <tr><td class="label_name">详细地址：</td><td><textarea name="address" cols="" rows="" style=" width:500px; height:100px; margin:5px 0px">{{$addr}}</textarea><i></i></td></tr>
    <tr><td></td><td style="float:left;" class="center"><input type="submit" value="修改" class="add_dzbtn"/></td></tr>    
    </table>
    </form>
   </div>
   <!--用户地址-->
  </div>
 </div>
 </div>
 </div>
    <script>
        $(document).ready(function(){
            $('.moren_dz input').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
            });
        });
    </script>

@endsection

@section('links')

@endsection