@extends('admin.layout.header')
@section('layout')

<div class="shi"></div>
<div class="container">
    <div class="row">
        <form class="form-inline" action="/admin/integral" method="get">
        <div class="form-group">
            <label for="exampleInputName2">商品名称</label>
            <input type="text" class="form-control" value="{{$title}}" name="title" placeholder="商品名称">
        </div>
         <button type="submit" class="btn btn-default pull-right" style="margin-right:65px;">搜索</button>
        <div class="form-group pull-right">
            <label for="exampleInputEmail2">所需积分</label>
            <input type="text" class="form-control" name="price" value="{{$price}}" placeholder="所需积分">
        </div>
        </form>
    </div>
</div>

<div class="sanshi"></div>
<div class="container">
    <div class="row col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>商品名称</th>
                <th>所需积分</th>
                <th>商品图片</th>
                <th>商品介绍</th>
                <th>库存</th>
                <th>已兑换</th>
                <th>状态</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            @foreach($integral as $k=>$v)
            <tr>
                <td>{{$v->id}}</td>
                <td class="title">{{$v->title}}</td>
                <td>{{$v->price}}</td>
                <td><img src="{{$v->img}}" width="70" /></td>
                <td>{{$v->desc}}</td>
                <td>{{$v->stock}}</td>
                <td>{{$v->salecent}}</td>
                <td>
                @if( $v->static == 0 )
                    新品
                @elseif( $v->static ==1 )
                    上架
                @else
                    下架
                @endif
                </td>
                <td>{{date('Y-m-d',$v->create_at)}}</td>
                <td>
                    <a class="btn btn-info" href="/admin/integral/{{$v->id}}/edit">修改</a>
                    <form id="form" action="/admin/integral/{{$v->id}}" method="post" style="display:inline;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger sc">删除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div style="margin-top:-25px;text-align:center;">
            {{ $integral -> appends(['title'=>$title,'price'=>$price]) -> links() }}
        </div>
    </div>
</div>
<div id="div" style="display:none;">{{session('success')}}</div>

<div id="div1" style="display:none;">{{session('error')}}</div>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$('.title').dblclick(function(){
    var title = $(this).text().trim();
    var int = $('<input type="text" />');
    $(this).empty();
    $(this).append(int);
    int.val(title);
    int.focus();
    int.select();
    var td = $(this);
    int.blur(function(){
        //获得修改后的名称
        var new_title = $(this).val();
        //获取 id 
        var id = td.parents('tr').find('td').eq(0).text();
        $.post('/admin/title',{id:id,name:new_title},function(data){
            if(data == 1){
                layer.msg('修改成功!',{
                    icon: 6,
                    time: 3000,
                    anim: 6,
                    area: '80px',
                });
                td.text(new_title);
            } else {
                layer.msg('修改失败!',{
                    icon: 5,
                    time: 3000,
                    anim: 6,
                    area: '80px',
                });
                td.text(title);
            }
        });
    });
});

$('.sc').click(function(){
    layer.open({
        title: '删除提示',
        icon: 3,
        content: '你确定要删除吗?',
        anim: 6,
        closeBtn: 2,
        btn: ['确定','取消'],
        yes:function(){
            $('#form').submit();
        },
    });
    return false;
});


if( $('#div').text() !='' ){
    layer.msg(' '+ ' ' +$('#div').text(),{
        icon: 6,
        time: 3000,
        anim: 6,
        area: '80px',
    });
}

if( $('#div1').text() !='' ){
    layer.msg( ' '+ ' ' +$('#div1').text(),{
        icon: 5,
        time: 3000,
        anim: 6,
        area: ['80px','66px'],
    });
}
</script>

@endsection