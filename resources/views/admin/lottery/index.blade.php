@extends('admin.layout.header')
@section('layout')

<div class="shi"></div>
<div class="container">
    <div class="row">
        <form class="form-inline pull-right" action="/admin/lottery" method="get">
        <div class="form-group">
            <label for="exampleInputName2">奖品名称</label>
            <input type="text" class="form-control" value="{{$title}}" name="title" placeholder="奖品名称">
        </div>
         <button type="submit" class="btn btn-default" style="margin-right:65px;">搜索</button>
        <!-- <div class="form-group pull-right">
            <label for="exampleInputEmail2">所需积分</label>
            <input type="text" class="form-control" name="price" placeholder="所需积分">
        </div> -->
        </form>
    </div>
</div>

<div class="sanshi"></div>
<div class="container">
    <div class="row col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>奖品名称</th>
                <th>奖品图片</th>
                <th>奖品介绍</th>
                <th>库存</th>
                <th>已送出</th>
                <th>状态</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            @foreach($lottery as $k=>$v)
            <tr>
                <td>{{$v->id}}</td>
                <td class="title">{{$v->title}}</td>
                <td><img src="{{$v->img}}" width="70" /></td>
                <td>{{$v->desc}}</td>
                <td>{{$v->stock}}</td>
                <td>{{$v->salecent}}</td>
                <td class="stock">
                @if( $v->static == '0' )
                    上架
                @elseif( $v->static == '1' )
                    下架
                @endif
                </td>
                <td>{{date('Y-m-d',$v->create_at)}}</td>
                <td>
                    <a class="btn btn-info" href="/admin/lottery/{{$v->id}}/edit">修改</a>
                    <form id="form" action="/admin/lottery/{{$v->id}}" method="post" style="display:inline;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger sc">删除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div style="margin-top:-25px;text-align:center;">
            {{ $lottery -> appends($title) -> links() }}
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
        $('.stock').css('cursor','pointer');
        $('.stock').click(function(){
        var td = $(this);
        var id = td.parents('tr').find('td').eq(0).text();
        $.post('/admin/static',{id:id},function(data){
            console.log(data);
            if(data == '1'){
                td.text('上架');
            } else if(data == '0') {
                td.text('下架');
            }
        });
    });

//修改
/* $('.edit').click(function(){
    var id = $(this).parents('tr').find('td').eq(0).text();
    layer.open({
        type: 2,
        title: '修改操作',
        content: ['/admin/lottery/'+id+'/edit','no'],
        area: ['500px','600px'],
        closeBtn: 2,
        scrollbar: false,
    });
    return false;
}); */

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