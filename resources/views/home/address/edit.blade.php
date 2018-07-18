@extends('home/after/index')

 @section('content')
  <div class="user_address_style">
    <div class="title_style"><em></em>地址管理</div> 
   <div class="add_address">
    <span class="name">添加送货地址</span>
    <form action="/home/addressupdate" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$user_address->id}}">
    <table cellpadding="0" cellspacing="0" width="100%">
     <tr><td class="label_name">收&nbsp;货&nbsp;&nbsp;人：</td><td><input name="address_user" autocomplete=”off” value="{{$user_address->address_user}}" type="text"  class="add_text" style=" width:100px"/></td></tr>
     <tr><td class="label_name">手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</td><td><input  autocomplete=”off” value="{{$user_address->address_tel}}" name="address_tel" type="text" class="add_text" style=" width:200px"/>&nbsp;&nbsp;</td></tr>     
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
     <tr><td class="label_name">详细地址：</td><td><textarea name="detail" cols="" rows="" style=" width:500px; height:100px; margin:5px 0px">{{$addr}}</textarea><i></i></td></tr>
    <tr><td colspan="2" class="center"><input type="submit" value="修改"  class="add_dzbtn"/><input name="" type="reset" value="清空" class="reset_btn"/></td></tr>    
    </table>
    </form>
   </div>  
  </div>
 </div>
 </div>
 </div>
 <div id="error" style="display:none;">{{session('error')}}</div>
    <script>
        $(document).ready(function(){
            $('.moren_dz input').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
            });
        });
        var err = $('#error').text();
        if(err){
            layer.open({
                title: '修改失败...',
                icon: 2,
                content: err,
            });
        }
    </script>
@endsection

@section('links')

@endsection