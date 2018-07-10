@extends('home.layout.header')
@section('title',$title)
@section('layout')
 <style>
     .ji{
         	background-color: #FB914A;
     }
 </style>
<script type="text/javascript" charset="UTF-8">
<!--
 //点击效果start
 function infonav_more_down(index)
 {
  var inHeight = ($("div[class='p_f_name infonav_hidden']").eq(index).find('p').length)*30;//先设置了P的高度，然后计算所有P的高度
  if(inHeight > 60){
   $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:inHeight});
   $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"><a class="more"  onclick="infonav_more_up('+index+');return false;" href="javascript:">收起<em class="pulldown"></em></a></p>');
  }else{
   return false;
  }
 }
 function infonav_more_up(index)
 {
  var infonav_height = 85;
  $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:infonav_height});
  $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"> <a class="more" onclick="infonav_more_down('+index+');return false;" href="javascript:">更多<em class="pullup"></em></a></p>');
 }
   
 function onclick(event) {
  info_more_down();
 return false;
 }
 //点击效果end  
//-->
<!--实现手风琴下拉效果-->
$(function(){
   $(".nav").accordion({
        //accordion: true,
        speed: 500,
	    closedSign: '+',
		openedSign: '-'
	});
}); 

$(function() { 
	$("#scrollsidebar").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime : 600
	});
});
</script>
<body>
 
<!--产品列表样式-->
<div class="Inside_pages"> 
 
 <!--产品列表样式-->
 <div  class="scrollsidebar side_green clearfix" id="scrollsidebar"> 
    <div class="show_btn" id="rightArrow"><span></span></div>
     <!--左侧样式-->
   <div class="page_left_style side_content"  > 
 
  </div>
 </div>
 <div class="page_right_style" style="position: relative;right: 110px;">
 <div class="Sorted">
  <div class="Sorted_style">
   <a href="javascript:void(0)" class="on">综合<i class="iconfont icon-fold"></i></a>
   <a href="javascript:void(0)">信用<i class="iconfont icon-fold"></i></a>
   <a href="javascript:void(0)">价格<i class="iconfont icon-fold"></i></a>
   <a href="javascript:void(0)">销量<i class="iconfont icon-fold"></i></a>
   </div>
   <!--产品搜索-->
   <div class="products_search">
    <input name="" type="text" class="search_text" value="请输入你要搜索的产品" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}"><input name="" type="submit" value="" class="search_btn">
   </div>
   <!--页数-->
   <div class="s_Paging">
   <span> 1/12</span>
   <a href="#" class="on">&lt;</a>
   <a href="#">&gt;</a>
   </div>
   </div>
   <div class="p_list  clearfix">
   <ul>
       @foreach($goods as $k=>$v)
            <li class="gl-item">
                <em class="icon_special tejia"></em>
                <div class="Borders">
                <div class="img"><a href="javascript:void(0)"><img src="{{$v->img}}" style="width:220px;height:220px"></a></div>
                <div class="Price"><b>¥{{$v->price}}</b><span>[¥{{$v->price}}/500g]</span></div>
                <div class="name"><a href="javascript:void(0)">{{$v->title}}组</a></div>
                <div class="Shop_name"><a href="#">库存 : {{$v->stock}}</a></div>
                <div class="p-operate">
                <a href="javascript:void(0)" class="p-o-btn Collect"><em></em>立即兑换</a>
                <a href="javascript:void(0)" class="p-o-btn shop_cart"><em></em>联系我们</a>
                </div>
                </div>
            </li>
        @endforeach
   </ul>
   
   </div>
</div>
</div>



@endsection