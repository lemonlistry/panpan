<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo PT_SITENAME?> - 会员中心 - 注册</title>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/pphelp.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/common.js"></script>
</head>
<body>
<div id="topnav">
	<a href="<?php echo PT_SITEURL?>" id="logo" title="<?php echo PT_SITENAME?>"></a>
	<a href="<?php echo PT_SITEURL?>user/">会员中心</a>|<a href="<?php echo PT_SITEURL?>">返回首页</a>
</div>
<div class="main">
	<div class="mainleft">
		<h2 class="title"><?php echo $username?></h2>
		<div class="loginbox1">
			<dl>
				<dt>
					<img src="
<?php
if(($userimg=='')){
?><?php echo PT_SITEURL?>templets/user/images/face.gif
<?php }else{ ?><?php echo $userimg?>
<?php } ?>
" border="0" height="120" width="120">
				</dt>
				<dd><a href="edit.php">修改资料</a><a href="editpwd.php">修改密码</a></dd>
				<dd><a href="editlevel.php">自助升级</a><a href="logout.php">退出登录</a></dd>
			</dl>
		</div>
		<div class="spline"></div>
		<h2 class="title">用户中心</h2>
		<ul class="question">
			<li><a href="index.php">会员首页</a></li>
			<li><a href="info.php">账户信息</a></li>
			<li><a href="edit.php">资料设置</a></li>
			<li><a href="mark.php">书架管理</a></li>
			<li><a href="automark.php">浏览历史</a></li>
			<li><a href="pm.php">站内消息</a></li>
		</ul>
	</div>
	<div class="mainright">
		<div class="tinfo">
			<div class="title1"></div>
		</div>
		<div class="swbg"> 
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td rowspan="2" valign="top">
						<div class="swicos"></div>
					</td>
					<td style="height: 80px;" class="fred" valign="bottom" width="100%">恭喜您注册<?php echo PT_SITENAME?>成功！</td>
				</tr>
				<tr>
					<td class="blue" valign="top" width="100%">
						<div class="reg_nav">
							<p>10秒后，自动转到【用户中心】</p>
							<script language="javascript">setTimeout("redirect('<?php echo PT_SITEURL?>user/');",10000);</script>
							<p>&nbsp;</p>
							<p>
								<a href="<?php echo PT_SITEURL?>" title="网站首页">【网站首页】</a>
								<a href="<?php echo PT_SITEURL?>user/" title="会员中心">【会员中心】</a>
							</p>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div style="height:100px">
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. 【<?php echo PT_SITENAME?>】 <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>