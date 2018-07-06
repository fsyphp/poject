@extends('admin.layout.header');
@section('layout')




	<form action="/admin/banner/store" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
	    <div class="form-group">
	        <label for="name" class="col-sm-2 control-label">图片名称</label>
	        <div class="col-lg-6">
	            <input type="name" class="form-control" name='name' placeholder="请输入图片名称..."></div>
	    </div>
	    <div class="form-group">
	        <label for="url" class="col-sm-2 control-label">图片链接</label>
	        <div class="col-lg-6">
	            <input type="text" class="form-control" name='url' placeholder="请输入图片链接..."><a href=""></a></div>
	    </div>
	    <div class="mws-form-row">
			<label for="pic" class="mws-form-label">图片</label>
			<div class="mws-form-item">
				<!-- <input type="file" class="small" name='profile'> -->

				<input type="file" name='pic' class="fileinput-preview" style="width: 100%; padding-right: 84px;" id="pic" readonly="readonly" placeholder="No file selected...">
			</div>
		</div>
	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">

	            <button type="submit" class="btn btn-Info btn-lg">提交</button>
	            &nbsp;&nbsp;&nbsp;
	        	<button type="reset" class="btn btn-danger btn-lg">重置</button>
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
