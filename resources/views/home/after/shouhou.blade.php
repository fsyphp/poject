
@extends('home.after.index')
@section('title',$title);
@section('content')
<div class="user_address_style">
    <div class="title_style"><em></em>申请售后</div> 
   <div class="add_address">
    <span class="name">申请售后</span>
    <table cellpadding="0" cellspacing="0" width="100%">
            <form action="/home/after/after" method="post">
            {{csrf_field()}}
                    <tbody>
                        <tr>
                            <td class="label_name" style="width:100px">订单单号：</td><td><input name="orders_id" value="{{old('orders_id')}}" type="number" class="add_text" style=" width:300px"><i>*</i></td></tr>
                        <tr>
                        <tr>
                            <td class="label_name" style="width:100px">退货原因：</td><td><input name="content" value="{{old('content')}}" type="text" class="add_text" style=" width:300px"><i>*</i></td></tr>
                        <tr> 
                        <tr>
                            <td colspan="" class="center"><input name="" type="submit" value="提交" class="add_dzbtn"></td>
                        </tr>
                    </tbody>
            </form>
    </table>
   </div>
    
  </div>
@endsection