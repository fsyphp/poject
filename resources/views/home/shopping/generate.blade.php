@extends('home/layout/header')
@section('css')
    <link href="/home/css/foot.css" rel="stylesheet"  type="text/css" />
    <link href="/home/css/jiesuanye.css" rel="stylesheet"  type="text/css" />
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/layer.js"></script>
    <style>
        tr td{
            padding:5px;
        }
        .inp{
            width:200px;
            height:18px;
            margin-right:40px;
            /* float:right; */
            padding:5px;
        }
    </style>
@endsection
@section('title','确认提交')

@section('nav')

@endsection

@section('layout')
<div style="height:40px;"></div>
    <div id='order'>
        <span id='o-title'>选择收货地址</span>
        <span id='o-title' style="float:right;"><a href="/home/insert" style="color:blue;">添加收货地址</a></span>
        @foreach($addr as $k=>$v)
         <div style="height:20px;"></div>
		 <div style='clear:both;'></div>
         <div style="padding:5px 0 0 50px;">
         <table>
         <tr>
            <td><input type="radio" name="addr" /></td>
            <td><span user="{{$v->address_user}}" id='o-addrse'>收货人 : {{$v->address_user}}</span></td>
            <td><span adr="{{$v->address}}" id='o-addrse'>收货地址 : {{$v->address}}</span></td>
            <td><span tel="{{$v->address_tel}}" id='o-addrse'>联系电话 : {{$v->address_tel}}</span></td>
            <td><a class="edit" href="/home/addredit/{{$v->id}}/edit/{{$user_id}}" style="color:blue;">修改收货地址</a></td>
         </tr>
         </table>
		 <div id='o-line'></div>
         </div>
        @endforeach  
		 <span id='o-shqd'>送货清单</span>
		 <span id='o-jgsm'><a href="/home/show" style="color:blue;">返回购物车</a></span>
		 <div id='o-content'>
		    <img src="/static/home/images/pstime.png" alt="">		 	
		 	<div id='opcon'>
             @foreach($arr as $k=>$v)
				 	<div class='o-con-d'>
				 		<img style="width:100px;" class='o-pic' src="{{Config('app.gpic').$v->gpic}}" alt="">
				 		<div class='o-m'>
					 		<span class='o-name'>
					 		   {{$v->gname}}
					 		</span>
					 		<span class='o-tui'>7天无理由退货</span>
				 		</div>
				 		<span class='o-price'>￥{{$v->price}}</span><span class='o-cnt'> x{{$gsum[$k]}}</span><span class='o-state'>库存：{{$sk[$k]}}</span>
				 	</div>
				@endforeach
			 	</div>
		 	</div>	
		 	<div style='clear:both;'></div>	 
		 </div>
		 <div id='o-za'>
         <div style="height:20px;"></div>
		 	 <div id='o-zafei1' style="padding-bottom:-40px;">
		 	 	<div class='o-zafei'>￥{{$sum}}.00</div>
		 	 	<div class='o-zafei jifen'>{{$sum}}</div>
		 	 </div>
		 	 <div id='o-zafei2'>
		 	 	<div class='o-zafei'>共 {{$goods_sum}} 件商品，总金额：</div>
		 	 	<div class='o-zafei'>可获取积分：</div>
		 	 </div>
		 	 <div style='clear:both;'></div>
		 </div>
		 <div id='o-end'>
		 	<div id='o-end1'><span>应付总额：</span> <b>￥{{$sum}}.00</b></div>
            <input type="text" placeholder="买家留言..." class="inp"/>
		 	<div id='o-end2'><span class="adr_user"></span>&nbsp;&nbsp;<span class="adr">&nbsp;&nbsp;</span></span>&nbsp;&nbsp;<span class="adr_tel"></div>
		 </div>
		 <div style="float:right;margin-right:180px;padding-top:20px;">
            <a class='btn btn-info quxiao' style="margin-right:20px;" href="">取消</a>
		 	<a class='btn btn-info' gsum = "{{$goods_sum}}" sum="{{$sum}}" href="/home/create">提交订单</a>
		 </div>
         <div style="clear:both;"></div>
         <div id="success" style="display:none;">{{session('success')}}</div>
		<div id="erro" style="display:none;">{{session('erro')}}</div>
         <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var text = $('#success').text();
        if(text){
            layer.msg(text,{
                icon: 6,
                time: 3000,
                area: '100px',
            })
        }

        var text = $('#erro').text();
        if(text){
            layer.msg(text,{
                icon: 5,
                time: 3000,
                area: '230px',
            })
        }
        // 修改收货地址
        /* $('.edit').click(function(){
            // 用户id
            var id = $('#user').text();
            // 收货地址
            var lishi = $(this).parents('tr').find('td').eq(2).text().split(':');
            var address = lishi[1];
            $.get('/home/address/'+id+'/edit',{address:address},function(data){
                console.log(data.address);
            });
            return false;
        }); */
        
        //取消订单
        $('.quxiao').click(function(){
            layer.open({
                title: '取消操作...',
                content: '确认取消订单吗?',
                icon: 3,
                closeBtn: 2,
                offset: '150px',
                btn: ['确定','取消'],
                yes: function(index){
                    // 商品总数
                    var gsum = $('.btn').eq(1).attr('gsum');
                    $.post('/home/nocreate',{gsum:gsum},function(data){
                        if(data == '0'){
                            location.href = '/';
                        }
                    });
                     layer.close(index);
                },    
            });
            return false;
        }); 

        $('.btn').eq(1).click(function(){
            // 商品总数
            var gsum = $(this).attr('gsum');
            // 总金额
            var sum = $(this).attr('sum');
            // 收货人
            var adr_user = $('.adr_user').text().split(':');
            var user = adr_user[1];
            // 买家留言
            var val = $('.inp').val();
            // 联系电话
            var adr_tel = $('.adr_tel').text().split(':');
            var tel = adr_tel[1];
            // 收货地址
            var adr = $('.adr').text().split(':');
            var adr = adr[1];
            // 购买积分
            var jf = $('.jifen').text();
            $.post('/home/orders',{sum:gsum,total:sum,user:user,tel:tel,adr:adr,msg:val,jf:jf},function(data){
                console.log(data);
                if(data == '0'){ 
                    layer.open({
                        title: '错误提示...',
                        content: '请选择收货地址...',
                        icon: 2,
                        closeBtn: 2,
                    });
                } else if(data == '1'){
                    location.href = '/home/succes';
                } else if(data == '2'){
                     layer.open({
                        title: '错误提示...',
                        content: '订单生成失败...',
                        icon: 2,
                        closeBtn: 2,
                    });
                } else if(data == '3'){
                    layer.open({
                        title: '错误提示...',
                        content: '余额不足...',
                        icon: 2,
                        closeBtn: 2,
                    });
                }
            });
            return false;
        });
        $(function(){

            $(':radio').click(function(){
                // 收货人
                var user = $(this).parents('tr').find('td').eq(1).text();
                // 收货地址
                var addr = $(this).parents('tr').find('td').eq(2).text();
                // 联系电话
                var tel = $(this).parents('tr').find('td').eq(3).text();

                $('.adr').text(addr);
                $('.adr_user').text(user);
                $('.adr_tel').text(tel);
            });
        });
         </script>
@endsection

@section('links')

@endsection

