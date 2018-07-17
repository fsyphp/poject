@extends('home.layout.header')
@section('title',$title)
@section('layout')
<link href="/home/css/base.css" rel="stylesheet" type="text/css" />
<link href="/home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/home/css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/js/jquery-1.8.3.min.js"></script>
<script src="/home/js/jquery.simpleGal.js"></script>
<script type="text/javascript" src="/home/js/jquery.imagezoom.min.js"></script>
<script src="/js/layer.js"></script>
<style>
img {
	max-width: none;
}
.tb-pic a {
	display: table-cell;
	text-align: center;
	vertical-align: middle;
}
.tb-pic a img {
	vertical-align: middle;
}
.tb-pic a {
*display:block;
*font-family:Arial;
*line-height:1;
}
.tb-thumb {
	margin: 10px 0 0;
	overflow: hidden;
}
.tb-thumb li {
	float: left;
	width: 86px;
	height: 86px;
	overflow: hidden;
	border: 1px solid #cdcdcd;
	margin-right: 5px;
}
.tb-thumb li:hover, .tb-thumb .tb-selected {
	width: 84px;
	height: 84px;
	border: 2px solid #799e0f;
}
.tb-s310, .tb-s310 a {
	height: 365px;
	width: 365px;
}
.tb-s310, .tb-s310 img {
	max-height: 365px;
	max-width: 365px;
}
.tb-booth {
	border: 1px solid #CDCDCD;
	position: relative;
	z-index: 1;
}
div.zoomDiv {
	z-index: 999;
	position: absolute;
	top: 0px;
	left: 0px;
	background: #ffffff;
	border: 1px solid #ccc;
	display: none;
	overflow: hidden;
}
div.zoomMask {
	position: absolute;
	background: url("/home/images/mask.png") repeat;
	cursor: move;
	z-index: 1;
}
<!--弹出隐藏层-->
 .black_overlay {
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 1200px;
	background-color: black;
	z-index: 9999;
	-moz-opacity: 0.4;
	opacity: 0.40;
	filter: alpha(opacity=40);
}
.white_content {
	display: none;
	position: absolute;
	top: 20%;
	left: 40%;
	width: 400px;
	height: 175px;
	border: none;
	background-color: white;
	z-index: 100200;
	overflow: auto;
}
.white_content_small {
	display: none;
	position: absolute;
	top: 20%;
	left: 30%;
	width: 40%;
	height: 50%;
	background-color: white;
	z-index: 1002;
	overflow: auto;
}
.dialogbox {
	padding: 20px;
	line-height: 40px;
}
.addbtn {
	width: 22px;
	height: 22px;
	background: url(/home/images/close2.png) no-repeat;
	margin-right: 5px;
	margin-top: 3px;
	border: none;
	float: right;
}
</style>
<script type="text/javascript">
//弹出隐藏层
function ShowDiv(show_div,bg_div){
document.getElementById(show_div).style.display='block';
document.getElementById(bg_div).style.display='block' ;
var bgdiv = document.getElementById(bg_div);
bgdiv.style.width = document.body.scrollWidth;
// bgdiv.style.height = $(document).height();
$("#"+bg_div).height($(document).height());
};
//关闭弹出层
function CloseDiv(show_div,bg_div)
{
document.getElementById(show_div).style.display='none';
document.getElementById(bg_div).style.display='none';
};

</script>
<div class="sup-wid">
	<div><img src="/home/images/TB27.gif" width="100%"></div>
    <div class="supplie-top">
        <div class="clear">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="nav">
                <tbody><tr>
                    <td align="center"><a href="#">供应商首页</a></td>
                    <td align="center"><a href="#">全部产品</a></td>
                    <td align="center"><a href="#">企业介绍</a></td>
                    <td align="center"><a href="#">最新产品</a></td>
                    <td align="center"><a href="#">热销产品</a></td>
                    <td align="center"><a href="#">促销产品</a></td>
                </tr>
            </tbody></table>
        </div>
        <div class=" clear bread"><a href="#">首页</a> <span class="pipe">&gt;</span> <a href="#">供应商</a> <span class="pipe">&gt;</span> <a href="#">{{$goods->gname}}</a></div>
</div>
    <div class="pro_detail">
        <div class="pro_detail_img float-lt">
            <div class="gallery"> 
                <div class="tb-booth tb-pic tb-s310"> 
                    <a href="/home/images/01.jpg">
                        <img src="{{\Config('app.gpic')}}{{$goods['gpic']}}" alt="" rel="{{\Config('app.gpic')}}{{$goods['gpic']}}" class="jqzoom" style="cursor: crosshair;">
                    </a>
                </div>
                <ul class="tb-thumb" id="thumblist" style=" width: 380px;"> 
                <?php
                    $pic=explode(',',$goods->detail['manypic']);
                ?>
                @foreach($pic as $k=>$v)
                    <li class="" style="float:left">
                        <div class="tb-pic tb-s40"><a href="#"><img src="{{\Config('app.gpic')}}{{$v}}" width="100%" mid="{{\Config('app.gpic')}}{{$v}}" big="{{\Config('app.gpic')}}{{$v}}"></a></div>
                    </li>
                @endforeach
                  
                </ul> 
            </div>
            <script type="text/javascript">
        $(function(){
				$("#h1").toggle(function(){
					$("#h1").css("background-image","url('/home/images/iconfont-xingxingman_add.png')");
				},function(){
					$("#h1").css("background-image","url('/home/images/iconfont-xingxingman_add.png') ");
				})
			}) 

