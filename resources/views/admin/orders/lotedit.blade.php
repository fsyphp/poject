@extends('admin/layout/header')

@section('layout')
<div class="sanshi"></div>
<div class="container">
    <div class="row col-md-7 col-md-offset-1">
        <form class="form-horizontal" action="/admin/lotDraw/{{$lotedit->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">
                    订单号
                </label>
                <div class="col-sm-10">
                    <input type="text" disabled="disabled" class="form-control" id="inputEmail3" value="{{$lotedit->number}}">
                </div>
            </div>
            <div class="shi"></div>
            <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">
                    创建时间
                </label>
                <div class="col-sm-10">
                    <input type="text" disabled="disabled" class="form-control" id="inputEmail3" value="{{date('Y-m-d',$lotedit->orders_at)}}">
                </div>
            </div>
            <div class="shi"></div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">
                    收货人
                </label>
                <div class="col-sm-10">
                    <input type="text" name="address_user" autocomplete="off" class="form-control" id="inputPassword3" value="{{$lotedit->address_user}}">
                </div>
            </div>
            <div class="shi"></div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">
                    联系电话
                </label>
                <div class="col-sm-10">
                    <input type="text" name="orders_tel" class="form-control" id="inputPassword3" value="{{$lotedit->orders_tel}}">
                </div>
            </div>
            <div class="shi"></div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">
                    收货地址
                </label>
                <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" id="inputPassword3" value="{{$lotedit->address}}">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">
                        修改
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection