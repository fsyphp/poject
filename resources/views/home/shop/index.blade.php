@extends('home.layout.header')
@section('title',$title)
@section('layout')  
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="Inside_pages clearfix">
<div class="left_style">
  <!--列表-->
  <div class="menu_styles">
    
  </div>
</div>
<div class="right_style" style="">
  <!--内容详细-->
   <div class="title_style"><em></em>店铺专区</div>
   <div class="content_style"> 
    <div class="shops_list">
    @foreach ($shop as $k=>$v)
        <ul class="list_style">

                <li class="img_link"><a href="/home/shop/detail/{{$v->id}}"><img src="{{\Config('app.gpic')}}{{$v->shop_pic}}" /></a> </li>
                <li class="shopscontent">
                    <a href="/home/shop/detail/{{$v->id}}" class="title">店铺名称 :{{$v->shop_name}}</a>
                    <a href="/home/shop/detail/{{$v->id}}" class="title">服务电话 :{{$v->tel}}</a>

                    <p class="Introduction">地址 :{{$v->address}}</p> 

                    <!-- <p class="shops_operating"><a href="#" class="View_info">查看详情</a> <a href="店铺公告.html" class="shops_Bulletin">店铺公告</a></p> -->
                </li>
        </ul>
    @endforeach

    </div>
   </div>
   <div class="Paging">
            <div class="Pagination"> 
                     {!!$shop!!}
            </div>
        </div>
</div>


</div>
 
 <style>
     .Pagination ul li{
         float:left;
     }
 </style>

@endsection