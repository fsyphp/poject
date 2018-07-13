@extends('admin/layout/header')

@section('layout')
<div style="height:26px;"></div>
    <div class=".container">
        <div class="row col-md-11" style="margin-left:35px;">
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th>商品名称</th>
                    <th>商品图片</th>
                    <th>购买单价</th>
                    <th>购买数量</th>
                    <th>小计</th>
                </tr>
                @foreach($orders_detail as $k=>$v)
                    <tr>
                        <td>{{$brr[$k]}}</td>
                        <td><img src="{{Config('app.gpic').$crr[$k]}}" width=100/></td>
                        <td>{{$v->price}}</td>
                        <td>{{$v->cnt}}</td>
                        <td>{{$v->price*$v->cnt}}.00</td>                        
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection