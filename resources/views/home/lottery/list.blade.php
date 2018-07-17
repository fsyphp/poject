@extends('home.layout.header')
@section('title',$title)
@section('layout')
<script src="/js/jquery.min.js"></script>
<script src="/js/turntable.js"></script>
<style>
	.lottery {
		position: relative;
		display: inline-block;
		text-align:center
	}

	.lottery img {
		position: absolute;
		top: 50%;
		left: 50%;
		margin-left: -76px;
		margin-top: -82px;
		cursor: pointer;
	}

	#message {
		position: absolute;
		top: 0px;
		left: 10%;
	}
	.chou{
		background-color: #FB914A;
	}
</style> 

</head>
<body>
<center>
<center>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';"> 
		<p style="color:red">每次抽奖消耗 1000 积分</p>
		<p>您当前积分为{}</p>
</div>
</center> 
<div class="lottery">
	<canvas id="myCanvas" width="600" height="600" style="border:1px solid #d3d3d3;">
		当前浏览器版本过低，请使用其他浏览器尝试
	</canvas>
    <p id="message"></p>
    <div id="dvs" style="display:none">{{$goods}}</div>
	<img src="/images/start.png" id="start">
</div>
</center> 
<script>
 var aa=eval($('#dvs').text()); 
   var title=[];
   var pic=[];
   var pid=[];
   for(var i in aa){
       title[i]=aa[i].title;
       pic[i]=aa[i].img;
	   pid[i]=aa[i].id;
   }  
	var wheelSurf
	// 初始化装盘数据 正常情况下应该由后台返回
	var initData = {
		"success": true,
		"list": [{
				"id": 100,
				"name": title[0],
				"image": pic[0],
				"rank":1,
				"id":pid[0],
				"percent":3
			},
			{
				"id": 101,
				"name": title[1],
				"image": pic[1],
				"rank":2,
				"id":pid[1],
				"percent":5
			},
			{
				"id": 102,
				"name": title[2],
				"image": pic[2],
				"rank":3,
				"id":pid[2],
				"percent":2
			},
			{
				"id": 103,
				"name": title[3],
				"image": pic[3],
				"rank":4,
				"id":pid[3],
				"percent":49
			},
			{
				"id": 104,
				"name": title[4],
				"image": pic[4],
				"rank":5,
				"id":pid[4],
				"percent":30
			},
			{
				"id": 105,
				"name": title[5],
				"image": pic[5],
				"rank":6,
				"id":pid[5],
				"percent":1
			},
			{
				"id": 106,
				"name": title[6],
				"image": pic[6],
				"rank":7,
				"id":pid[6],
				"percent":10
			}
		]
	}

	// 计算分配获奖概率(前提所有奖品概率相加100%)
	function getGift(){
		var percent = Math.random()*100
		var totalPercent = 0
		for(var i = 0 ,l = initData.list.length;i<l;i++){
			totalPercent += initData.list[i].percent
			if(percent<=totalPercent){
				return initData.list[i]
			}
		}           
	}

	var list = {}
	
	var angel = 360 / initData.list.length
	// 格式化成插件需要的奖品列表格式
	for (var i = 0, l = initData.list.length; i < l; i++) {
		list[initData.list[i].rank] = {
			id:initData.list[i].id,
			name: initData.list[i].name,
			image: initData.list[i].image
		}
	}
	// 查看奖品列表格式
	
	// 定义转盘奖品
	wheelSurf = $('#myCanvas').WheelSurf({
		list: list, // 奖品 列表，(必填)
		outerCircle: {
			color: '#df1e15' // 外圈颜色(可选)
		},
		innerCircle: {
			color: '#f4ad26' // 里圈颜色(可选)
		},
		dots: ['#fbf0a9', '#fbb936'], // 装饰点颜色(可选)
		disk: ['#ffb933', '#ffe8b5', '#ffb933', '#ffd57c', '#ffb933', '#ffe8b5', '#ffd57c'], //中心奖盘的颜色，默认7彩(可选)
		title: {
			color: '#5c1e08',
			font: '19px Arial'
		} // 奖品标题样式(可选)
	})

	// 初始化转盘
	wheelSurf.init()
	// 抽奖
	var throttle = true;
	$("#start").on('click', function () {

		var winData = getGift() // 正常情况下获奖信息应该由后台返回

		$("#message").html('')
		if(!throttle){
			return false;
		}
		throttle = false;
		var count = 0
		// 计算奖品角度

		for (const key in list) {
			if (list.hasOwnProperty(key)) {                    
				if (winData.id == list[key].id) {
					break;
				}
				count++    
			}
		}
  
		// 转盘抽奖，
		wheelSurf.lottery((count * angel + angel / 2), function () {
			$("#jiang").html("<a href=/home/jiesuan/"+winData.id+">去领取奖品 -->"+winData.name+'</a>')
            // alert(winData.name);
			throttle = true;
		})
	})

	
</script>
<center>
<div id="jiang" style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';"> 
	
</div>
</center>

@endsection