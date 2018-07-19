/*清空输入窗口，获得焦点*/
document.getElementById('text').value = "";
//document.getElementById('text').focus();
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
document.getElementById('send').onclick = sendMsg;
document.getElementById('close-window').onclick = closeWindow;
document.getElementById('close-window-1').onclick = closeWindow1;
function closeWindow(){
	document.getElementById('left-col').style.display = 'none';
}
function closeWindow1(){
	document.getElementById('right-col').style.display = 'none';
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
		var name = "leipeng("; // 用户名
		var oTextName = document.createTextNode(name);
		var oTextName1 = document.createTextNode(name);
		oCreatH3.appendChild(oTextName);
		oCreatH4.appendChild(oTextName1);
		var oCreatA = document.createElement("a");
		var oCreatB = document.createElement("a");
		var qqNumber = "121644750"; // qq号
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

		var dateTime = ")　" + y + "-" + m + "-" + d + "　　" + hours + ':' + mins + ':'+ sec;
		var dateNode = document.createTextNode(dateTime);
		var dateNode1 = document.createTextNode(dateTime);
		oCreatH3.appendChild(dateNode);
		oCreatH4.appendChild(dateNode1);
		oLeftMsgBox.appendChild(oCreatH3);
		oRightMsgBox.appendChild(oCreatH4);
		/**********************消息内容***************************/
		var msgValue = document.getElementById('text').value;
		var addTextNode = document.createTextNode(msgValue);
		var addTextNode1 = document.createTextNode(msgValue);
		var oCreatP = document.createElement("h1");
		var oCreatP1 = document.createElement("h1");

		oCreatP.appendChild(addTextNode);
		oCreatP1.appendChild(addTextNode1);
		
		oRightMsgBox.appendChild(oCreatP);
		oLeftMsgBox.appendChild(oCreatP1);
		/****输入框内文字消失***/
		document.getElementById('text').value = "";
		/********************滚动条始终置底部****************************/
		oLeftMsgBox.scrollTop = oLeftMsgBox.scrollHeight;
		oRightMsgBox.scrollTop = oRightMsgBox.scrollHeight;
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

/***********************接收消息者******************************/
document.getElementById('send-1').onclick = sendMsg1;
function sendMsg1(){
	if(document.getElementById('text1').value == ""){
		alertUser1();
		setTimeout("alertUserOver1()", 1000);
	}
	else{
		var oLeftMsgBox = document.getElementById('leftMsgBox');
		var oRightMsgBox = document.getElementById('rightMsgBox');
		/******创建标题*****/
		var oCreatH3 = document.createElement("h4");
		var oCreatH4 = document.createElement("h4");
		var name = "willqiqi(";
		var oTextName = document.createTextNode(name);
		var oTextName1 = document.createTextNode(name);
		oCreatH3.appendChild(oTextName);
		oCreatH4.appendChild(oTextName1);
		var oCreatA = document.createElement("a");
		var oCreatB = document.createElement("a");
		var qqNumber = "888888888";
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

		var dateTime = ")　" + y + "-" + m + "-" + d + "　　" + hours + ':' + mins + ':'+ sec;
		var dateNode = document.createTextNode(dateTime);
		var dateNode1 = document.createTextNode(dateTime);

		oCreatH3.appendChild(dateNode);
		oCreatH4.appendChild(dateNode1);
		oLeftMsgBox.appendChild(oCreatH3);
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
		oLeftMsgBox.appendChild(oCreatP1);
		/****输入框内文字消失***/
		document.getElementById('text1').value = "";
		/********************滚动条始终置底部****************************/
		oLeftMsgBox.scrollTop = oLeftMsgBox.scrollHeight;
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
