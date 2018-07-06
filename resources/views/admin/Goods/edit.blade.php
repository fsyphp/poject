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
                        <form action="/admin/goods/{{$data['id']}}" method="post"  enctype="multipart/form-data" class="form-horizontal m-t" id="signupForm">
                        {{csrf_field()}}                        
                        {{method_field('PUT')}}
                        <div class="form-group">
                                <label class="col-sm-3 control-label">商品分类：</label>
                                <div class="col-sm-8">
                                <select class="form-control m-b" name="category_id">
                                    @foreach (App\Model\Cate::cates() as $k=>$v)
                                        <option value="{{$v->id}}" @if($data['category_id']==$v->id) selected @endif>{{$v->title}}</option>
                                    @endforeach
                                    </select>
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品名称：</label>
                                <div class="col-sm-8">
                                    <input id="firstname" name="gname" value="{{$data['gname']}}" class="form-control" type="text">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品价格：</label>
                                <div class="col-sm-8">
                                    <input id="firstname" name="price" value="{{$data['price']}}" class="form-control" type="text">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品主图：</label>
                                <div class="col-sm-8">
                                <div class="form-group"> 
                                        <div class="col-sm-12">
                                        <img src="{{\Config('app.gpic')}}{{$data['gpic']}}"  alt=""> 
                                            <input type="file" name="gpic" value="{{$data['gpic']}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品详情图：</label>
                                <div class="col-sm-8">
                                    <div class="form-group"> 
                                        <div class="col-sm-12">
                                        @foreach(explode(',',$data['detail']['manypic']) as $k=>$v)
                                                        <img src="{{\Config('app.gpic')}}{{$v}}" alt="" width="10%">
                                         @endforeach 
                                            <input type="file" name="manypic[]" multiple class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                     <label class="col-sm-3 control-label">商品库存：</label>
                                    <div class="col-sm-8">
                                        <input id="firstname" name="stock" value="{{$data['detail']['stock']}}"  class="form-control" type="number">
                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>
                                    </div>
                            </div>
                            <div class="form-group"> 
                                 <label class="col-sm-3 control-label">商品状态：</label>
                                <div class="col-sm-8">
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"  value="0" @if($data['g_static']==0) checked @endif name="g_static"  style="margin-top: 2px;">秒杀
                                    </label>
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"  value="1" @if($data['g_static']==1) checked @endif  name="g_static" style="margin-top: 2px;" >新品
                                    </label>
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"  value="2" @if($data['g_static']==2) checked @endif  name="g_static" style="margin-top: 2px;">热销
                                    </label>
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"  value="3" @if($data['g_static']==3) checked @endif  name="g_static" style="margin-top: 2px;">上架
                                    </label>
                                    <label class="radio-inline" for="-NaN">
                                        <input type="radio"   value="4" @if($data['g_static']==4) checked @endif  name="g_static" style="margin-top: 2px;">下架
                                    </label>
                                </div>
                            </div>   
                            <div class="form-group">
                                    <label class="col-sm-3 control-label" for="-NaN">商品规格：</label>
                                    <div class="col-sm-9"> 
                                        <label class="checkbox-inline" for="-NaN">
                                            <input type="checkbox" value="0" id="-NaN" name="gram[]" style="margin-top: 2px;"
                                                  @foreach(explode(',',$data['detail']['gram']) as $k=>$v)
                                                        @if($v==0)
                                                            checked
                                                        @endif
                                                  @endforeach
                                            >500g</label>
                                        <label class="checkbox-inline" for="-NaN">
                                            <input type="checkbox" value="1" id="-NaN" name="gram[]" style="margin-top: 2px;"
                                                  @foreach(explode(',',$data['detail']['gram']) as $k=>$v)
                                                        @if($v==1)
                                                            checked
                                                        @endif
                                                  @endforeach
                                            >1000g</label>
                                        <label class="checkbox-inline" for="-NaN">
                                            <input type="checkbox" value="2" id="-NaN" name="gram[]" style="margin-top: 2px;"
                                                  @foreach(explode(',',$data['detail']['gram']) as $k=>$v)
                                                        @if($v==2)
                                                            checked
                                                        @endif
                                                  @endforeach
                                            >5000g</label>
                                    </div>
                             </div> 

                            <div class="form-group">
                            <div style="margin-left: 100px;">
                                <h1>商品详情</h1>
                                    <script id="editor" type="text/plain"  name="baby" style="width:1024px;height:500px;">{!!$data['detail']['baby']!!}</script>
                                </div>
                            </div>
                            <script> 
                                //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                                    var ue = UE.getEditor('editor'); 
                                    function isFocus(e){
                                        alert(UE.getEditor('editor').isFocus());
                                        UE.dom.domUtils.preventDefault(e)
                                    }
                                    function setblur(e){
                                            UE.getEditor('editor').blur();
                                            UE.dom.domUtils.preventDefault(e)
                                    }
                            </script>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-1">
                                    <button class="btn btn-primary" type="submit">修改</button>
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
