<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>客服管理</title>
<meta name="Author" content="58haojie Team">
<meta name="Copyright" content="58haojie">
<link rel="icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body class="menu"><div id="tipWindow" class="tipWindow"><span class="icon">&nbsp;</span><span class="messageText"></span></div><div id="messageWindow" class="messageWindow jqmID2"><div class="windowTop"><div class="windowTitle">提示信息&nbsp;</div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="messageContent"><span class="icon">&nbsp;</span><span class="messageText"></span></div><input class="formButton messageButton windowClose" value="确  定" hidefocus="true" type="button"></div><div class="windowBottom"></div></div><div id="contentWindow" class="contentWindow jqmID1"><div class="windowTop"><div class="windowTitle"></div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="windowContent"></div></div><div class="windowBottom"></div></div>
	<div class="menuContent">
            <dl>
			<dt>
				<span>订单管理</span>
			</dt>
			<dd>
                            <a href="<?= $this->createUrl('order/index?status=0')?>" target="mainFrame">预约成功列表</a>
			</dd>
			<dd>
				<a href="<?= $this->createUrl('order/index?status=1')?>" target="mainFrame">交易完成列表</a>
			</dd>
                    <dd>
				<a href="<?= $this->createUrl('order/index?status=2')?>" target="mainFrame">取消预约列表</a>
			</dd>
		</dl>
		<dl>
			<dt>
				<span>新闻类型管理</span>
			</dt>
			<dd>
                            <a href="<?= $this->createUrl('news/class')?>" target="mainFrame">类型列表</a>
			</dd>
			<dd>
				<a href="<?= $this->createUrl('news/addclass')?>" target="mainFrame">添加类型</a>
			</dd>
		</dl>
		
		<dl>
			<dt>
				<span>新闻管理</span>
			</dt>
			<dd>
				<a href="<?=$this->createUrl('news/list')?>" target="mainFrame">新闻列表</a>
			</dd>		
			<dd>
				<a href="<?=$this->createUrl('news/add')?>" target="mainFrame">添加新闻</a>
			</dd>
		</dl>
        
        <!--<dl>
			<dt>
				<span>退款管理</span>
			</dt>
                        <dd>
				<a href="<?= $this->createUrl('arealist/examine')?>" target="mainFrame">退款申请列表 </a>
			</dd>
		</dl>-->
	</div>

</body></html>