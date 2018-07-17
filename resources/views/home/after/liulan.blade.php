@extends('home.after.index')
@section('title',$title)
@section('content')
 
 <!--分销店铺详细-->
   <div class="right_style">
  <div class="title_style"><em></em>分销与佣金详情</div> 
  <div class="fenxiao_detailed_style">
   <!--分销店铺信息--> 
     <script type="text/javascript">
         //弹出一个iframe层
$('#shopBill_btn').on('click', function(){
    layer.open({
        type: 2,
        title: '提现记录',
        maxmin: true,
        shadeClose: true, //点击遮罩关闭层
        area : ['900px' , '450px'],
        content:'分销管理-提现账单.html'
    });
});</script>
   <div class="list">  
      <div class="Record_style">
       <div class="Pagination_tow">
       
      </div>
        <span>售后记录</span>
        <table width="100%" cellpadding="0" cellspacing="0" class="Record_list">
         <thead><tr class="label_name"><td width="500">订单号</td><td width="150">状态</td><td width="200">申请时间</td></tr></thead>
         <tbody>
             @foreach($data as $k=>$v)
                <tr>
                    <td style="text-align:left">{{$v->orders_id}}</td>
                    <td>
                        @if($v->static==0)
                            正在审核
                        @else
                            审核通过
                        @endif
                    </td> 
                    <td>{{date('Y-m-d H-i-s',$v->create_at)}}</td>
                   
                </tr> 
            @endforeach
         </tbody>
        </table>
         <div class="Pagination_tow">
         <div class="right">
         
      </div>
      </div>
   </div> 
  </div>
  </div>
 </div>
</div>


@endsection