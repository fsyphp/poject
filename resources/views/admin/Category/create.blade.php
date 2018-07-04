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
                         <form  class="form-horizontal m-t" id="signupForm">
                         <div class="form-group">
                                 <label class="col-sm-3 control-label">分类类别：</label>
                                 <div class="col-sm-8">
                                 <select class="form-control m-b" id="cate" name="category">
                                         <option value="0">顶级分类</option>
                                        @foreach ($data as $k=>$v)
                                                <option value="{{$v->id}}">{{$v->title}}</option>
                                        @endforeach
                                 </select> 
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">分类名称：</label>
                                 <div class="col-sm-8">
                                     <input id="firstname" name="title" class="form-control" type="text"> 
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
     
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
     </script>
     <script>
            $('.btn-primary').click(function(){
                var title=$('input[name=title]').val();
                var category=$('#cate').val();
                var reg=/\W{2,6}/;
                if(reg.test(title)){
                    }else{
                        var err= $('<div id="info" class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>格式2~6位</div>');
                        $("#divs").before(err);
                       return false;
                    }
                $.ajax({
                    url:'/admin/cate',
                    data:{'title':title,'pid':category},
                    type:'post',
                    datatype:'json',
                    success:function(mes){
                        console.log(mes);
                       if(mes==00){ 
                            var info= $('<div id="info" class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>添加成功</div>');
                           $("#divs").before(info);
                           $('input[name=title]').val('');
                            setTimeout(function(){
                                window.location.href='/admin/cate';
                            },2000);
                       }else{
                            var err= $('<div id="info" class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>添加失败</div>');
                           $("#divs").before(err);
                       }
                    },
                    error:function(err){
                        console.log(err);
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    timeout:3000,
                    async:true
                });
                return false;
                
            })
            setInterval(function(){
                $('#info').hide();
            },3000);
     </script>
  
@endsection