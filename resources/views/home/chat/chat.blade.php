@extends('home.layout.chat')       
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@section('chat')
<form action="">
	<div id="left-col">
			<!--left-header-->
			<div class="left-header">
				<div class="head-image" style="margin: 12px 0 0 5px;">
					<a href="#"><img src="/lt/images/head1.png"></a>
					<div class="user-info">
						<h3 class="name"><a href="#" style="color: white;">{{session('unames')}}</a></h3>
						<p style="margin-top: 5px; color: white;"><a href="#"><img src="/lt/images/xin.png"></a>&nbsp;www.jiuni.com.cn</p>
					</div>
				</div>
				<div class="some" style="padding-top: 14px;">
					<a href="#"><img src="/lt/images/4.png" /></a>
					<a href="#"><img src="/lt/images/3.png" /></a>
					<a href="#"><img src="/lt/images/2.png" /></a>
					<a href="#"><img src="/lt/images/1.png" /></a>
					<a href="#"><img src="/lt/images/5.png" /></a>
				</div>
			</div>
			<!--msg-box-->
			<div class="left-msg">
				<div id="leftMsgBox" class="left-msg-box">
				</div>
				<div class="left-info-images">
					<img src="/lt/images/A.png" />
					<img src="/lt/images/pen.png" />
					<img src="/lt/images/smile.png" />
					<img src="/lt/images/cat.png" />
				</div>
			</div>
			<!--left-info-->
			<div class="left-info">
			<img src="/lt/images/girl.png" />
			</div>
			<!--left-input-box-->
			<div class="left-input-box">
				<!--textarea-->
				<textarea id="text" class="text-input">
				</textarea>
				<!--sent-but-->
				<div class="sent-but">
					<input class="but" id="close-window" type="button" value="关&nbsp;闭(c)">
					<input class="but" id="send" type="button" value="发送(Enter)">
 				</div>
			</div>
		</div>
		<!--right-col-->
		 {{ csrf_field() }}
</form>
<div id="xx" style="display:none">{{session('contentg')}}</div>
@if(session('contentg') != '')
	<script>
		var oLeftMsgBox = document.getElementById('leftMsgBox'); // 获取两个文本框
		var oRightMsgBox = document.getElementById('rightMsgBox');
		/******创建标题*****/
		var oCreatH3 = document.createElement("h3");
		var oCreatH4 = document.createElement("h3");
		var xiaox = document.createElement('h1');
		var name = ""; // 用户名
		var oTextName = document.createTextNode(name);
		var oTextName1 = document.createTextNode(name);
		oCreatH3.appendChild(oTextName);
		oCreatH4.appendChild(oTextName1);
		var oCreatA = document.createElement("a");
		var oCreatB = document.createElement("a");
		var qqNumber = ""; // qq号
		var oTextQQNumber = document.createTextNode(qqNumber);
		var oTextQQNumber1 = document.createTextNode(qqNumber);
		oCreatA.appendChild(oTextQQNumber);
		oCreatB.appendChild(oTextQQNumber1);
		oCreatH3.appendChild(oCreatA);
		oCreatH4.appendChild(oCreatB);

		/********获取客户端当前时间**********/
		var nowTime = new Date();	
		var hours = nowTime.getHours();
		var mins = nowTime.getMinutes();
		var sec = nowTime.getSeconds();	
		var y = nowTime.getFullYear();    //获取完整的年份(4位,1970-????)
		var m = nowTime.getMonth() + 1;       //获取当前月份(0-11,0代表1月)
		var d = nowTime.getDate();   

		var dateTime = "　" + y + "-" + m + "-" + d + "　　" + hours + ':' + mins + ':'+ sec;
		var dateNode = document.createTextNode(dateTime);
		var dateNode1 = document.createTextNode(dateTime);
		oCreatH3.appendChild(dateNode);
		oCreatH4.appendChild(dateNode1);
		oLeftMsgBox.appendChild(oCreatH3);
		/**********************消息内容***************************/
		var xx = document.getElementById('xx').innerText;
		var addTextNode = document.createTextNode(xx);
		var oCreatP = document.createElement("h1");

		oCreatP.appendChild(addTextNode);
		
		oLeftMsgBox.appendChild(oCreatP);
		/****输入框内文字消失***/
		document.getElementById('text').value = "";
		/********************滚动条始终置底部****************************/
		oLeftMsgBox.scrollTop = oLeftMsgBox.scrollHeight;
		function alertUser1(){
			document.getElementById('text1').style.background = 'url(/lt/images/alert.png) bottom right no-repeat';
		}
		function alertUserOver1(){
			document.getElementById('text1').style.background = "";
			/***********自动获得焦点**************/
			document.getElementById('text1').focus();
		}
	</script>
