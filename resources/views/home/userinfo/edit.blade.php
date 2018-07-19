@extends('home.layout.header')
@extends('home.after.index')
@section('title',$title)
@section('content') 
<link rel="stylesheet" href="/bs/css/bootstrap.min.css">
<link rel="stylesheet" href="/bs/css/bootstrap-theme.min.css">
<script type="text/javascript" src="/bs/js/jquery.js"></script>
<script type="text/javascript" src="/bs/js/bootstrap.min.js"></script>
<div class="form"">

    <form action="/home/userinfo/update/{{$data['id']}}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

    <div class="form-group">
     <label class="col-sm-3 control-label">昵称&nbsp;&nbsp;&nbsp;</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="uname" value="{{$data->uname}}" placeholder="请输入您的昵称...">
      </div>
    </div>
      
      <div class="form-group">
        <label for="sex" class="col-sm-3 control-label">性别&nbsp;&nbsp;&nbsp;</label>
       
          <input type="radio" id="" name="sex" value="m" @if ($data->detail['sex']=='m') checked @endif>男&nbsp;&nbsp;&nbsp;
          <input type="radio" id="" name="sex" value="w" @if ($data->detail['sex']=='w') checked @endif>女&nbsp;&nbsp;&nbsp;
          <input type="radio" id="" name="sex" value="x" @if ($data->datail['sex']=='x') checked @endif>未知
      </div>
      
        <div class="form-group">
          <label class="col-lg-3 control-label">&nbsp;Email&nbsp;&nbsp;&nbsp;</label>
            <div class="col-lg-5">
            <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="请输入您的昵称...">
          </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label">电话&nbsp;&nbsp;&nbsp;</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="tel" value="{{$data->detail['tel']}}" placeholder="请输入您的邮箱...">
            </div>
          </div>
     
        <div class="form-group">
            <label class="col-sm-3 control-label">余额&nbsp;&nbsp;&nbsp;</label>
            <div class="col-sm-5">

              <p class="form-control-static">{{$data->detail['money']}}</p>
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">积分&nbsp;&nbsp;&nbsp;</label>
            <div class="col-sm-5">
              <p class="form-control-static">{{$data->detail['integral']}}</p>
              
            </div>
          </div>
        
      <div class="mws-form-row" style="float:right;margin-top:-250px;margin-right:-180px;">
        <label class="mws-form-label">图片</label>
        <div class="mws-form-item">
          <!-- <input type="file" class="small" name='profile'> -->
          <img src="{{ $data->detail['img'] }}" style="width:120px;height: 120px;"/>
          <input type="file" name='img' class="" style="width: 100%; padding-right: 84px;" readonly="" >
        </div>
      </div>


        <br><br>
{{csrf_field()}}

    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
      
    </form>
</div>


 



@endsection
