@extends('home.layout.header')
@section('title',$title)
@section('layout')  
<link href="/home/css/base.css" rel="stylesheet" type="text/css" />
<link href="/home/css/supplie.css" rel="stylesheet" type="text/css" />
<link href="/home/css/style1.css" rel="stylesheet" type="text/css" />
 

<div class="clear">&nbsp;</div>

<!--网站头部-->
<div class="sup-wid">
	<div><img src="/home/images/TB27.gif" width="100%"/></div>
    <div class="supplie-top">
         
        <div class=" clear bread"><a href="#">首页</a> <span class="pipe">&gt;</span> <a href="#">{{$shop['shop_name']}}店铺</a> <span class="pipe">&gt;</span> <a href="#"></a></div>
    </div>
    <div class="company-profile">
        <div class="logo">
        	<div><img src="{{\Config('app.gpic')}}{{$shop['shop_pic']}}"  width="300" height="192"/></div>
            <div class="margin-l50 margin-t10">
            	<div class="shoucang"><img src="images/iconfont-shoucang.png" width="14" height="14" />收藏店铺</div>
                <div class="liuyan"><img src="images/iconfont-liuyan-alt.png" width="14" height="14" />给我留言</div>
            </div>
        </div>
        <div class="text-introduce"><span>{{$shop['shop_name']}}</span>
            <p>地址 :{{$shop['address']}}</p>
            <p>服务电话 :{{$shop['tel']}}</p>
            <p>介绍 :{{$shop['content']}}</p>
        </div>
    </div>
   
</div>


 

@endsection