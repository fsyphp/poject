@extends('home/layout/header')
@section('css')
    <style>
        .cart-empty{
            height: 98px;
            padding: 80px 0 120px;
            color: #333;

        }
        .cart-empty .message{
            height: 98px;
            padding-left: 341px;
            background: url(/uploads/no-login-icon.png) 250px 22px no-repeat;
        }
        .cart-empty .message .txt {
            font-size: 14px;
        }
        .cart-empty .message li {
            line-height: 38px;
        }
        ol, ul {
            list-style: outside none none;
        }
        .ftx-05, .ftx05 {
            color: #005ea7;
        }
        a {
            color: #666;
            text-decoration: none;
            font-size:12px;
        }
        dl dt{
            width:200px;
            margin-bottom:10px;
        }
        dl dd{
            width:100px;
            height:0px;
        }
    </style>
    <link rel="stylesheet" href="/shopping/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/shopping/style.css" type="text/css" />
	<link rel="stylesheet" href="/shopping/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="/shopping/css/font-icons.css" type="text/css" />
	<!-- <link rel="stylesheet" href="/shopping/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="/shopping/css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="/shopping/css/responsive.css" type="text/css" /> -->
    <script type="text/javascript" src="/shopping/js/jquery.js"></script>
	<script type="text/javascript" src="/shopping/js/plugins.js"></script>
    <script src="/js/layer.js"></script>
    
@endsection
@section('title','购物车')

@section('nav')

@endsection

@section('layout')
@if($info)
	<div class="content-wrap">
		<div class="container clearfix lamp203">
			<div class="table-responsive bottommargin">
				<table class="table cart">
					<thead>
						<tr>
							<th class="cart-product-remove"><a href="javascript:void(0)" class='as'>全选</a></th>
							<th class="cart-product-thumbnail">商品图片</th>
							<th class="cart-product-name">商品名</th>
							<th class="cart-product-price">价格</th>
							<th class="cart-product-price">规格</th>
							<th class="cart-product-quantity">数量</th>
							<th class="cart-product-subtotal">小计</th>
							<th class="cart-product-subtotal">操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach($goods as $k => $v)
						<tr class="cart_item">
							<td class="cart-product-thumbnail">
								<input gid="{{$v->id}}" size="{{$size[$k]}}" type="checkbox">
							</td>
							<td class="cart-product-thumbnail">
								<a href="#"><img src="{{Config('app.gpic').$v->gpic}}" alt="Pink Printed Dress"></a>
							</td>
							<td class="cart-product-name">
								<a href="#">{{$v->gname}}</a>
							</td>
							<td class="cart-product-price">
								¥<span class="price">{{$v->price}}</span>
							</td>
							<td class="cart-product-price">
								<span class="amount">{{$size[$k]}}</span>
							</td>
							<td class="cart-product-quantity">
								<div class="quantity clearfix">
									<input type="button" value="-" class="minus">
									<input type="text" name="quantity" value="{{$sum[$k]}}" class="qty" />
									<input type="button" value="+" class="plus">
								</div>
							</td>
							<td class="cart-product-subtotal">
								¥<span class="xiaoji">{{$sum[$k]*$v->price}}</span>
							</td>
							<td class="cart-product-remove">
								<a href="javascript:void(0)" class="remove" title="移除物品" ids='{{$v->id}}'><i class="icon-trash2"></i></a>
							</td>
						</tr>
						@endforeach
						<tr class="cart_item">
							<td colspan="9">
								<div class="row clearfix">
									<div class="col-md-12 col-xs-12 nopadding">
										<strong style="margin-right:15px;">总金额</strong>
										¥<span class="total">0</span>.00

										<!-- <strong style="margin-left:30px;">已选商品 <span class="cur">0</spam> 件</strong> -->
										<a href="" class="button bt btn button-3d notopmargin fright">结算</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@else
	<div class="cart-empty" style="height:300px;margin-left:100px;">
		<div class="message">
			<ul>
				<li class="txt">
					购物车空空的哦~，去看看心仪的商品吧~
				</li>
				<li class="mt10" style="margin-top:20px;">
					<a href="/" class="ftx-05 btn btn-info">
						去购物&gt;
					</a>
				</li>
				
			</ul>
		</div>
	</div>
@endif

