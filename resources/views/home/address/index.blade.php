@extends('home/after/index')

 @section('content')
 <!--右侧样式属性-->
 <div class="right_style">
 <!--地址管理-->
  <div class="user_address_style">
    <div class="title_style"><em></em>地址管理</div> 
   <div class="add_address">
    <span class="name">添加送货地址</span>
    <form action="/home/address" method="post">
    {{ csrf_field() }}
    <table cellpadding="0" cellspacing="0" width="100%">
     <tr><td class="label_name">收&nbsp;货&nbsp;&nbsp;人：</td><td><input name="address_user" autocomplete=”off” type="text"  class="add_text" style=" width:100px"/></td></tr>
     <tr><td class="label_name">手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</td><td><input  autocomplete=”off” name="address_tel" type="text" class="add_text" style=" width:200px"/>&nbsp;&nbsp;</td></tr>     
     <tr>
     <td class="label_name">选择城市：</td>
     <td>
        <div id="province"></div>
        <script type="text/javascript">
            /*调用插件*/
            $(function(){
                $("#province").ProvinceCity();
            });
        </script>
     </td>
     </tr>
     <tr><td class="label_name">详细地址：</td><td><textarea name="detail" cols="" rows="" style=" width:500px; height:100px; margin:5px 0px"></textarea><i></i></td></tr>
    <tr><td colspan="2" class="center"><input type="submit" value="保存"  class="add_dzbtn"/><input name="" type="reset" value="清空" class="reset_btn"/></td></tr>    
    </table>
    </form>
   </div>
   <!--用户地址-->
   <div class="address_content">
    <div class="address_prompt">以添加了 {{count($user_addr)}} 条地址，最多保存添加 5 条地址</div>
    <table cellpadding="0" cellspacing="0" class="user_address" width="100%">
    <thead>
     <tr class="label"><td width="80px;">收货人</td><td width="220px;">详细地址</td><td width="120px;">收货电话</td><td width="80px;">操作</td></tr>
     </thead>
     <tbody>
     @foreach($user_addr as $k=>$v)
      <tr><td>{{$v->address_user}}</td><td>{{$v->address}}</td><td>{{$v->address_tel}}</td><td><a href="/home/modifier/{{$v->id}}">修改</a> | <form id="forms" style="display:inline;" action="/home/address/{{$v->id}}" method="post">{{ csrf_field() }}{{ method_field('DELETE') }}<button class="btn_del" style="border:0px;cursor:pointer;background:#fff;">删除</button></form></td></tr>
    @endforeach
     </tbody>
    </table>
   </div>  
  </div>
 </div>
 </div>
 </div>
 <div id="success" style="display:none;">{{session('success')}}</div>
 <div id="error" style="display:none;">{{session('error')}}</div>
 <div id="errs" style="display:none;">{{session('errs')}}</div>
    <script>
        $(document).ready(function(){
            $('.moren_dz input').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
            });
        });
        var text = $("#success").text();
        var err = $("#error").text();
        var errs = $("#errs").text();
        if(text){
            layer.open({
                title: '成功提示...',
                icon: 1,
                content: text,
                closeBtn: 2,
            });
        }
        if(err){
            layer.open({
                title: '添加失败...',
                icon: 2,
                content: err,
                closeBtn: 2,
            });
        }
        if(errs){
            layer.open({
                title: '添加失败...',
                icon: 2,
                content: '最多添加五条收货地址...',
                closeBtn: 2,
            });
        }
        $('.btn_del').click(function(){
            layer.open({
                title: '删除操作...',
                icon: 3,
                closeBtn: 2,
                content: '你确定删除吗?',
                btn: ['确定','取消'],
                yes:function(index){
                    $('#forms').submit();
                    layer.close(index);
                },
            });
            return false;
        });
    </script>

@endsection

@section('links')

@endsection