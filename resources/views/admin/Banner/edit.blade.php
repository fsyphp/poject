@extends('admin.layout.header');
@section('layout')




	<form action="/admin/banner/update/{{$res->id}}" class="form-horizontal" role="form" method="post" enctype='multipart/form-data'>
	    <div class="form-group">
	        <label for="name" class="col-sm-2 control-label">图片名称</label>
	        <div class="col-lg-6">
	            <input type="name" class="form-control" value="{{$res->name}}" name='name' ></div>
	    </div>
	    <div class="form-group">
	        <label for="url" class="col-sm-2 control-label">图片链接</label>
	        <div class="col-lg-6">
	            <input type="text" class="form-control" name='url' value="{{$res->url}}"><a href=""></a></div>
	    </div>
	    <div class="mws-form-row">
			<label for="pic" class="mws-form-label">图片</label>
			<div class="mws-form-item">
				<!-- <input type="file" class="small" name='profile'> -->
				<img src="{{$res->pic}}" alt="" style="width:120px;width:150px;">
				<input type="file" name='pic' class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly" >
			</div>
		</div>
	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">

	{{csrf_field()}}

	            <button type="submit" class="btn btn-Info btn-lg">提交</button>
	            &nbsp;&nbsp;&nbsp;
	        </div>
	    </div>
	</form>



@endsection

@section('js')
<script type="text/javascript">
	
	/*setTimeout(function(){

		$('.mws-form-message').remove();

	},3000)*/

	$('.mws-form-message').fadeOut(5000);

</script>
@endsection
