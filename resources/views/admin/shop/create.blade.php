@extends('admin.layout.header')
@section('layout')
<link href="http://static.h-ui.net/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
html,body{height:auto;}
#province select{margin-left:10px; width:100px}
</style>
    <div class="wrapper wrapper-content animated fadeInRight">
         
         <div class="row">
         <div class="col-sm-2">
         </div>
             <div class="col-sm-8">
                 <div class="ibox float-e-margins">
                     <div class="ibox-title">
                         <h5>实体店添加</h5>
                         <div class="ibox-tools"> 
                             <a class="close-link">
                                 <i class="fa fa-times"></i>
                             </a>
                         </div>
                     </div>
                     <div class="ibox-content">
                         <form action="/admin/shop" method="post"  enctype="multipart/form-data" class="form-horizontal m-t" id="signupForm">
                         {{csrf_field()}}
                         <div class="form-group">
                                 <label class="col-sm-3 control-label">店铺地址：</label>
                                 <div class="col-sm-8">
                                    <div id="province"></div>
                                 </div>
                        </div>
                        <div class="form-group">
                                 <label class="col-sm-3 control-label">详细地址：</label>
                                 <div class="col-sm-8">
                                 <input id="firstname" name="address" value="{{old('address')}}" class="form-control" type="text"> 
                                 </div>
                        </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">店铺名称：</label>
                                 <div class="col-sm-8">
                                     <input id="firstname" name="shop_name" value="{{old('shop_name')}}" class="form-control" type="text"> 
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">服务电话：</label>
                                 <div class="col-sm-8">
                                     <input id="firstname" name="tel" value="{{old('tel')}}" class="form-control" type="text">
                                     <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">介绍：</label>
                                 <div class="col-sm-8">
                                     <input id="firstname" name="content" value="{{old('content')}}" class="form-control" type="text">
                                     <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">店铺图片：</label>
                                 <div class="col-sm-8">
                                 <div class="form-group"> 
                                         <div class="col-sm-12">
                                             <input type="file" name="shop_pic" class="form-control">
                                         </div>
                                     </div>
                                 </div>
                             </div> 
                             <div class="form-group">
                                 <div class="col-sm-8 col-sm-offset-1">
                                     <button class="btn btn-primary" type="submit">提交</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div> 
        
<script type="text/javascript" src="http://lib.h-ui.net/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery.provincesCity.js"></script>
<script type="text/javascript" src="/admin/js/provincesData.js"></script>
<script type="text/javascript">
/*调用插件*/
$(function(){
	$("#province").ProvinceCity();
});
</script> 
@endsection
    