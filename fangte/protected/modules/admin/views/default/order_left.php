<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>供应商管理 - Powered By 58号街社会化营销系统</title>
<meta name="Author" content="58haojie Team">
<meta name="Copyright" content="58haojie">
<link rel="icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body class="menu">
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
		
		
	</div>

</body></html>