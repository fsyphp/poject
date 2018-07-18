@extends('home/layout/header')

@section('css')
<link href="/home/css/user_style.css" rel="stylesheet" type="text/css" />
<script src="/js/layer.js"></script>
@endsection

@section('title','个人订单')

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
      <dt class="transaction_manage"><em class="icon_1"></em>订单管理</dt>
      <dd>
        <ul>
          <li> <a href="/home/userorders">我的订单</a></li>
          <li> <a href="/home/address">收货地址</a></li> 
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
    
    </div>
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script>
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
                        <a href="/home/draw" class="on">
                            抽奖订单
                        </a>
                        <a href="/home/exchange" class="on">
                            兑换订单
                        </a>
                        <a href="/home/nocreate" class="number">
                            未完成（<span>{{count($no)}}</span>）
                        </a>
                        <a href="/home/when" class="">
                            待发货
                        </a>
                        <a href="/home/collect" class="">
                            待收货
                        </a>
                        <!-- <a href="#" class="">退货/退款（0）</a> -->
                        <a href="/home/success" class="">
                            交易成功
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
                                    <td class="split_line">
                                        {{$v['total']}}
                                        <span class="oid" oid="{{$v['id']}}"></span>
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
                                        @if($v['static'] == '2')
                                            <a class="del" href="#">
                                                删除
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
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
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.success').click(function(){
                var is = $(this);
                var text = $(this).parents('tr').find('td').eq(5);
                var texts = $(this).parents('tr').find('td').eq(6);
                var id = $(this).attr('gid');
                $.post('/home/belong',{id:id},function(data){
                    if(data=='00'){
                        text.empty();
                        is.remove();
                        text.html('<a href="#" class="btn btn-info btn-xs" style="width:50px;margin-left:35px;">去评价</a>');
                        layer.msg('快去评价你买的商品吧...',{time: 3000});
                        setTimeout(load,3000);
                        function load(){
                            location.reload(true);
                        }
                    } else {
                        layer.msg('网络繁忙,请稍后再试...',{
                            time: 3000,
                        });
                    }
                });
                return false;
            });
            $('.del').click(function(){
                var is = $(this);
                layer.open({
                    title: '删除操作...',
                    content: '你确认要删除吗?',
                    icon: 3,
                    btn: ['确认','取消'],
                    yes:function(index){
                        var id = $('.oid').attr('oid');
                        $.post('/home/delete',{id:id},function(data){
                            if(data=='00'){
                                is.parents('tbody').remove();
                                layer.msg('删除成功...',{time:3000});
                            } else {
                                layer.msg('网络繁忙,请稍后重试...',{time:3000});
                            }
                        });
                        layer.close(index);
                    },
                    closeBtn: 2,
                });
                return false;
            });
        </script>
@endsection