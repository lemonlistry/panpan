<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>管理中心 - Powered By 58号街社会化营销系统</title>
<meta name="Author" content="58haojie Team">
<meta name="Copyright" content="58haojie">
<link rel="icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon">
<link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body class="header">
	<div class="body">
		<div class="headerLogo"></div>
		<div class="headerTop">
			<div class="headerLink">
				<span class="welcome">
					<strong><?= isset(Yii::app()->user->username) ? Yii::app()->user->username : ''?></strong>&nbsp;您好!&nbsp;
				</span>
				<a href="pageindex.html" target="mainFrame">后台首页</a>|
            	<a href="#" target="_blank">技术支持</a>|
                <a href="#" target="_blank">关于我们</a>|
                <a href="#" target="_blank">联系我们</a>
			</div>
		</div>
		<div class="headerBottom">
			<div class="headerMenu">
				<div class="menuLeft"></div>
				<ul>
                     <li><a href="<?= $this->createUrl('default/tick')?>" target="menuFrame" hidefocus="true">门票管理</a></li>
                     <li><a href="<?= $this->createUrl('default/financial')?>" target="menuFrame" hidefocus="true">景区管理</a></li>
                     <li><a href="<?= $this->createUrl('default/order')?>" target="menuFrame" hidefocus="true">订单管理</a></li>
                     <li><a href="<?= $this->createUrl('default/service')?>" target="menuFrame" hidefocus="true">新闻管理</a></li>
                     <li><a href="<?= $this->createUrl('default/message')?>" target="menuFrame" hidefocus="true">留言管理</a></li>
                             				
	            </ul>
	            <div class="menuRight"></div>
			</div>
			<div class="userInfo">
                            <a href="<?= $this->createUrl('default/logout')?>" target="_top">
					<span class="logoutIcon">&nbsp;</span>退出&nbsp;
				</a>
			</div>
		</div>
	</div>

</body></html>