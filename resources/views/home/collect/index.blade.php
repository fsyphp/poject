@extends('home.layout.header')
@extends('home.after.index')
@section('title',$title)
@section('content') 
    <script src="/js/layer.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="right_style">
  <div class="title_style"><em></em>我的收藏</div> 
  <div class="Favorites_slideTxtBox">
     <div class="hd"><ul><li>收藏的商品</li></ul></div>
     <div class="bd">
        <ul class="commodity_list clearfix">

         <div class="Number_Favorites">共收藏：{{count($data)}}条</div>
         <div class="clearfix">

        @foreach($data as $k=>$v)
		
          <li class="collect_p" id="li_{{$v->id}}">
	         <em class="iconfont  delete" gid="{{$v->id}}"></em>
	         <a href="/home/detail/{{$v->coll['id']}}" class="buy_btn">查看详情</a>
	       <div class="collect_info">
	        <div class="img_link"> <a href="#" class="center "><img src="{{\Config('app.gpic')}}{{$v->coll['gpic']}}" name="gpic"></a>

	        </div>
	        <dl class="xinxi">
	         <dt><a href="#" class="name" name="gname">{{$v->coll['gname']}}</a></dt>
	         <dd><span class="Price" name="price"><b>￥</b>{{$v->coll['price']}}</span></dd>         
	        </dl>
	        </div>

       </li>
        @endforeach
        

       </div>
       <div class="Paging">
    <div class="Pagination">
    	{!!$data!!} 
     </div>
    <style>
     .Pagination ul li{
         float:left;
     }
 </style>
    </div>
        </ul>
        
     </div>
   </div>
   <script>jQuery(".Favorites_slideTxtBox").slide({trigger:"click"});</script>
  </div>
 </div>

 <div class="dataTables_paginate paging_full_numbers" id="paginate">

   
</div>

		<script>
				$('.delete').click(function(){
					var id=$(this).attr('gid');
						if(confirm("确认删除吗?")==true){
                                $.ajax({
                                    url:'/home/collect/delete',
                                    type:'get',
                                    dataType:'json',
                                    data:{'id':id},
                                    success:function(mes){ 
                                        if(mes==0){ 
                                        	error('删除成功');
                                        	$('#li_'+id).remove();
                                        }else{
                                        	error('删除失败'); 
                                        }
                                    },
                                    error:function(err){
                                        console.log(err);
                                    },
                                    // timeout:3000,
                                    async:true
                                });
                            }  
                             function error(text){
						        layer.open({
						            title: '错误提示!',
						            content: text,
						            icon: 2,
						            offset: '55px',
						            closeBtn: 2,
						        });
   					 		}
				});
		</script>
@endsection
