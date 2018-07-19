@extends('home.layout.chat')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@section('chat')
<form action="">
		<div id="right-col">
			<!--left-header-->
			<div class="right-header">
				<div class="head-image">
					<a href="#"><img src="/lt/images/head.png"></a>
					<div class="user-info">
						<h3 class="name"><a href="#">{{session('uname')}}</a></h3>
						<p style="margin-top: 5px; color: white;"><a href="#"><img src="/lt/images/xin.png"></a>&nbsp;快乐每一天</p>
					</div>  
				</div>
				<div class="some">
					<a href="#"><img src="/lt/images/4.png" /></a>
					<a href="#"><img src="/lt/images/3.png" /></a>
					<a href="#"><img src="/lt/images/2.png" /></a>
					<a href="#"><img src="/lt/images/1.png" /></a>
					<a href="#"><img src="/lt/images/5.png" /></a>
				</div>
			</div>
			<!--msg-box-->
			<div class="left-msg">
				<div id="rightMsgBox" class="right-msg-box">
				</div>
				<div class="right-info-images">
					<img src="/lt/images/A.png" />
					<img src="/lt/images/pen.png" />
					<img src="/lt/images/smile.png" />
					<img src="/lt/images/cat.png" />
				</div>
			</div>
			<!--left-info-->
			<div class="left-info">
			<img src="/lt/images/boy.png" />
			</div>
			<!--left-input-box-->
			<div class="left-input-box">
				<!--textarea-->
				<textarea id="text1" class="text-input">
				</textarea>
				<!--sent-but-->
				<div class="sent-but">
					<input class="but" id="close-window-1" type="button" value="关&nbsp;闭(c)">
					<input class="but" id="send-1" type="button" value="发送(Enter)">
 				</div>
			</div>
		</div>
		{{ csrf_field() }}
</form>
<div id="xx" style="display:none">{{session('contenty')}}</div>
@if(session('contenty') != '')
	<script>
		var oRightMsgBox = document.getElementById('rightMsgBox');
		/******创建标题*****/
		var oCreatH3 = document.createElement("h3");
		var oCreatH4 = document.createElement("h3");
		var xiaox = document.createElement("h6");
		var name = ""; // 用户名
		var oTextName1 = document.createTextNode(name);
		oCreatH4.appendChild(oTextName1);
		var oCreatA = document.createElement("a");
		var oCreatB = document.createElement("a");
		var qqNumber = ""; // 电话号
		// console.log(xx);
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
		var dateNode1 = document.createTextNode(dateTime);
		oCreatH4.appendChild(dateNode1);
		oRightMsgBox.appendChild(oCreatH4);
		/**********************消息内容***************************/
		var xx = document.getElementById('xx').innerText;
		var addTextNode = document.createTextNode(xx);
		var oCreatP = document.createElement("h1");

		oCreatP.appendChild(addTextNode);
		
		oRightMsgBox.appendChild(oCreatP);
		/********************滚动条始终置底部****************************/
		oRightMsgBox.scrollTop = oRightMsgBox.scrollHeight;


		function alertUser(){
			document.getElementById('text').style.background = 'url(/lt/images/alert.png) bottom right no-repeat';
		}
		function alertUserOver(){
			document.getElementById('text').style.background = "";
			/***********自动获得焦点**************/
			document.getElementById('text').focus();
		}
	</script>
@endif
<script src="/admin/js/jquery.min.js"></script>
<script>
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	$('#send-1').click(function(){
		// console.log($('textarea:eq(0)').val());
		$.post('/admin/chat/create',{'content':$('textarea:eq(0)').val()},function(date){
			console.log(date);
		});
	})
	/*清空输入窗口，获得焦点*/
document.getElementById('text1').value = "";

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
document.getElementById('close-window-1').onclick = closeWindow1;

function closeWindow1(){
	document.getElementById('right-col').style.display = 'none';
	// session('contenty'=>'');
	location.replace('/admin/user/index');
}
//

document.getElementById('send-1').onclick = sendMsg1;
function sendMsg1(){
	if(document.getElementById('text1').value == ""){
		alertUser1();
		setTimeout("alertUserOver1()", 1000);
	}
	else{
		var oRightMsgBox = document.getElementById('rightMsgBox');
		/******创建标题*****/
		var oCreatH3 = document.createElement("h4");
		var oCreatH4 = document.createElement("h4");
		var name = "";
		var oTextName = document.createTextNode(name);
		var oTextName1 = document.createTextNode(name);
		oCreatH3.appendChild(oTextName);
		oCreatH4.appendChild(oTextName1);
		var oCreatA = document.createElement("a");
		var oCreatB = document.createElement("a");
		var qqNumber = "";
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
		oRightMsgBox.appendChild(oCreatH4);
		/**********************消息内容***************************/
		var msgValue = document.getElementById('text1').value;
		var addTextNode = document.createTextNode(msgValue);
		var addTextNode1 = document.createTextNode(msgValue);
		var oCreatP = document.createElement("h2");
		var oCreatP1 = document.createElement("h2");

		oCreatP.appendChild(addTextNode);
		oCreatP1.appendChild(addTextNode1);
		
		oRightMsgBox.appendChild(oCreatP);
		/****输入框内文字消失***/
		document.getElementById('text1').value = "";
		/********************滚动条始终置底部****************************/
		oRightMsgBox.scrollTop = oRightMsgBox.scrollHeight;
	}
}
function alertUser1(){
	document.getElementById('text1').style.background = 'url(/lt/images/alert.png) bottom right no-repeat';
}
function alertUserOver1(){
	document.getElementById('text1').style.background = "";
	/***********自动获得焦点**************/
	document.getElementById('text1').focus();
}

</script>
@endsection   
