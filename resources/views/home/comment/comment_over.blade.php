@extends('home/layout/header')
@section('css')
    <link href='/home/css/finish.css' type='text/css' rel='stylesheet'>
    <style type="text/css" id="tipsCSS">.Jtips{position:relative;float:left}.Jtips .Jtips-close{position:absolute;width:10px;height:10px;color:#f60;font:12px/10px "simsun";cursor:pointer}.Jtips .Jtips-arr{position:absolute;background-image:url(//misc.360buyimg.com/purchase/trade/skin/i/arrow.gif);background-repeat:no-repeat;overflow:hidden}.Jtips.Jtips-top{padding-bottom:5px}.Jtips.Jtips-top .Jtips-close{right:10px;top:12px}.Jtips.Jtips-top .Jtips-arr{left:10px;bottom:0;width:11px;height:6px;background-position:0 -5px}.Jtips.Jtips-bottom{padding-top:5px}.Jtips.Jtips-bottom .Jtips-close{right:10px;top:17px}.Jtips.Jtips-bottom .Jtips-arr{top:0;left:10px;width:11px;height:6px;background-position:0 0}.Jtips.Jtips-left{padding-right:5px}.Jtips.Jtips-left .Jtips-close{right:16px;top:12px}.Jtips.Jtips-left .Jtips-arr{right:0;top:10px;width:6px;height:11px;background-position:-5px 0}.Jtips.Jtips-right{padding-left:5px}.Jtips.Jtips-right .Jtips-close{right:10px;top:12px}.Jtips.Jtips-right .Jtips-arr{top:10px;left:0;width:6px;height:11px;background-position:0 0}.Jtips .Jtips-con{padding:7px 30px 7px 10px;background:#fffdee;border:1px solid #edd28b;color:#333;-moz-box-shadow:0 0 2px 2px #eee;-webkit-box-shadow:0 0 2px 2px #eee;box-shadow:0 0 2px 2px #eee}.Jtips .Jtips-con a,.Jtips .Jtips-con a:visited{color:#005fab;text-decoration:none}.Jtips .Jtips-con a:hover{text-decoration:underline}</style><style>#wx-share-tip{position:absolute;width:415px;display: none;z-index:9999;}#wx-share-tip .tip-inner{border:1px solid #ddd;background:#fff;-webkit-box-shadow:0 0 10px rgba(0,0,0,.15);box-shadow:0 0 10px rgba(0,0,0,.15)}#wx-share-tip .wx-qrcode{height:120px;padding:20px 20px 20px 120px;overflow:hidden}#wx-share-tip .wx-qrcode .qrcode{float:left;display:inline;width:120px;height:120px;margin-left:-95px;margin-right:15px}#wx-share-tip .wx-qrcode .title{font:16px/22px "microsoft yahei";margin-bottom:9px;color:#666}#wx-share-tip .wx-qrcode .hint{font:12px/20px "????";color:#999}#wx-share-tip .wx-explain{padding:15px 20px 22px;border-top:1px solid #eee;background:#f8f8f8}#wx-share-tip .wx-explain .title{font:700 14px/22px "microsoft yahei";text-align:center;color:#666}#wx-share-tip .wx-explain .hint{margin-bottom:10px;font:12px/20px "????";color:#999}#wx-share-tip .wx-explain .step{display:block;width:370px;height:80px;margin:0 auto;overflow:hidden;background:#ededed}#wx-share-tip .tip-arrow{position:absolute;left:34px;bottom:-15px;width:16px;height:16px;overflow:hidden}#wx-share-tip .tip-arrow em{position:absolute;left:0;border-width:8px;border-style:solid dashed dashed}#wx-share-tip .tip-arrow em.layer1{border-color:#ddd transparent transparent;top:1px}#wx-share-tip .tip-arrow em.layer2{border-color:#fff transparent transparent} </style> 
@endsection
@section('title','评价成功')
@section('nav')

@endsection

@section('layout')
<div id="o-header-2013">
    <div id="header-2013" style="display:none;">
    </div>
</div>
<!--shortcut end-->
<div id="o-header-2013">
    <div id="header-2013" style="display:none;">
    </div>
</div>
<div class="w w1 header clearfix" style="height:50px;">
    <div id="logo">
        <!-- <a href="" class="link1" target="_blank">
        <img src="/static/home/images/logo-201305.png" alt="京东商城">
        </a>
        <a href="" class="link2"><b></b>"结算页"</a> -->
    </div>
</div>
<!-- /header -->
<!--/ /widget/header-succ-2015/header-succ-2015.tpl -->
<div class="w" id="safeinfo">
</div>
<!--父订单的ID-->
<input type="hidden" id="successOrderId" value="44392478919">
<div id="container">
    <div class="w main">
        <div class="m m3 msop">
            <div class="mt" id="success_tittle">
                <s class="icon-succ02">
                </s>
                <h3 class="ftx-02">
                    感谢您的评价,O(∩_∩)O谢谢！！
                </h3>
            </div>
            <div class="mc" id="success_detail">
                <input type="hidden" id="loadSuccessFlag" value="ok">
                <!-- 加載成功標識 -->
                <input type="hidden" id="skuIds" value="1832201">
                <!-- 商品id串 -->
                <!-- 再次购买按钮 -->
                <div class="btn-area mb10">
                    <a class="btn-buyagain ml10" href="/" clstag="pageclick|keycount|trade_201602181|32">
                        再次购买
                    </a>
                </div>
                <!-- 在线支付按钮 -->
                <div id="bookDiv">
                </div>
                <div class="wx-banner">
                    <div class="wx-share">
                        <div class="share-trigger" id="gwqpc-handle-point" data-scene="100104000"
                        data-dealid="44392478919" data-pin="景水">
                            <i class="i-share">
                            </i>
                            <span class="txt">
                                分享给微信好友
                            </span>
                        </div>
                    </div>
                    <div class="mobile-ordertrack">
                        <div class="ordertrack-trigger">
                            <i class="i-mobile">
                            </i>
                            <span class="txt">
                                订单小助手&nbsp;随时随地查订单
                            </span>
                        </div>
                        <div class="wx-qrcode-tip">
                            <span class="tip-arrow">
                                <em class="layer1">
                                </em>
                                <em class="layer2">
                                </em>
                            </span>
                            <div class="tip-inner">
                                <div class="tip-cont">
                                    <div class="tip-title">
                                        订单助手
                                    </div>
                                    <div class="tip-hint">
                                        关注微信公众号
                                        <br>
                                        随时随地查订单
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-tips">
                    <span class="d-tips-cont">
                        <i>
                        </i>
                        重要提醒：京东平台及销售商不会以
                        <span class="ftx-01">
                            任何理由
                        </span>
                        ，要求您点击
                        <span class="ftx-01">
                            任何网址链接
                        </span>
                        进行退款操作。点此查看京东平台“
                        <a class="ftx-05" target="_blank" href="">
                            谨防诈骗公告声明
                        </a>
                        ”
                    </span>
                </div>
            </div>
            <div class="qr-code">
                <a class="code" href="javascript:void(0)">
                    <img alt="" src="/static/home/images/5435f1eeNc4bfcf9e.jpg">
                </a>
                <a class="sao02" href="javascript:void(0)">
                </a>
            </div>
        </div>
        <div class="o-mb">
            完成支付后，您可以：
            <a href="" clstag="pageclick|keycount|trade_201602181|33">
                继续购物
            </a>
            &nbsp;&nbsp;
            <a href="" clstag="pageclick|keycount|trade_201602181|34">
                问题反馈
            </a>
        </div>
    </div>
    <div class="w m" id="da930X1001">
    </div>
    <!-- 电子书广告-->
    <div id="dianzishu_image" class="w m">
    </div>
    <!--@end #c-tabs-->
</div>
<!--統計 start-->
<input type="hidden" id="mediavOrderCount" value="{&#39;orderId&#39;:44392478919,&#39;skuIds&#39;:&#39;1832201&#39;,&#39;factPrice&#39;:799.00,&#39;success&#39;:true,&#39;countInfos&#39;:[{&#39;orderId&#39;:44392478919,&#39;price&#39;:799.00,&#39;num&#39;:1,&#39;skuId&#39;:1832201}],&#39;skuIdDetail&#39;:&#39;1832201,1;&#39;}">
<!--統計 end-->
<!-- footer end -->
<!-- MEDIAV end -->
<div id="wx-share-tip">
    <span class="tip-arrow">
        <em class="layer1">
        </em>
        <em class="layer2">
        </em>
    </span>
    <div class="tip-inner">
        <div class="wx-qrcode">
            <span id="wx-arcode-img" src="//temp.im/80x80/FAF0E4/000" alt="" class="qrcode">
                <canvas width="120" height="120">
                </canvas>
            </span>
            <div class="cont">
                <div class="title">
                    <strong>
                        微信扫一扫
                    </strong>
                    <br>
                    分享到微信购物圈，与好友分享！
                </div>
                <div class="hint">
                    好友购买你分享的商品，您们都将获得京豆奖励！
                </div>
            </div>
        </div>
        <div class="wx-explain">
            <div class="title">
                购物圈是什么？
            </div>
            <div class="hint">
                购物圈是微信好友购物的分享社区，在这里您可以和好友分享购物乐趣
            </div>
            <img src="/static/home/images/gwq-step.jpg" alt="" class="step">
        </div>
    </div>
</div>


@endsection

@section('links')

@endsection