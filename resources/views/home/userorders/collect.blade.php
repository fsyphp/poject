@extends('home/userorders/index')

@section('orders')

<div class="Order_form_list">
    <table>
        <thead>
            <tr>
                <td class="list_name_title3">
                    商品
                </td>
                <td class="list_name_title2">
                    单价(元)
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
        
        @foreach($coll as $k=>$v)
        <tbody>
            <tr class="Order_info">
                <td colspan="6" class="Order_form_time">
                    下单时间：{{date('Y-m-d',$v['orders_at'])}} | 订单号 : {{$v['number']}}
                    <em>
                    </em>
                </td>
            </tr>
            @foreach($v['orders_detail'] as $j=>$y)
            <tr class="Order_Details">
                <td colspan="3">
                    <table class="Order_product_style">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product_name clearfix">
                                        <a href="#" class="product_img">
                                            <img src="{{Config('app.gpic').$y['goods_orders']['gpic']}}" width="80px" height="80px">
                                        </a>
                                    
                                        <a href="3" class="p_name">
                                            {{$y['goods_orders']['gname']}}
                                        </a>
                                        <p class="specification">
                                           数量 : {{$y['cnt']}}
                                        </p>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                {{$y['price']}}
                                </td>
                                <td>{{$y['price']*$y['cnt']}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                
                <td class="split_line">
                    <p style="color:#F30">
                        等待收货
                    </p>
                </td>
                <td class="operating">
                    <a href="#">
                        联系客服
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        @endforeach
    </table>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.del').click(function(){
        var tr = $(this).parents('tr');
        var trs = tr.prev();
        var gid = $(this).attr('gid');
        layer.open({
            title: '删除操作...',
            content: '你确定要删除吗?',
            icon: 3,
            closeBtn: 2,
            btn: ['确定','取消'],
            yes:function(index){
                $.post('/home/del',{id:gid},function(data){
                    if(data == '00' ){
                        tr.remove();
                        trs.remove();
                       layer.msg('删除成功...',{time:3000});
                    }
                });
                layer.close(index);
            },
        });
        return false;
    });
</script>

@endsection