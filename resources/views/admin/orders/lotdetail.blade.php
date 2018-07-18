@extends('admin/layout/header')

@section('layout')
<div style="height:26px;"></div>
    <div class=".container">
        <div class="row col-md-8" style="margin-left:35px;">
            <table class="table col-md-offset-2 table-striped table-bordered table-hover">
                <tr>
                    <th>商品名称</th>
                    <th>商品图片</th>
                </tr>
                    <tr>
                        <td>{{$detail['title']}}</td>
                        <td><img src="{{$detail['img']}}" width=80/></td>
                    </tr>
            </table>
        </div>
    </div>

@endsection