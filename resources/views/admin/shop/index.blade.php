@extends('admin.layout.header');
@section('layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-sm-12" id="divs">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>店铺浏览</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_basic.html#">选项1</a>
                                </li>
                                <li><a href="table_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>店铺名称</th>
                                    <th>店铺地址</th>
                                    <th>店铺图像</th>
                                    <th>服务电话</th>
                                    <th>操作</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shop as $k=>$v)
                                <tr id="tr_{{$v->id}}">
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->shop_name}}</td>
                                    <td>{{$v->address}}</td>
                                    <td width="300px"><img src="{{\Config('app.gpic')}}{{$v->shop_pic}}" alt="" width="20%" ></td>
                                    <td>{{$v->tel}}</td>
                                    <td>
                                    <a href="#" class="btn btn-outline btn-danger lin" value="{{$v->id}}">删除</a>
                                        <a href="/admin/shop/{{$v->id}}/edit" class="btn btn-outline btn-info">修改</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <div class="col-sm-6 col-md-offset-10">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                
                                <li class="paginate_button active" aria-controls="DataTables_Table_0" tabindex="0">
                                   {!!$shop!!}
                                </li>
                             
                            </ul></div></div>
                    </div>
                </div>
            </div>
            <script>
                     // 删除
                     $('.lin').click(function(){
                            var id=$(this).attr('value'); 
                            if(confirm("确认删除吗?")==true){
                                $.ajax({
                                    url:'/admin/shop/'+id,
                                    type:'DELETE',
                                    dataType:'json',
                                    data:{
                                        '_token' : $('meta[name="csrf-token"]').attr('content'),
                                        'id':id
                                    },
                                    success:function(mes){ 
                                        console.log(mes);
                                        if(mes==00){
                                            var info= $('<div id="info" class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>删除成功</div>');
                                            $("#divs").before(info);
                                            $('input[name=title]').val('');
                                            $('#tr_'+id).remove();
                                        }else{
                                            var err= $('<div id="info" class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>删除失败</div>');
                                            $("#divs").before(err);
                                        }
                                    },
                                    error:function(err){
                                        console.log(err);
                                    },
                                    timeout:3000,
                                    async:true
                                });
                            }  
                            setTimeout(function(){
                                $('#info').remove();
                            },3000);  
                    })
            </script>
@endsection