<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>显示/隐藏菜单 - Powered By 58号街社会化营销系统</title>
<meta name="Author" content="58haojie Team">
<meta name="Copyright" content="58haojie">
<link rel="icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon">
<link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/jquery.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl?>/js/jquery.js"></script>
<script type="text/javascript">
$().ready(function() {

	$(".main").click( function() {
		var mainFrameset = window.parent.window.document.getElementById("mainFrameset");
		if(mainFrameset.cols == "130,6,*") {
			mainFrameset.cols = "0,6,*";
			$(".main").removeClass("leftArrow");
			$(".main").addClass("rightArrow");
		} else {
			mainFrameset.cols = "130,6,*";
			$(".main").removeClass("rightArrow");
			$(".main").addClass("leftArrow");
		}
	})

})
</script>
<style type="text/css"> 
<!--
html, body {
	height: 100%;
	overflow: hidden;
}
-->
</style>
</head>
<body class="middle"><div id="tipWindow" class="tipWindow"><span class="icon">&nbsp;</span><span class="messageText"></span></div><div id="messageWindow" class="messageWindow jqmID2"><div class="windowTop"><div class="windowTitle">提示信息&nbsp;</div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="messageContent"><span class="icon">&nbsp;</span><span class="messageText"></span></div><input class="formButton messageButton windowClose" value="确  定" hidefocus="true" type="button"></div><div class="windowBottom"></div></div><div id="contentWindow" class="contentWindow jqmID1"><div class="windowTop"><div class="windowTitle"></div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="windowContent"></div></div><div class="windowBottom"></div></div>
	<div class="main leftArrow"></div>

</body></html>