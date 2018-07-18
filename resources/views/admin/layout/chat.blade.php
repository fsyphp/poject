<!DOCTYPE html>
<html>
<head>
	<title>javascript实现QQ本地聊天程序-xw素材网</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="/lt/css/style.css" />
</head>
<body>
	<!--main-->
	<div id="main">
		<!--left-col-->
		@section('chat')
		{{--<div id="left-col">
			<!--left-header-->
			<div class="left-header">
				<div class="head-image" style="margin: 12px 0 0 5px;">
					<a href="#"><img src="/lt/images/head1.png"></a>
					<div class="user-info">
						<h3 class="name"><a href="#" style="color: white;">leipeng</a></h3>
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
		</div>--}}

		<!--right-col-->
		<div id="right-col">
			<!--left-header-->
			<div class="right-header">
				<div class="head-image">
					<a href="#"><img src="/lt/images/head.png"></a>
					<div class="user-info">
						<h3 class="name"><a href="#">qiqi</a></h3>
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
		@show


		
	</div>
	<script type="text/javascript" src="/lt/js/chatting.js"></script>
</body>
</html>