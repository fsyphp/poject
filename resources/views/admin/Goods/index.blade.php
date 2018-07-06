@extends('admin.layout.header');
@section('layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-sm-12" id="divs">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>基本 <small>分类，查找</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_data_tables.html#">选项1</a>
                                </li>
                                <li><a href="table_data_tables.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content"  >
                    <form action="/admin/goods" method="get"  class="form-horizontal m-t" id="signupForm">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>每页 
                            <select name="num" aria-controls="DataTables_Table_0" class="form-control input-sm">
                                <option value="10" @if($request->num==10) selected @endif>10</option>
                                <option value="15" @if($request->num==15) selected @endif>15</option>
                                <option value="20" @if($request->num==20) selected @endif>20</option>
                            </select> 条记录</label>
                        </div>
                        </div>
                        <div class="col-sm-6"><div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label>商品名称：<input type="search" name="gname" value="{{$request->gname}}" class="form-control input-sm" aria-controls="DataTables_Table_0">
                            <label>价格：<input type="search" name="price" value="{{$request->price}}" class="form-control input-sm" aria-controls="DataTables_Table_0">

                                    <button class="btn btn-outline btn-info">查找</button>
                            </label>
                        </div>
                        </div>
                        </div>
                    </form>
                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="渲染引擎：激活排序列升序" style="width: 80px;">ID</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width: 130px;">商品名称</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="浏览器：激活排序列升序" style="width:130px;">商品类别</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="引擎版本：激活排序列升序" style="width: 130px;">价格</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="平台：激活排序列升序" style="width: 130px;">主图</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="引擎版本：激活排序列升序" style="width: 130px;">商品主图</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="引擎版本：激活排序列升序" style="width: 130px;">状态</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="引擎版本：激活排序列升序" style="width: 130px;">状态操作</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="引擎版本：激活排序列升序" style="width: 130px;">商品规格</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="引擎版本：激活排序列升序" style="width: 130px;">库存</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="引擎版本：激活排序列升序" style="width: 130px;">销量</th> 

                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="引擎版本：激活排序列升序" style="width: 100px;">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $k=>$v)
                                    <tr class="gradeA odd" id="tr_{{$v->id}}"> 
                                            <td class="sorting_1">{{$v->id}}</td> 
                                            <td class="sorting_1">{{$v->gname}}</td>
                                            <td >{{App\Model\Goods::cates($v->category_id)}}</td>
                                            <td>{{$v->price}}</td> 
                                            <td class=" " width="100px"><img src="{{\Config('app.gpic')}}{{$v->gpic}}" alt="" width="100%"></td>
                                        <!-- 商品详情图 -->
                                            <td width="200px"> 
                                                    @foreach(explode(',',$v->detail->manypic) as $kk=>$vv)
                                                            <img src="{{\Config('app.gpic')}}{{$vv}}" alt="" width="20%">
                                                    @endforeach 
                                            </td>
                                            <td class="xj_{{$v->id}}">
                                                   {{App\Model\Goods::status($v->g_static)}} 
                                            </td>
                                        <!-- 判断上下架 -->
                                            <td> 
                                                @if($v->g_static==3)
                                                            <a href="/admin/goods/xj?id={{$v->id}}" static="{{$v->g_static}}" gid="{{$v->id}}" class="sh  btn btn-outline btn-info">上架</a>
                                                @elseif($v->g_static==2 || $v->g_static==1)
                                                            <a href="/admin/goods/xj?id={{$v->id}}" static="{{$v->g_static}}" gid="{{$v->id}}" class="sh  btn btn-outline btn-info">下架</a>
                                                @endif</td>
                                           
                                            <td width="200px">
                                        <!-- 商品规格 -->
                                                @foreach(explode(',',$v->detail->gram) as $ks=>$vs)
                                                        @if($vs==0)
                                                            500g
                                                        @elseif($vs==1)
                                                            1000g
                                                        @else
                                                            500g
                                                        @endif
                                                @endforeach
                                            </td>
                                            <td>{{$v->detail->stock}}</td>
                                            <td>{{$v->detail->number}}</td> 
                                            <td class="center "> 
                                                <a href="/admin/goods/{{$v->id}}/edit" class="btn btn-outline btn-info">修改</a>
                                            </form>
                                                <a href="#" class="btn btn-outline btn-danger lin" value="{{$v->id}}">删除</a>
                                            </td>

                                        </tr> 
                                @endforeach
                            </tbody>
                            
                          
                            
                        </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">每页显示{{$request->num}}条
                                        
                                    </div>
                                </div>
                            <div class="col-sm-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                
                                <li class="paginate_button active" aria-controls="DataTables_Table_0" tabindex="0">
                                   {!!$data!!}
                                </li>
                             
                            </ul></div></div></div></div>

                    </div>
                </div>
                
            </div>
            <script> 
                    $('.sh').click(function(){
                        var id=$(this).attr('gid');
                        var g_static=$(this).attr('static');
                        var ths=$(this);
                        $.ajax({
                            url:'/admin/goods/sj?id='+id,
                            type:'get',
                            dataType:'json',
                            data:{},
                            success:function(mes){ 
                                console.log(mes['static']);
                                if(mes['mes']==1){
                                    if(mes['static']==3){
                                        ths.text('上架');

                                        $('.xj_'+id).text('已下架')
                                    }else{
                                        ths.text('下架');

                                        $('.xj_'+id).text('在售');

                                        
                                    }
                                    
                                }else{
                                    alert('操作失败');
                                }
                            },
                            error:function(err){
                                console.log(err);
                            },
                            anysc:true
                        })
                        return false;
                    })
                    // 删除
                    $('.lin').click(function(){
                            var id=$(this).attr('value'); 
                            if(confirm("确认删除吗?")==true){
                                $.ajax({
                                    url:'/admin/goods/'+id,
                                    type:'DELETE',
                                    dataType:'json',
                                    data:{
                                        '_token' : $('meta[name="csrf-token"]').attr('content'),
                                        'id':id
                                    },
                                    success:function(mes){ 
                                        if(mes==00){
                                            var info= $('<div id="info" class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>删除成功</div>');
                                            $("#divs").before(info);
                                            $('input[name=title]').val('');
                                            $('#tr_'+id).remove();
                                        }else{
                                            var err= $('<div id="info" class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>删除失败有子类</div>');
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