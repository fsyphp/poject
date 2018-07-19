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
                    待付款(元)
                </td>
                <td class="list_name_title5">
                    订单状态
                </td>
                <td class="list_name_title6">
                    操作
                </td>
            </tr>
        </thead>
        
        @foreach($no as $k=>$v)
        <tbody>
            <tr class="Order_info">
                <td colspan="6" class="Order_form_time">
                    下单时间：{{date('Y-m-d',$v->create_at)}} | 订单号 : 未生成
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
                                            <img src="{{Config('app.gpic').$v->nogoods->gpic}}" width="80px" height="80px">
                                        </a>
                                    
                                        <a href="3" class="p_name">
                                            {{$v->nogoods->gname}}
                                        </a>
                                        <p class="specification">
                                           
                                        </p>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                {{$v->nogoods->price}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="split_line">

                    <p style="color:#F30">
                        <a class="btn btn-info" href="/home/detail/{{$v->nogoods->id}}">
                            去购买
                        </a>
                    </p>
                </td>
                <td class="operating">
                    <a href="#">
                        联系客服
                    </a>
                    <a class="delss" gid="{{$v->id}}" href="#">
                        删除
                    </a>
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
    $('.delss').click(function(){
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
                $.post('/home/shanc',{id:gid},function(data){
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