@endif
	<script src="/admin/js/jquery.min.js"></script>
	<script>
	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	$('#send').click(function(){
		// console.log($('textarea:eq(0)').val());
		$.post('/home/chat/create',{'content':$('textarea:eq(0)').val()},function(date){
			console.log(date);
		});
	})

/*清空输入窗口，获得焦点*/
document.getElementById('text').value = "";

/*******************回车键发送消息*********************/
document.onkeydown = function(){
	var e = window.event || arguments[0];
	if(e.keyCode == 13){
		isFocus();
		/**********解决回车键换行**********/
		e.returnValue = false;
		return false;
	}
}
/********************判断是谁获得焦点************************/
function isFocus(){
    if(document.activeElement.id=='text'){
        sendMsg();
		document.getElementById('text').focus();
    }
    else{
        sendMsg1();
		document.getElementById('text1').focus();
    }
}
/*******************按钮方式发送消息*************************/
// 关闭按钮
document.getElementById('send').onclick = sendMsg;
document.getElementById('close-window').onclick = closeWindow;
function closeWindow(){
	document.getElementById('left-col').style.display = 'none';
	// session(['contentg'=>'']);
	location.replace('/');
}
//

function sendMsg(){
	if(document.getElementById('text').value == ""){
		alertUser();
		setTimeout("alertUserOver()", 1000);
	}
	else{
		var oLeftMsgBox = document.getElementById('leftMsgBox'); // 获取两个文本框
		var oRightMsgBox = document.getElementById('rightMsgBox');
		/******创建标题*****/
		var oCreatH3 = document.createElement("h3");
		var oCreatH4 = document.createElement("h3");
		var name = ""; // 用户名
		var oTextName = document.createTextNode(name);
		var oTextName1 = document.createTextNode(name);
		oCreatH3.appendChild(oTextName);
		oCreatH4.appendChild(oTextName1);
		var oCreatA = document.createElement("a");
		var oCreatB = document.createElement("a");
		var qqNumber = ""; // qq号
		var oTextQQNumber = document.createTextNode(qqNumber);
		var oTextQQNumber1 = document.createTextNode(qqNumber);
		oCreatA.appendChild(oTextQQNumber);
		oCreatB.appendChild(oTextQQNumber1);
		oCreatH3.appendChild(oCreatA);
		oCreatH4.appendChild(oCreatB);

		/********获取客户端当前时间**********/
		var nowTime = new Date();	
		var hours = nowTime.getHours();
		var mins = nowTime.getMinutes();
		var sec = nowTime.getSeconds();	
		var y = nowTime.getFullYear();    //获取完整的年份(4位,1970-????)
		var m = nowTime.getMonth() + 1;       //获取当前月份(0-11,0代表1月)
		var d = nowTime.getDate();   

		var dateTime = "　" + y + "-" + m + "-" + d + "　　" + hours + ':' + mins + ':'+ sec;
		var dateNode = document.createTextNode(dateTime);
		var dateNode1 = document.createTextNode(dateTime);
		oCreatH3.appendChild(dateNode);
		oLeftMsgBox.appendChild(oCreatH3);
		/**********************消息内容***************************/
		var msgValue = document.getElementById('text').value;
		var addTextNode = document.createTextNode(msgValue);
		var addTextNode1 = document.createTextNode(msgValue);
		var oCreatP = document.createElement("h1");
		var oCreatP1 = document.createElement("h1");

		oCreatP.appendChild(addTextNode);
		oCreatP1.appendChild(addTextNode1);
		
		oLeftMsgBox.appendChild(oCreatP1);
		/****输入框内文字消失***/
		document.getElementById('text').value = "";
		/********************滚动条始终置底部****************************/
		oLeftMsgBox.scrollTop = oLeftMsgBox.scrollHeight;
	}
}
function alertUser(){
	document.getElementById('text').style.background = 'url(/lt/images/alert.png) bottom right no-repeat';
}
function alertUserOver(){
	document.getElementById('text').style.background = "";
	/***********自动获得焦点**************/
	document.getElementById('text').focus();
}

/***********************ajax传值******************************/

	</script>
@endsection   