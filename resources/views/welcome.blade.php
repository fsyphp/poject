@extends('home.layout.header')
@section('layout')
@section('title',$title)
<!--广告幻灯片样式-->
<div id="slideBox" class="slideBox">
			<div class="hd">
				<ul class="smallUl"></ul>
			</div>
			<div class="bd">
				<ul>
                @foreach($lunbo as $k=>$v)
					<li><a href="javascript:void(0)" target="_blank">
                        <div style="background:url({{$v->pic}}) no-repeat; background-position:center; width:100%; height:450px;"></div>
                        </a>
                    </li>
				@endforeach
                </ul>
			</div>
			<!-- 下面是前/后按钮-->
			<a class="prev" href="javascript:void(0)"></a>
			<a class="next" href="javascript:void(0)"></a>

		</div>
		<script type="text/javascript">
		jQuery(".slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true});
		</script>
 </div>

<!--内容样式-->
<div id="mian">
 <div class="clearfix marginbottom">
 <!--产品分类样式-->
  <div class="Menu_style" id="allSortOuterbox">
   <div class="title_name"><em></em>所有商品分类</div>
   <div class="content hd_allsort_out_box_new">
    <ul class="Menu_list">
    @foreach (\App\Model\Cate::getCate() as $k=>$v) 
        <li class="name">
            <div class="Menu_name"><a href="/home/goods/list?id={{$v->id}}" >{{$v->title}}</a> <span>&lt;</span></div> 
                <div class="menv_Detail">
                    <div class="cat_pannel clearfix">
                        <div class="hd_sort_list">
                            @foreach($v->sub as $kk=>$vv)
                                <dl class="clearfix" data-tpc="1">
                                    <dt><a href="/home/goods/list?id={{$vv->id}}">{{$vv->title}}<i>></i></a></dt>
                                    <dd>
                                        @foreach($vv->sub as $ks=>$vs)
                                            <a href="/home/goods/list?id={{$vs->id}}">{{$vs->title}}</a> 
                                        @endforeach
                                    </dd> 
                                </dl>
                            @endforeach
                        </div>
                        <div class="Brands">
                    </div>
                </div>   
            </div>		 
        </li>
    @endforeach
       
		</li>   
    </ul>
   </div>
  </div>
  <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
  <!--产品栏切换-->
  <div class="product_list left">
  		<div class="slideGroup">
			<div class="parHd">
				<ul><li>秒杀商品</li><li>新品上市</li><li>热销商品</li><li>抽奖商品</li><li>兑换商品</li></ul>
			</div>
			<div class="parBd">
					<div class="slideBoxs">
						<a class="sPrev" href="javascript:void(0)"></a>
						<ul>
                            @foreach($maio as $k=>$v)
							<li>
								<div class="pic"><a href="/home/detail/{{$v->id}}" target=""><img src="{{\Config('app.gpic')}}{{$v->gpic}}" /></a></div>
								<div class="title">
                                <a href="/home/detail/{{$v->id}}" target="" class="name">{{$v->gname}}</a>
                                <h3><b>￥</b>{{$v->price}}</h3>
                                </div>
							</li>
							@endforeach
						</ul>
						<a class="sNext" href="javascript:void(0)"></a>
					</div><!-- slideBox End -->

					<div class="slideBoxs">
						<a class="sPrev" href="javascript:void(0)"></a>
						<ul>
                            @foreach($xin as $k=>$v)
							<li>
								<div class="pic"><a href="/home/detail/{{$v->id}}" target=""><img src="{{Config('app.gpic')}}{{$v->gpic}}" /></a></div>
								<div class="title">
                                <a href="/home/detail/{{$v->id}}" target="_blank" class="name">{{$v->gname}}</a>
                                <h3><b>￥</b>{{$v->price}}</h3>
                                </div>
                            </li>
                            @endforeach
							 
						</ul>
						<a class="sNext" href="javascript:void(0)"></a>
					</div><!-- slideBox End -->

					<div class="slideBoxs">
						<a class="sPrev" href="javascript:void(0)"></a>
						<ul>
                        @foreach($re as $k=>$v)
							<li>
								<div class="pic"><a href="/home/detail/{{$v->id}}" target=""><img src="{{\Config('app.gpic')}}{{$v->goods['gpic']}}" /></a></div>
								<div class="title">
                                <a href="/home/detail/{{$v->id}}" target="" class="name">{{$v->goods['gname']}}</a>
                                <h3><b>￥</b>{{$v->goods['price']}}</h3>
                                </div>
							</li> 
                        @endforeach
						</ul>
						<a class="sNext" href="javascript:void(0)"></a>
					</div><!-- slideBox End -->
                    	<div class="slideBoxs">
						<a class="sPrev" href="javascript:void(0)"></a>
						<ul>
                            @foreach($chou as $k=>$v)
							<li>
								<div class="pic"><a href="home/lottery" target=""><img src="{{$v->img}}" /></a></div>
								<div class="title">
                                <a href="home/lottery" target="_blank" class="name">{{$v->title}}</a>
                                <h3><b>库存</b>{{$v->stock}}</h3>
                                </div>
							</li>
							 @endforeach
						</ul>
						<a class="sNext" href="javascript:void(0)"></a>
					</div><!-- slideBox End -->
                    	<div class="slideBoxs">
						<a class="sPrev" href="javascript:void(0)"></a>
						<ul>
                            @foreach($dui as $k=>$v)
							<li>
								<div class="pic"><a href="home/integral" target=""><img src="{{$v->img}}" /></a></div>
								<div class="title">
                                <a href="home/integral" target="" class="name">{{$v->title}}</a>
                                <h3><b>积分</b>{{$v->price}}</h3>
                                </div>
							</li>
							@endforeach
						</ul>
						<a class="sNext" href="javascript:void(0)"></a>
					</div><!-- slideBox End -->

			</div><!-- parBd End -->
		</div>
        <script type="text/javascript">
			/* 内层图片无缝滚动 */
			jQuery(".slideGroup .slideBoxs").slide({ mainCell:"ul",vis:4,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});
			/* 外层tab切换 */
			jQuery(".slideGroup").slide({titCell:".parHd li",mainCell:".parBd"});
		</script>
        <!--广告样式-->
        <div class="Ads_style">
            <a href=""><img src="/home/images/AD_03.png"  width="318"/></a>
            <a href="#"><img src="/home/images/AD_04.png" width="318"/></a>
            <a href="#"><img src="/home/images/AD_06.png" width="318"/></a>
        </div>
  </div>
 </div>
 <!--板块栏目样式-->
 <div class="clearfix Plate_style">
  <div class="Plate_column Plate_column_left">
    <div class="Plate_name">
    <h2>酒水专区</h2>
    <div class="Sort_link">
        <a href="#" class="name">白酒</a>
        <a href="#" class="name">红酒</a>
        <a href="#" class="name">洋酒</a>
        <a href="#" class="name">黑啤</a>
        <a href="#" class="name">白啤</a>
    </div>
    <a href="#" class="Plate_link"> <img src="/home/images/bk_img_14.png" /></a>
   
    </div>
    <div class="Plate_product">
    <ul id="lists">
    @foreach($jius as $k=>$v)
        <li class="product_display"> 
        <a href="/home/cang/{{$v->id}}" class="Collect"><em></em>收藏</a> 
            <a href="/home/detail/{{$v->id}}" class="img_link"><img src="{{\Config('app.gpic')}}{{$v->gpic}}"  width="140" height="140"/></a>
            <a href="/home/detail/{{$v->id}}" class="name">{{$v->gname}}</a>
            <h3><b>￥</b>{{$v->price}}</h3>
            <div class="Detailed">
            <div class="content">
                <p class="center"><a href="#" class="Buy_btn">立即购买</a></p>
                </div>
            </div>
        </li>
    @endforeach
    </ul>
    </div>
  </div>
  <!--板块名称-->
    <div class="Plate_column Plate_column_right">
    <div class="Plate_name">
    <h2>食品</h2>
    <div class="Sort_link">
        <a href="#" class="name">干果</a>
        <a href="#" class="name">糕点</a>
        <a href="#" class="name">水果</a>
        <a href="#" class="name">水果</a>
        <a href="#" class="name">牛奶</a> 
    </div>
    <a href="#" class="Plate_link"> <img src="/home/images/bk_img_19.png" /></a>
   
    </div>
    <div class="Plate_product">
    <ul id="lists">
    @foreach($shipin as $k=>$v)
        <li class="product_display">
        <a href="/home/cang/{{$v->id}}" class="Collect"><em></em>收藏</a>
        <a href="/home/detail/{{$v->id}}" class="img_link"><img src="{{\Config('app.gpic')}}{{$v->gpic}}"  width="140" height="140"/></a>
        <a href="/home/detail/{{$v->id}}" class="name">{{$v->gname}}</a>
        <h3><b>￥</b>{{$v->price}}</h3>
        <div class="Detailed">
        <div class="content">
            <p class="center"><a href="#" class="Buy_btn">立即购买</a></p>
            </div>
        </div>
        </li>
    @endforeach
    </ul>
    </div>
  </div>
   <div class="Plate_column Plate_column_left">
    <div class="Plate_name">
    <h2>海鲜</h2>
    <div class="Sort_link">
        <a href="#" class="name">虾</a>
        <a href="#" class="name">螃蟹</a>
        <a href="#" class="name">鳖</a>
        <a href="#" class="name">鱼</a>
        <a href="#" class="name">鱿鱼</a> 
    </div>
    <a href="#" class="Plate_link"> <img src="/home/images/bk_img_22.png" /></a>
   
    </div>
    <div class="Plate_product">
    <ul id="lists">
     <li class="product_display">
     <a href="" class="Collect"><em></em>收藏</a>
     <a href="#" class="img_link"><img src="/home/products/p_21.jpg"  width="140" height="140"/></a>
     <a href="#" class="name">墨西哥原装进口 科罗娜啤酒</a>
     <h3><b>￥</b>34.00</h3>
    <div class="Detailed">
	   <div class="content">
		  <p class="center"><a href="#" class="Buy_btn">立即购买</a></p>
		  </div>
	   </div>
     </li>
     <li class="product_display">
      <a href="" class="Collect"><em></em>收藏</a>
     <a href="#" class="img_link"><img src="/home/products/p_25.jpg"  width="140" height="140"/></a>
     <a href="#" class="name">墨西哥原装进口 科罗娜啤酒</a>
     <h3><b>￥</b>34.00</h3>
      <div class="Detailed">
	   <div class="content">
		  <p class="center"><a href="#" class="Buy_btn">立即购买</a></p>
		  </div>
	   </div>
     </li>
     <li class="product_display">
      <a href="" class="Collect"><em></em>收藏</a>
     <a href="#" class="img_link"><img src="/home/products/p_22.jpg"  width="140" height="140"/></a>
     <a href="#" class="name">墨西哥原装进口 科罗娜啤酒</a>
     <h3><b>￥</b>34.00</h3>
       <div class="Detailed">
	   <div class="content">
		  <p class="center"><a href="#" class="Buy_btn">立即购买</a></p>
		  </div>
	   </div>
     </li>
     <li class="product_display">
      <a href="" class="Collect"><em></em>收藏</a>
     <a href="#" class="img_link"><img src="/home/products/p_24.jpg"  width="140" height="140"/></a>
     <a href="#" class="name">墨西哥原装进口 科罗娜啤酒</a>
     <h3><b>￥</b>34.00</h3>
     <div class="Detailed">
	   <div class="content">
		  <p class="center"><a href="#" class="Buy_btn">立即购买</a></p>
		  </div>
	   </div>
     </li>
    </ul>
    </div>
  </div>
  <!--板块名称-->
    <div class="Plate_column Plate_column_right">
    <div class="Plate_name">
    <h2>服饰</h2>
    <div class="Sort_link">
        <a href="#" class="name">女鞋</a>
        <a href="#" class="name">男鞋</a>
        <a href="#" class="name">男短袖</a>
        <a href="#" class="name">女短袖</a>
        <a href="#" class="name">裙子</a>
        <a href="#" class="name">裤子</a>
    </div>
    <a href="#" class="Plate_link"> <img src="/home/images/bk_img_14.png" /></a>
   
    </div>
    <div class="Plate_product">
    <ul id="lists">
    @foreach($fuzhuang as $k=>$v)
        <li class="product_display">
        <a href="/home/cang/{{$v->id}}" class="Collect"><em></em>收藏</a>
        <a href="/home/detail/{{$v->id}}" class="img_link"><img src="{{\Config('app.gpic')}}{{$v->gpic}}"  width="140" height="140"/></a>
        <a href="/home/detail/{{$v->id}}" class="name">{{$v->gname}}</a>
        <h3><b>￥</b>{{$v->price}}</h3>
        <div class="Detailed">
        <div class="content">
            <p class="center"><a href="#" class="Buy_btn">立即购买</a></p>
            </div>
        </div>
        </li>
    @endforeach
    </ul>
    </div>
  </div>
 </div>
@endsection
