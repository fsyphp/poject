@extends('home/layout/header')

@section('title','修改收货地址')

@section('css')
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://lib.h-ui.net/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/js/jquery.provincesCity.js"></script>
	<script type="text/javascript" src="/js/provincesData.js"></script>	
	<script src="/js/layer.js"></script>
	<style>
        .shi{
            height:10px;
        }
        .wu{
            height:5px;     
        }
        html,body{height:auto;}
        #province{margin-left:-30px;}
        #province select{margin-right:10px;width:85px;height:30px;}
    </style>
@endsection

@section('nav')

@endsection

@section('layout')

		<div style="height:30px;">
		</div>
		<div class="container">
			<div class="col-md-4 col-md-offset-5">
				<h2>
					修改收货地址
				</h2>
			</div>
			<div style="margin-top:100px;">
			</div>
			<div class="row col-md-offset-2 col-md-8">
				<form class="form-horizontal" action="/home/update" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							收货人
						</label>
						<div class="col-sm-10">
							<input type="text" name="address_user" autocomplete="off" class="form-control"
							id="inputEmail3" value="{{$addr->address_user}}">
						</div>
					</div>
					<div class="shi">
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							联系电话
						</label>
						<div class="col-sm-10">
							<input type="text" name="address_tel" autocomplete="off" class="form-control"
							id="inputEmail3" value="{{$addr->address_tel}}">
							<input type="hidden" name="id" autocomplete="off" class="form-control"
							id="inputEmail3" value="{{$addr->id}}">
						</div>
					</div>
					<div class="shi">
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label" style="margin-right:15px;">
							选择地址
						</label>
						<div id="province"></div>
						<script type="text/javascript">
							/*调用插件*/
							$(function(){
								$("#province").ProvinceCity();
							});
						</script>
					</div>
					<div class="shi">
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">
							详细地址
						</label>
						<div class="col-sm-10">
							<input type="text" name="addr" autocomplete="off" class="form-control"
							id="inputEmail3" value="{{$adr}}">
						</div>
					</div>
					<div class="shi">
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info col-md-12">
								修改
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="error" style="display:none;">{{session('error')}}</div>
		<div style="margin-bottom:30px;"></div>
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	var text = $('#error').text();
        if(text){
            layer.msg(text,{
                icon: 5,
                time: 3000,
            })
        }
  </script>

@endsection


@section('links')

@endsection
