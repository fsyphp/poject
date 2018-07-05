@extends('admin.layout.header')
@section('layout')
        <div class="container" style="margin:30px 0 0 50px;">
            <div class="row">            
                <form class="form-horizontal" action="/admin/lottery/{{$ed->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pull-left" style="margin-top:5px;">奖品名称</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" name="title" value="{{$ed->title}}"  id="inputEmail3" placeholder="奖品名称">
                        </div>
                    </div>
                    <div class="shi"></div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pull-left" style="margin-top:5px;">奖品库存</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="inputEmail3" value="{{$ed->stock}}" name="stock" placeholder="奖品库存">
                        </div>
                    </div>
                    <div class="shi"></div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label" style="margin-top:5px;">奖品图片</label>
                        <div class="col-sm-6">
                        <img src="{{$ed->img}}" alt="" width="70" style="float:left;margin-right:10px;">
                            <input type="file" name="img" id="exampleInputFile">
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="shi"></div>
                    <label for="inputPassword3" class="col-sm-2 control-label pull-left">商品状态</label>
                    <label class="radio-inline" style="line-height:5px;">
                        <input type="radio" name="static" id="inlineRadio1" @if($ed->static=='0') checked @endif value="0"> 上架
                    </label>
                    <label class="radio-inline" style="line-height:5px;">
                        <input type="radio" name="static" id="inlineRadio2" @if($ed->static=='1') checked @endif value="1"> 下架
                    </label>
                    </div>
                    <div class="shi"></div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label pull-left" style="margin-top:5px;">奖品介绍</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="desc" style="resize:none;" rows="3">{{$ed->desc}}</textarea>
                        </div>
                    </div>
                    <div class="shi"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                        <button class="btn btn-info col-md-12">修改</button>
                        </div>
                    </div>
                </form>
                <div id="id" style="display:none;">{{$ed->id}}</div>
            </div>
        </div>   
</body>
    <script>
   /*  $('.edit').click(function(){
        var id = $('#id').text();
        $.post('/admin/lottery/'+id,{id:id},function(data){
           if(data == 1){
               location.href = '/admin/lottery';
           }
        });
        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        parent.layer.close(index); //再执行关闭 
        
    }); */
    
    /* $('input[type=file]').click(function(){
        var form = new FormData().$('#form');
        $.ajax({
            url: '1.php',
            data: form,  
            async: false,  
            cache: false,  
            contentType: false,  
            processData: false, 
            type: 'POST', 
            success: function(data){},
            error: function(){},
            timeout:3000, 
            async: true
        })
        console.log(form);
    }); */
    // var id = $('#id').text();
    /* $('.edit').click(function(){
        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        parent.layer.close(index); //再执行关闭 

        }); */

        /* var title = $('input[name=title]').val();
        var stock = $('input[name=stock]').val();
        var static = $(':checked').val();
        var desc = $('textarea').val();
        var pic = $('img').attr('src');
        $.ajax({
            url: '/admin/lottery/'+id,
            data: {
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'id': id,
                'title': title,
                'stock': stock,
                'static': static,
                'desc': desc,
                'img': img,
                'pic': pic,
            },
            dataType: 'json',
            type: 'PUT',
            success: function(data){
                if( data == 1 ){

                } else {

                }
            },
            error: function(){},
            timeout:3000,
            async: true,
        }); */        
    </script>
@endsection