</script>
             
        </div>
        <div class="float-lt pro_detail_con">
            <div class="pro_detail_tit">{{$goods->gname}}</div>
            <!-- <div class="pro_detail_ad">茅山长青是未经发酵制成的茶，保留了鲜叶的天然物质，含有的茶多酚、儿茶素、叶绿素、咖啡碱、氨基酸、维生素等营养成分也较多。这些天然营养成份对防衰老、防癌、抗癌、杀菌、消炎等具有特殊效果。</div> -->
            <div class="pro_detail_score margin-t20">
                <ul>
                    <li class="margin-r20">评分</li>
                </ul>
                <ul>
                    <li style="width:16px; height:16px;"><img src="/home/images/iconfont-xingxingman.png" width="16" height="16"></li>
                    <li style="width:16px; height:16px;"><img src="/home/images/iconfont-xingxingman.png" width="16" height="16"></li>
                    <li style="width:16px; height:16px;"><img src="/home/images/iconfont-xingxingman.png" width="16" height="16"></li>
                    <li style="width:16px; height:16px;"><img src="/home/images/iconfont-xingxingman.png" width="16" height="16"></li>
                    <li style="width:16px; height:16px;"><img src="/home/images/iconfont-xingxingkong.png" width="16" height="16"></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="pro_detail_price  margin-t20"><span class="margin-r20">市场价</span><span style=" font-size:16px"><s>￥2000.00</s></span></div>
            <div class="clear"></div>
            <div class="pro_detail_act margin-t20 fl"><span class="margin-r20">售价</span><span style="font-size:26px; font-weight:bold; color:#dd514c;" class="jiege" gid={{$goods['id']}}>￥{{$goods->price}}</span></div>
            <div class="clear"></div>
            <!-- <div class="act_block margin-t5"><span>本商品可使用9999积分抵用￥9.99元</span></div> -->
            <div class="pro_detail_number margin-t30">
                <div class="margin-r20 float-lt">数量</div>
                <div class=""> <i class="jian"></i>
                    <input type="text" value="1" class="float-lt choose_input">
                    <i class="jia"></i> <span>&nbsp;盒</span> （库存<span class="ku">{{$goods->detail['stock']}}</span> 件）</div>
                <div class="clear"></div>
            </div>
           
            <div class="guige">
                <div class="margin-r20 float-lt" style="line-height:25px;">规格</div>
                <ul>
                        <?php
                            $gram=explode(',',$goods->detail['gram']);
                        ?>
                        @foreach($gram as $k=>$v)
                            <li class="guige-cur">
                                <input type="radio" name="gram" @if($v==0) checked @endif value="@if($v==0) 500g @elseif($v==1) 1000g @else 5000g @endif" >@if($v==0) 500g @elseif($v==1) 1000g @else 5000g @endif
                            </li> 
                    
                        @endforeach
                </ul>
                <div class="clear"></div>
            </div>
            <div class="pro_detail_number margin-t20">
                <div class="margin-r20 float-lt">成交量：<span class="colorred"><strong>{{$goods->detail['number']}}件</strong></span></div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="pro_detail_btn margin-t30">
                <ul>
                    <li class="pro_detail_shop"><a href="">立即购买</a></li>
                    <li class="pro_detail_add"><a href="">加入我的购物车</a></li>
                </ul>
            </div>
        </div>
       
    </div>
    <div class="clear"></div>
    <script>
		$(function(){
			$(".pro_tab li").each(function(i){
				$(this).click(function(){
					$(this).addClass("cur").siblings().removeClass("cur");
					$(".conlist .conbox").eq(i).show().siblings().hide();
				})
			})
		})
	</script>
    <div class="pro_con margin-t55" style="overflow:hidden;">
        <div class="pro_tab">
            <ul>
                <li class="cur">产品介绍</li> 
                <li>评价</li>

            </ul>
        </div>
        <div class="conlist">
            <div class="conbox" style="display:block;">
                {!!$goods->detail['baby']!!}
            </div> 
            <div class="conbox">
                <div class="pro_judge">
                    <ul>
                        <li class="cur">
                            <input name="RadioGroup1" type="radio" value="" checked="checked" id="RadioGroup1_0">
                            全部（100）</li>
                        <li>
                            <input name="RadioGroup1" type="radio" value="" id="RadioGroup1_1">
                            好评（80）</li>
                        <li>
                            <input name="RadioGroup1" type="radio" value="" id="RadioGroup1_2">
                            中评（10）</li>
                        <li>
                            <input name="RadioGroup1" type="radio" value="" id="RadioGroup1_3">
                            差评（10）</li>
                    </ul>
                    <table width="100%" border="0">
                        <tbody><tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td width="80" align="left"><a href="" rel="/home/images/01_mid.jpg" class="preview"><img src="/home/images/01_mid.jpg" width="60" height="60" class="border_gry"></a></td>
                            <td>茶泡出来颜色很好！味道很清香！非常喜欢！包装也很精致，下次还来买！好评！<br>
                                <br>
                                <span class="pro_judge_time">2014.1.3</span></td>
                            <td>张三</td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
    <div class="hotpro">
        <div class="hotpro_title">热销产品</div>
        <div class="hotpro_box">
            <div class="pro-view-hot" style=" width:1200px;">
            @foreach($re as $k=>$v)
                <ul>
                    <li class="pro-img"><a href="#"><img src="{{\Config('app.gpic')}}{{$v->goods['gpic']}}" width="100%"></a></li>
                    <li class="price"><strong>{{$v->goods['price']}}</strong><span>已销售{{$v->number}}</span></li> 

                    <li><a href="/index" class="title">{{$v->goods['gname']}} </a></li>

                    <li><a href="/index" class="title">{{$v->goods['gname']}} </a></li> 

                </ul>
            @endforeach
            </div>
        </div>
    </div>
    
    <div class="helper">
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/home/images/h1.png" width="60" height="60"><span>新手上路</span> </h4>
            </div>
        </div>
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/home/images/h2.png" width="60" height="60"><span>如何支付</span> </h4>
            </div>
        </div>
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/home/images/h3.png" width="60" height="60"><span>配送运输</span> </h4>
            </div>
        </div>
        <div class="mod mod-last">
            <div class="mod-wrap">
                <h4><img src="/home/images/h4.png" width="60" height="60"><span>售后服务</span> </h4>
            </div>
        </div>
        <div class="mod mod-last">
            <div class="mod-wrap">
                <h4><img src="/home/images/h5.png" width="60" height="60"><span>联系我们</span> </h4>
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
    // 立即购买
    $('.pro_detail_shop').click(function(){
        // 商品 id
        var gid = $('.jiege').attr('gid');
        //购买数量
        var sum = $('.choose_input').val();
        //规格
        size = $(':checked').val();
        // 发送 ajax 
        $.post('/home/go',{gid:gid,sum:sum,size:size},function(data){
            if(data == '00'){
                location.href = '/home/goshopping';
            } else if(data == '01'){
                layer.open({
                    type: 2,
                    title: '登录操作',
                    content: '/home/shop_login',
                    area: ['395px', '340px'],
                    offset: '100px',
                    closeBtn: 2,
                });
            }
        });
        return false;
    });
    //加入购物车
    $('.pro_detail_add').click(function(){
        // 商品id
        var gid = $('.jiege').attr('gid');
        //购买数量
        var sum = $('.choose_input').val();
        //规格
        size = $(':checked').val();
        // 发送 ajax 添加商品到购物车
        $.post('/home/shoppadd',{gid:gid,sum:sum,size:size},function(data){
            if(data == '0'){
                layer.open({
                    type: 2,
                    title: '登录操作',
                    content: '/home/shop_login',
                    area: ['395px', '340px'],
                    offset: '100px',
                    closeBtn: 2,
                });
            } else if(data == '1'){
                layer.open({
                    type: 0,
                    title: '添加成功!',
                    icon: 6,
                    content: '商品已成功加入购物车...',
                    btn: ['去查看','继续购'],
                    yes: function(){
                        location.href = '/home/show';
                    },
                    btn2: function(){
                        location.href = '/';
                    },
                    closeBtn: 2,
                });
            } else if(data == '2'){
                layer.open({
                    type: 0,
                    title: '重复操作!',
                    icon: 5,
                    content: '商品已在购物车了哦...',
                    btn: ['去查看'],
                    yes: function(){
                        location.href = '/home/show';
                    },
                    closeBtn: 2,
                });
            }
         });

         return false;
    });
</script>

<script type="text/javascript">
$(document).ready(function(){

	$(".jqzoom").imagezoom();
	
	$("#thumblist li a").mousemove(function(){
		$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
		$(".jqzoom").attr('src',$(this).find("img").attr("mid"));
		$(".jqzoom").attr('rel',$(this).find("img").attr("big"));
	});

});
</script>
 <script>
            
            var i=1;
            var num=$('.ku').text(); 
            $('.jia').click(function(){ 
                if(i>=num){
                    i=num;
                }else{
                    $(this).prev().val(i++); 
                }
            })
            $('.jian').click(function(){
                var val=$('.jian').next().val();  
                if(val<=1){
                    val=1;
                }else{
                    $(this).next().val(val-1); 
                }
                // alert(val);
            })
        </script>
@endsection



