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
        
        @foreach($chou as $k=>$v)
        <tbody>
            <tr class="Order_info">
                <td colspan="6" class="Order_form_time">
                    下单时间：{{date('Y-m-d',$v->orders_at)}} | 订单号 : {{$v->number}}
                    <em>
                    </em>
                </td>
            </tr>
            <tr class="Order_Details">
                <td colspan="3">
                    <table class="Order_product_style">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product_name clearfix">
                                        <a href="#" class="product_img">
                                            <img src="{{$v->lot->img}}" width="80px" height="80px">
                                        </a>
                                    
                                        <a href="3" class="p_name">
                                            {{$v->lot->title}}
                                        </a>
                                        <p class="specification">
                                           数量 : 1
                                        </p>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                0
                                </td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                
                <td class="split_line">
                    <p style="color:#F30">
                    @if($v->static=='0')
                        未发货
                    @elseif($v->static=='1')
                        待收货
                    @elseif($v->static=='2')
                        <a class="btn btn-info" href="#">
                            去评价
                        </a>
                    @else
                        异常
                    @endif
                    </p>
                </td>
                <td class="operating">
                    <a href="#">
                        联系客服
                    </a>
                    @if($v->static=='1')
                        <a class="btn btns" lid="{{$v->id}}" style="width:60px;height:25px;line-height:25px;margin-left:30px;" href="#">
                            确认收货
                        </a>
                        @elseif($v->static=='2')
                            <a class="btn" lid="{{$v->id}}" style="width:60px;height:25px;line-height:25px;margin-left:30px;" href="">删除</a>
                    @endif
                </td>
            </tr>
            
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
    $('.btn').eq(1).click(function(){
        var tr = $(this).parents('tr');
        var trs = tr.prev();
        var gid = $(this).attr('lid');
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
    $('.btns').click(function(){
        var id = $(this).attr('lid');
        var dom = $(this);
        $.post('/home/lotfa',{id:id},function(data){
            if(data=='00'){
                location.reload(true);
            }
        });
        return false;
    });
</script>

@endsection