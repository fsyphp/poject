@extends('admin.layout.header')
@section('layout')

<div class="sanshi"></div>
<div class="container">
    <div class="row">
        <form class="form-horizontal col-md-offset-1" action="/admin/integral" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">商品名称</label>
                <div class="col-sm-6">
                <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="请填写商品名称">
                </div>
            </div>
            <div class="shi"></div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品库存</label>
                <div class="col-sm-6">
                <input type="text" name="stock" class="form-control" id="inputPassword3" placeholder="请填写商品库存">
                </div>
            </div>
            <div class="shi"></div>
            <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">商品图片</label>
                <div class="col-sm-6">
                    <input type="file" name="img" id="exampleInputFile">
                </div>
            </div>
            <div class="shi"></div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">所需积分</label>
                <div class="col-sm-6">
                <input type="text" name="price" class="form-control" id="inputPassword3" placeholder="请填写商品兑换积分">
                </div>
            </div>
            <div class="shi"></div>
            <div class="form-group" style="line-height:7px;">
                <label for="inputPassword3" class="col-sm-2 control-label" style="margin-right:18px;">商品状态</label>
            <label class="radio-inline">
                <input type="radio" name="static" id="inlineRadio1" checked value="0"> 新品
            </label>
            <label class="radio-inline">
                <input type="radio" name="static" id="inlineRadio2" value="1"> 上架
            </label>
            <label class="radio-inline">
                <input type="radio" name="static" id="inlineRadio3" value="2"> 下架
            </label>
            </div>
            <div class="shi"></div>
            <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">商品介绍</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="desc" style="resize:none;" rows="3"></textarea>
                </div>
            </div>
            <div class="shi"></div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                <button type="submit" class="btn btn-info col-md-12">添加</button>
                </div>
            </div>
        </form>
    </div>
    <div id="div1" style="display:none;">{{session('error')}}</div>
    <script>
            if( $('#div1').text() != ''){
                layer.open({
                    title: '错误提示',
                    icon: 2,
                    content: $('#div1').text(),
                    anim: 6,
                    closeBtn: 2,
                    offset: ['100px','550px'],
                });
            }
    </script>

@endsection