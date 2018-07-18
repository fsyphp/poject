@extends('admin/layout/header')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('layout')
<div style="height:26px;"></div>
    <div class=".container">
        <div class="row col-md-12">
            <h2 style="text-align:center;">抽奖和兑换商品管理</h2>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th>订单编号</th>
                    <th>总金额</th>
                    <th>下单时间</th>
                    <th>收货人</th>
                    <th>收货电话</th>
                    <th>收货地址</th>
                    <th>买家留言</th>
                    <th>类别</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                @foreach($lot as $k=>$v)
                    <tr>
                        <td>{{$v->number}}</td>
                        <td>{{$v->total}}</td>
                        <td>{{date('Y-m-d',$v->orders_at)}}</td>
                        <td>{{$v->address_user}}</td>
                        <td>{{$v->orders_tel}}</td>
                        <td>{{$v->address}}</td>
                        <td>{{$v->orders_msg}}</td>
                        <td>
                            @if($v->deliver=='0')
                                兑换商品
                            @elseif($v->deliver=='1')
                                抽奖商品
                            @else
                                未知商品
                            @endif
                        </td>
                        <td class="huo">
                        @if($v->static==0)
                            尚未发货
                        @elseif($v->static==1)
                            等待收货
                        @elseif($v->static==2)
                            交易完成
                        @else
                            未知异常
                        @endif
                        </td>
                        <td>
                            <a class="btn btn-info btn-xs" href="/admin/lotDraw/{{$v->id}}/edit">修改</a>
                            <a class="btn btn-info btn-xs" href="/admin/lotDetail/{{$v->id}}">订单详情</a>
                            <a oid = {{$v->id}} class="btn fh btn-info btn-xs" href="">
                            @if($v->static==0)
                                发货
                            @elseif($v->static==1)
                                已发货
                            @elseif($v->static==2)
                                已收货
                            @else
                                异常
                            @endif
                            </a>
                            <form id="form" action="/admin/lotDraw/{{$v->id}}" method="post" style="display:inline;">
                                {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 @if(($v->static==2))
                                    <button class="btn btn-info remove btn-xs">删除</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.fh').click(function(){
            var id = $(this).attr('oid');
            var text = $(this);
            $.post('/admin/fahuo',{id:id},function(data){
                if(data == '0'){
                    text.text('已发货');
                    text.parents('tr').find('td').eq(8).text('等待收货');
                }
            });
            return false;
        });

        // 删除提示
        $('.remove').click(function(){
            layer.open({
                title: '删除操作',
                content: '确认删除吗?',
                btn: ['确认','取消'],
                yes:function(index){
                    $('#form').submit();
                     layer.close(index);
                },
                closeBtn: 2,
                icon: 3,
            });
            return false;
        });
    </script>
@endsection