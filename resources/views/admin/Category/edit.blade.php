@extends('admin.layout.header')
@section('layout')
<div class="wrapper wrapper-content animated fadeInRight"  id="divs">
         
         <div class="row">
         <div class="col-sm-2">
         </div>
             <div class="col-sm-8">
                 <div class="ibox float-e-margins">
                     <div class="ibox-title">
                         <h5>分类添加</h5>
                         <div class="ibox-tools">
                            
                             <a class="close-link">
                                 <i class="fa fa-times"></i>
                             </a>
                         </div>
                     </div>
                     <div class="ibox-content">
                         <form action="/admin/cate/{{$title->id}}" method="post" class="form-horizontal m-t" id="signupForm">
                         {{csrf_field()}}
                         {{method_field('PUT')}} 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">分类类别：</label>
                                    <div class="col-sm-8">
                                    <select class="form-control m-b" id="cate" name="category" disabled>
                                        @if($pid)
                                            <option value="">{{$pid['title']}}</option>
                                        @else
                                            <option value="0">顶级分类</option>
                                        @endif 
                                    </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">分类名称：</label>
                                    <div class="col-sm-8">
                                        <input id="firstname" name="title" value="{{$title->title}}" class="form-control" type="text"> 
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <button class="btn btn-primary" type="submit">提交</button>
                                    </div>
                                </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection