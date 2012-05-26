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
				<h2 class="tc fred">必填内容</h2>
				<dl><dd>
					<form name="myform" action="reg3.php" method="post">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr class="tit">
							<td class="tit" valign="top"><strong>用户名：</strong></td>
							<td valign="top">
								<input type="text" name="username" value="" size="15" class="text" require="true" datatype="limit" min="3" max="16" msg="用户名不得少于3个字符或超过16个字符！"/>
							</td>
						</tr>
						<tr class="bor_01">
							<td class="tit" valign="top"><strong>密码：</strong></td>
							<td valign="top">
								<input type="password" name="password" id="new_password" value="" class="text" size="40" require="true" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！" />
							</td>
							<td valign="top">
								<div id="pw_check_1" class="pw_check" style="display:none;"><img src="<?php echo PT_SITEURL?>templets/user/images/ruo.png" alt="弱" border="0" width="152" height="22"></div>
								<div id="pw_check_2" class="pw_check" style="display:none;"><img src="<?php echo PT_SITEURL?>templets/user/images/zhong.png" alt="弱" border="0" width="152" height="22"></div>
								<div id="pw_check_3" class="pw_check" style="display:none;"><img src="<?php echo PT_SITEURL?>templets/user/images/qiang.png" alt="弱" border="0" width="152" height="22"></div>
							</td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>重复密码：</strong></td>
							<td valign="top">
								<input type="password" name="chk_password" value="" class="text" size="40" require="true" datatype="limit|repeat" min="6" max="16" to="password" msg="密码不得少于6个字符或超过16个字符|两次输入的密码不一致" />
							</td>
						</tr>
						<tr class="bor_01">
							<td class="bor_01" valign="top"><strong>邮箱：</strong></td>
							<td align="center">
								<input type="text" name="email" id="email" value="" class="text" size="40" require="true" datatype="email" msg="邮件格式不正确"/>
							</td>
							<td valign="top"><span id="email_notice" class="xieyi">找回密码凭据，注册后不可修改！</span></td>
						</tr>
						<tr class="tit">
							<td class="tit" valign="top"><strong>QQ号码：</strong></td>
							<td valign="top">
								<input type="text" name="qq" value="" class="text" size="40" require="false" regexp="^[0-9-]{5,12}$" datatype="custom" msg="QQ号码应该是5位以上纯数字"/>
							</td>
							<td valign="top"><span id="email_notice" class="xieyi">找回密码凭据，注册后不可修改！</span></td>
						</tr>
						<tr class="bor_01">
							<td valign="top">&nbsp;</td>
							<td valign="top" colspan="2">
								<br /><input type="checkbox" checked="checked">　我已阅读并接受<a href="reg.php" class="xieyi">《<?php echo PT_SITENAME?>用户注册协议》</a><br /><br /><br />
								<div class="spline"></div>
							</td>
						</tr>
					</table>
					<table>
						<tr class="tit">
							<td class="tc" colspan="3" valign="top">
								<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/check.js"></script>
								<input type="submit" name="dosubmit" value="下一步" class="submit"/>
								<input type="reset" name="button2" value="重 置" class="submit"/>
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