<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="http://static.h-ui.net/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
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
</head>
<body>
    <div style="height:30px;"></div>
    <div class="container">
         <div class="row col-md-1">
            <form class="form-horizontal" id="form">
             {{ csrf_field() }}
                <div class="form-group" style="margin-top:10px;">
                    <label for="inputEmail3" class="col-sm-2 control-label" style="float:left;margin:8px 15px 0 0;">收货人</label>
                    <div class="col-sm-5">
                    <input type="text" name="address_user" style="width:280px;" class="form-control user" id="inputEmail3" placeholder="请填写收货人">
                    </div>
                </div>
                <div class="form-group" style="margin-top:18px;">
                    <label for="inputEmail3" class="col-sm-2 control-label" style="float:left;margin-top:8px;">收货电话</label>
                    <div class="col-sm-5">
                    <input type="text" name="orders_tel" style="width:280px;" class="form-control" id="inputEmail3" placeholder="请填写收货人电话">
                    </div>
                </div>
                <div class="wu"></div>
                <label for="inputEmail3" class="col-sm-2 control-label" style="float:left;margin:8px 0 0 -15px;">收货地址</label>
                <div id="province"></div>
                <script>
                /*调用插件*/
                $(function(){
                    $("#province").ProvinceCity();
                });
                </script>
                <div class="shi"></div>
                <div class="form-group" style="margin-top:10px;">
                    <label for="inputEmail3" class="col-sm-2 control-label" style="float:left;margin-top:8px;">详细地址</label>
                    <div class="col-sm-5">
                    <input type="text" name="detail" style="width:280px;" class="form-control" id="inputEmail3" placeholder="请填写详细收货地址">
                    </div>
                </div>
                <div class="shi"></div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info" style="width:300px;margin-left:30px;">提交</button>
                    </div>
                </div>
                </form>
        </div>
    </div>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // var text = $('.alert-danger').text();
    $('.btn').click(function(){
        var user = $('input[name=address_user]').val();
        var tel = $('input[name=orders_tel]').val();
        var msg = $('input[name=orders_msg]').val();
        var city = $('select[name=city]').val();
        var county = $('select[name=county]').val();
        var town = $('select[name=town]').val();
        var detail = $('input[name=detail]').val();
        var addr = city+county+town+detail;
        $.post('/home/commit',{user:user,tel:tel,msg:msg,addr:addr,city:city,detail:detail},function(data){
            if(data=='01'){
                layer.open({
                    title: '成功...',
                    content: '地址添加成功...',
                    icon: 6,
                    offset: '55px',
                    closeBtn: 2,
                });
                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                parent.layer.close(index); //再执行关闭
            } else if(data=='city'){
                error('请选择收货地址...');
            } else if(data=='tel'){
                error('请填写收货人电话...');
            } else if(data=='user'){
                error('请填写收货人...');
            } else if(data=='detail'){
                error('请填写详细收货地址...');
            } else {
                error('未知错误...');
            }
        });
        return false;
    });
    function error(text){
        layer.open({
            title: '错误提示!',
            content: text,
            icon: 2,
            offset: '55px',
            closeBtn: 2,
        });
    }
    // $.post('/home/commit',{},function(){});
    /* if(text!=''){
        layer.open({
            title: '错误提示...',
            content: text,
            icon: 2,
            closeBtn: 2,
        });
    } */
    
        /* $('.btn').click(function(){
            if(text==''){
                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                parent.layer.close(index); //再执行关闭
            }
        }); */
       
        // $.post('/home/commit',{},);
    </script>
</body>
</html>