@extends('admin.layout.header')
@section('layout')
 
    <div class="wrapper wrapper-content animated fadeInRight">
         
        <div class="row">
        <div class="col-sm-2">
        </div>
            <div class="col-sm-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商品添加表单</h5>
                        <div class="ibox-tools">
                           
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form action="/admin/goods" method="post"  enctype="multipart/form-data" class="form-horizontal m-t" id="signupForm">
                        {{csrf_field()}}
                        <div class="form-group">
                                <label class="col-sm-3 control-label">商品分类：</label>
                                <div class="col-sm-8">
                                <select class="form-control m-b" name="category_id">
                                        <option value="0">顶级分类</option>
                                </select>
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品名称：</label>
                                <div class="col-sm-8">
                                    <input id="firstname" name="gname" class="form-control" type="text">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品价格：</label>
                                <div class="col-sm-8">
                                    <input id="firstname" name="price" class="form-control" type="text">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品主图：</label>
                                <div class="col-sm-8">
                                <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <input type="file" name="gpic" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品详情图：</label>
                                <div class="col-sm-8">
                                    <div class="form-group"> 
                                        <div class="col-sm-12">
                                            <input type="file" name="manypic[]" multiple class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                     <label class="col-sm-3 control-label">商品库存：</label>
                                    <div class="col-sm-8">
                                        <input id="firstname" name="stock" class="form-control" type="number">
                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                    </div>
                            </div>
                            <div class="form-group"> 
                                 <label class="col-sm-3 control-label">商品状态：</label>
                                <div class="col-sm-8">
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"  value="0" id="-NaN" name="status"  style="margin-top: 2px;">秒杀
                                    </label>
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio" checked="checked"  value="1" id="-NaN" name="status" style="margin-top: 2px;">新品
                                    </label>
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"  value="2" id="-NaN" name="status" style="margin-top: 2px;">热销
                                    </label>
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"  value="3" id="-NaN" name="status" style="margin-top: 2px;">上架
                                    </label>
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"   value="4" id="-NaN" name="status" style="margin-top: 2px;">下架
                                    </label>
                                </div>
                            </div>   
                            <div class="form-group">
                                    <label class="col-sm-3 control-label" for="-NaN">商品规格：</label>
                                    <div class="col-sm-9">
                                        <label class="checkbox-inline" for="-NaN">
                                            <input type="checkbox" value="option1" id="-NaN" name="gram1" style="margin-top: 2px;">500g</label>
                                        <label class="checkbox-inline" for="-NaN">
                                            <input type="checkbox" value="option2" id="-NaN" name="gram2" style="margin-top: 2px;">1000g</label>
                                        <label class="checkbox-inline" for="-NaN">
                                            <input type="checkbox" value="option3" id="-NaN" name="gram3" style="margin-top: 2px;">5000g</label>
                                    </div>
                             </div> 

                            <div class="form-group">
                                    商品详情
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
    
  
    </body>

    <script>
        //    var gname=$
    </script>
</html>
@endsection