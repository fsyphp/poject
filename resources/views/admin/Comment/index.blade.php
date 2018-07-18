@extends('admin.layout.header')
@section('layout')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content">
            <form action="/admin/comment/index" method="">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <div class="row">
                <div class="col-sm-6">
                <label>每页 
                    <select name="num" aria-controls="DataTables_Table_0" class="form-control input-sm">
                        <option value="2" @if($request->num == 2)   selected="selected" @endif>2</option>
                        <option value="3" @if($request->num == 3)   selected="selected" @endif>3</option>
                        <option value="5" @if($request->num == 5)   selected="selected" @endif>5</option>
                        <option value="30" @if($request->num == 30)   selected="selected" @endif>30</option>
                    </select> 条记录
                </label>
                </div>
                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                    <label>商品ID
                        <input type="search" name="g_id" value="" class="form-control input-sm" aria-controls="DataTables_Table_0">
                        <button class="btn btn-info">查询</button>
                    </label>
                </div>
                </div>
                </div>
            </form>
                <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">

                            <thead>
                                <tr role="row">
                                    <th class="" aria-sort="descending" >ID</th>
                                    <th class="">商品ID</th>
                                    <th class="">用户ID</th>
                                    <th class="">评论</th>
                                    <th class="">评价</th>
                                    <th class="">操作</th>
                            </thead>
                            @foreach($comment as $k=>$v)
                            <tbody>
                                <tr class="gradeA odd">
                                    <td class="sorting_1">{{$v->id}}</td>
                                    <td class="">{{$v->g_id}}</td>
                                    <td class=" ">{{$v->user_id}} <b> </b></td>
                                    <td class="center " style="width:500px;">{{$v->content}}</td>
                                    <td class="center ">
                                        @if($v->stars == 1)
                                        ★
                                        @elseif($v->stars == 2)
                                        ★★
                                        @elseif($v->stars == 3)
                                        ★★★
                                        @elseif($v->stars == 4)
                                        ★★★★
                                        @elseif($v->stars == 5)
                                        ★★★★★
                                        @else
                                        啊哦没有星星啦
                                        @endif
                                        【{{$v->stars}}】
                                    </td>
                                    <td class="">
                                        {{method_field('DELETE')}}
                                        <a class="btn btn-danger btn-rounded btn-outline shan" href="#">删除</a>
                                    </td>
                                </tr></tbody>
                            <tfoot>
                            @endforeach
                            </tfoot>
                        </table>
                            <div class="row">
                                <div class="col-sm-8">
                                </div>
                                <div class="col-sm-4">
                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_previous">
                                            </li>
                                            {!! $comment->appends($res)->links() !!}
                                            <li class="paginate_button next" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_next">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
        </div>
    </div>
    <script src="/admin/js/jquery.min.js"></script>
    <script>
        $(".shan").click(function(){
            var tr = $(this);
            var ids = $(this).parents('tr').find('td').eq(0).text().trim();
            // console.log(ids);
            swal({
                title:"您确定要删除这条信息吗",text:"删除后将无法恢复，请谨慎操作！",type:"warning",showCancelButton:true,confirmButtonColor:"#DD6B55",confirmButtonText:"是的，我要删除！",cancelButtonText:"让我再考虑一下…"},
                    function(){
                        $.ajax({
                            url:'/admin/comment/delete',
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