<script>
    /* var ji = $('.xiaoji').text();
    $('.total').text(ji); */

    $('.bt').click(function(){
		var check = '';
		$(':checked').each(function(){
			check = $(this).attr('checked');
		});
            if(check == ''){
                layer.open({
                title: '错误操作!',
                content: '请选择需要购买的商品',
                icon: 5,
                closeBtn: 2,
                offset: ['100px'],
            });
        } else {
			// 把 相关信息用 ajax 发送给后台 存入 session

			// 商品总价
			var sum = $('.total').text();
			// 商品的id
			var gid = '';
			// 商品总数
			var gsum = '';
			$(':checked').each(function(){
				gid += $(this).attr('gid') + ',';
				//  商品总数
				 gsum += $(this).parents('tr').find('input').eq(2).val()+',';
			});
			$.post('/home/addr',{gid:gid,sum:sum,gsum:gsum},function(data){
				if(data=='0'){
					layer.open({
						type: 2,
						title: '请填写收货地址...',
						content: '/home/address',
						closeBtn: 2,
						offset: ['60px'],
						area: ['400px','400px'],
					}); 
				} else {
					location.href = '/home/generate';
					// console.log(data)
				}
			});  
        } 
        return false;
    });
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	//加法运算
	$('.plus').click(function(){
		//获取数量
		var num = $(this).prev().val();
        num++;
		//加完之后让数量发生改变
		$(this).prev().val(num);
		function accMul(arg1, arg2) {
	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();
	        try { m += s1.split(".")[1].length } catch (e) { }
	        try { m += s2.split(".")[1].length } catch (e) { }
	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
		}
		//获取单价
		var pc = $(this).parents('tr').find('.price').text();
		//加完之后让小计发生改变
		$(this).parents('tr').find('.xiaoji').text(accMul(pc,num));
		totals();
	})
	//减法运算
	$('.minus').click(function(){
		var mins = $(this).next().val();
		mins--;
		if(mins <= 1){
			mins = 1;
        }
		//减完让数量发生改变
		$(this).next().val(mins);
		//减完让小计发生改变
		//获取单价
		var pc = $(this).parents('tr').find('.price').text();
		function accMul(arg1, arg2) {
	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();
	        try { m += s1.split(".")[1].length } catch (e) { }
	        try { m += s2.split(".")[1].length } catch (e) { }
	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
		}
		//加完之后让小计发生改变
		$(this).parents('tr').find('.xiaoji').text(accMul(pc,mins));
		totals();
	})
	//单击多选框让总价发生改变
	$(':checkbox').click(function(){
		totals();
	})
	function totals()
	{
		var sum = 0;
		$(':checkbox:checked').each(function(){
			var pir = parseFloat($(this).parents('tr').find('.xiaoji').text());
			// sum += pir;
			function accAdd(arg1,arg2){  
			    var r1,r2,m;  
			    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
			    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
			    m=Math.pow(10,Math.max(r1,r2))  
			    return (arg1*m+arg2*m)/m  
			}
			$('.total').text(sum = accAdd(sum, pir));
		})
	}
	//全选
	$('.as').click(function(){
		$(':checkbox').each(function(){
			// $(this).attr('checked','checked');
			$(this).attr('checked',true);
		})
		totals();
	})
	//删除
	$('.remove').click(function(){
        var gid = $(this).attr('ids');
        var tr = $(this).parents('tr');
        layer.open({
            title: '删除操作',
            content: '确定删除该商品吗?',
            icon: 3,
            btn: ['确定','取消'],
            yes: function(index){
                $.post('/home/del',{gid:gid},function(data){
                    if(data == '1'){
                        tr.remove();
						if($('.remove').parents('tr').length == 0){
							location.reload(true);
						}
                    }
                });
                layer.close(index);
            },
            closeBtn: 2,
            offset: ['100px'],
        });

		/* var rs = confirm('删除商品?');
		if(!rs) return;
		//获取id
		var id = $(this).attr('ids');
		var ts = $(this);
		//发送ajax
		$.post('/home/ajaxcart',{id:id},function(data){
			if(data != '0'){
				ts.parents('tr').remove();
				$('.total').text('0.0');
				totals();	
			} else {
				$('.lamp203').html(`<div class="cart-empty">
				    <div class="message">
				        <ul>
				            <li class="txt">
				                购物车空空的哦~，去看看心仪的商品吧~
				            </li>
				            <li class="mt10">
				                <a href="/home/index" class="ftx-05">
				                    去购物&gt;
				                </a>
				            </li>  
				        </ul>
				    </div>
				</div>`);
			}
		}) */
	})
</script>
@endsection

@section('links')

@endsection