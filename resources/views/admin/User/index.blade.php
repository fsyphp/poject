@extends('admin.layout.header')
@section('layout')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="container">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>头像</th>
                    <th>积分☆</th>
                    <th>性别</th>
                    <th>电话</th>
                    <th>邮箱</th>
                    <th>余额￥</th>
                    <th>添加时间</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
                @foreach ($user as $k=>$v)
                <tr class='zong' id="tr_{{$v['id']}}">
                    <td class='yi'>{{ $v['id'] }}</td>
                    <td>{{ $v['uname'] }}</td>
                    <td><img src="{{ $v->user_detail->img }}" alt="" width="100"></td>
                    <td>{{ $v['user_detail']['integral'] }}</td>
                    <td>{{--$v->user_detail['sex']--}}
                        @if($v->user_detail['sex'] == 'w')
                        女
                        @elseif($v->user_detail['sex'] == 'm')
                        男
                        @else($v->user_detail['sex'] == 'x')
                        保密
                        @endif
                    </td>
                    <td>{{ $v['user_detail']['tel'] }}</td>
                    <td>{{$v['email']}}</td>
                    <td>{{ $v['user_detail']['money'] }}</td>
                    <td>{{ $v['create_at'] }}</td>
                    <td> 
                        @if($v['auth'] == 0)
                        超级管理员
                        @elseif($v['auth'] == 1)
                        普通管理员
                        @else($v['auth'] == 2)
                        普通用户
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-success btn-rounded btn-outline xou" href="#">修改</a>
                        {{method_field('DELETE')}}
                        <a class="btn btn-danger btn-rounded btn-outline shan" href="#">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script src="/admin/js/jquery.min.js"></script>
    <script>
    // $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    // var aa = $('#xou').parent('td').siblings('td:first').text();
        $(".xou").click(function(){
            var ids = $(this).parents('tr').find('td').eq(0).text().trim();
            sweetAlert({
                title:"你确定要修改这条信息吗",text:"修改后无法复原！！！",type:"warning",showCancelButton:true,confirmButtonText:"是的，我要修改!",inputPlaceholder:"输入信息",cancelButtonText:"让我再考虑一下…",closeOnConfirm:false,closeOnCancel:false
                },function(isConfirm){
                    if(isConfirm){
                        $(".xou").each(function(){
                            window.location = $('.xou').href = '/admin/user/update?id='+ids;
                        })
                        
                    }else{
                        swal("已取消","","error")
                    }
                }
            );
        });

        // 修改弹窗
        $(".shan").click(function(){
            var tr = $(this);
            var ids = $(this).parents('tr').find('td').eq(0).text().trim();
            // console.log(ids);
            swal({
                title:"您确定要删除这条信息吗",text:"删除后将无法恢复，请谨慎操作！",type:"warning",showCancelButton:true,confirmButtonColor:"#DD6B55",confirmButtonText:"是的，我要删除！",cancelButtonText:"让我再考虑一下…"},
                    function(){
                        $.ajax({
                            url:'/admin/user/delete',
                            data:{'id':ids},
                            type:'DELETE',
                            headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                        }).done(function(data){
                            // console.log(data);
                            swal("操作成功!", "已成功删除数据！", "success");
                            tr.parents('tr').remove();  //  删除已被删除掉的节点
                        }).error(function(data){
                            // console.log(data);
                            swal("OMG", "删除操作失败了!", "error");
                        })
                    }
                )
                });
    </script>
@endsection