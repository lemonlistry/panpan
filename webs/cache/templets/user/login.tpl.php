<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo PT_SITENAME?> - 会员中心 - 登录</title>
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
		<h2 class="title">用户指南</h2>
		<div class="helpl_list">
			<h4><a href="login.php">用户登录</a></h4>
			<h4><a href="reg.php">用户注册</a></h4>
			<h4><a href="getpwd.php">找回密码</a></h4>
			<h4><a href="<?php echo PT_SITEURL?>">返回首页</a></h4>
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
			<div class="title3"></div>
		</div>
		<div id="reg">
			<div class="regbox">
				<dl><dd>
					<form name="login_form" id="login_form" action="logchk.php" method="post" onsubmit="return loginCheck(this);">
					<input type="hidden" name="comeurl" value="<?php echo PT_SITEURL?>user/index.php"/>
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr class="tit">
							<td class="tit" valign="top"><strong>用户名：</strong></td>
							<td valign="top" width="150">
								<input type="text" name="username" id="username" class="text" size="40" />
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>密　码：</strong></td>
							<td valign="top">
								<input type="password" name="password" id="password" class="text" size="40" />
							</td>
						</tr>
						<tr class="bor_01">
							<td class="tit" valign="top"><strong>Cookie：</strong></td>
							<td>
								<select name="cookietime" id="cookietime">
									<option value="3600">不保存</option>
									<option value="86400">保存一天</option>
									<option value="2592000">保存一月</option>
									<option value="31536000" selected="selected">保存一年</option>
								</select>
							</td>
							<td valign="top"><span style="display: none;"></span></td>
						</tr>
					</table>
					<table>
						<tr class="bor_01">
							<td class="tc" colspan="3" valign="top">
								<input type="submit" name="dosubmit" value="提 交" class="submit"/>
								<input type="button" value="找回密码" onclick="javascript:window.location.href='getpwd.php'" class="submit"/>
							</td>
						</tr>
					</table>
					</form>
				</dd></dl>
			</div>
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. 【<?php echo PT_SITENAME?>】 <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>