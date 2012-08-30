<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?php echo PT_SITENAME?> - 会员中心 - 首页</title>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/portal.css">
<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL?>templets/user/css/pphelp.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/user/js/common.js"></script>
</head>
<body>
<div id="topnav">
	<a href="<?php echo PT_SITEURL?>" id="logo" title="<?php echo PT_SITENAME?>"></a>
	<a href="<?php echo PT_SITEURL?>user/">会员中心</a>|<a href="<?php echo PT_SITEURL?>">返回首页</a>
</div>
<div class="bodycon">
	<div class="spline"></div>
	<div class="wrap">
		<div id="pt_boxidx">
			<div id="pt_title">
				<ul>
					<li id="phome"><a href="index.php">首页</a></li>
					<li id="pinfo">
						<a id="infobtn" href="info.php">账户</a>
						<ul id="pinfopdm" style="visibility: hidden;" class="pdmenu">
							<li><a href="info.php">账户信息</a></li>
							<li><a href="edit.php">修改资料</a></li>
							<li><a href="editpwd.php">修改密码</a></li>
							<li><a href="editlevel.php">自助升级</a></li>
						</ul>
					</li>
					<li id="pmark">
						<a id="markbtn" href="mark.php">书架</a>
						<ul id="pmarkpdm" style="visibility: hidden;" class="pdmenu">
							<li><a href="mark.php">书架管理</a></li>
							<li><a href="usermark.php">会员书架</a></li>
							<li><a href="automark.php">浏览历史</a></li>
						</ul>
					</li>
					<li id="pmsg">
						<a id="msgbtn" href="pm.php">消息</a>
						<ul id="pmsgpdm" style="visibility: hidden;" class="pdmenu">
							<li><a href="pm.php">收件箱</a></li>
							<li><a href="pmsend.php">发件箱</a></li>
							<li><a href="pmnew.php">发新消息</a></li>
						</ul>
					</li>
<?php
if(($username == '')){
?>
<li id="plogin"><a href="login.php">会员登录</a></li>
<?php }else{ ?>
<li id="plogout"><a href="logout.php">退出登录</a></li>
<?php } ?>
</ul>
				<span><a href="<?php echo PT_SITEURL?>">【<?php echo PT_SITENAME?>】</a></span>
			</div>
			<div id="pt_side">
				<div id="pt_face">
<?php
if(($username == '')){
?>
<dl><dt><a href="login.php"><img id="user_face_img" src="<?php echo PT_SITEURL?>templets/user/images/face.gif" alt="登录" border="0" height="120" width="120"></a></dt><dd><a href="login.php">登录</a></dd></dl>
<?php }else{ ?>
<dl><dt><a href="index.php"><img id="user_face_img" src="
<?php
if(($userimg=='')){
?><?php echo PT_SITEURL?>templets/user/images/face.gif
<?php }else{ ?><?php echo $userimg?>
<?php } ?>
" alt="<?php echo $username?>" border="0" height="120" width="120"></a></dt><dd><a href="index.php"><?php echo $username?></a></dd></dl>
<?php } ?>
</div>
				<div id="ptmenu">
					<ul>
						<li id="myinvite"><a href="index.php" title="首页">首页</a><span class="new"></span></li>
						<li id="myaccount"><a href="info.php" title="账户">账户</a></li>
						<li id="mycomic"><a href="edit.php" title="设置">设置</a></li>
						<li id="mybookcase"><a href="mark.php" title="书架">书架</a></li>
						<li id="myfootmark"><a href="automark.php" title="足迹">足迹</a></li>
						<li id="mymsg"><a href="pm.php" title="消息">消息</a></li>
						<li id="myfrd"><a href="javascript:;" onclick="novalue()" title="好友">好友</a></li>
						<li id="myguest"><a href="javascript:;" onclick="novalue()" title="贡献">贡献</a></li>
						<li id="myfav"><a href="javascript:;" onclick="addfavor('<?php echo PT_SITEURL?>','<?php echo PT_SITENAME?>')" title="收藏">收藏</a></li>
						<li id="myhelp"><a href="logout.php" title="退出">退出</a></li>
					</ul>
				</div>
			</div>
<div id=pt_mainw>
	<div id=pinfo_banner><h1>我的信息</h1></div>
	<div id=nav3>
		<a href="index.php" class="here">用户中心</a>
	</div>
	<div class=infoone style="margin: 0px">
		<div class=infotitle2><h2>登录提示</h2></div>
		<div class=chghob>
			<div class=chgjg>
				<div class=chgp1 style="width: 600px">您好，<strong><?php echo $username?></strong>！　您的上次登录是在：<strong><?php echo $logtime?></strong>　登录IP：<strong><?php echo $logip?></strong></div>
				<div class=cl></div>
			</div>
			<div class=cl></div>
		</div>
		<div class=infotitle2><h2>用户信息</h2></div>
		<div class=chghob>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">当前等级：</div>
				<div class=chgp3 style="width: 500px"><input type="text" value="<?php echo $userlevel?>（等级<?php echo $userlv?>）" size="15" readonly="readonly"/></div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">当前积分：</div>
				<div class=chgp3 style="width: 500px"><input type="text" value="<?php echo $userpoint?>" size="15" readonly="readonly"/></div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">升级需要积分：</div>
				<div class=chgp3 style="width: 500px"><input type="text" value="<?php echo $usernextlevelpoint?>" size="15" readonly="readonly"/>　<?php echo $levelupmsg?></div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">我的书架：</div>
				<div class=chgp3 style="width: 500px">您当前共有永久书架<a href="mark.php"><font color="red"> <b><?php echo $usermarkc?></b> </font></a>个，每个书架可藏书<font color="red"> <b><?php echo $usermarknum?></b> </font>本</div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">我的推荐：</div>
				<div class=chgp3 style="width: 500px">您每日拥有推荐票数<font color="red"> <b><?php echo $uservotenum?></b> </font>张，今日剩余推荐票<font color="red"> <b><?php echo $uservotenum-$votenum?></b> </font>张</div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">我的消息：</div>
				<div class=chgp3 style="width: 500px">您当前共有未读消息<a href="pm.php"><font color="red"> <b><?php echo $pmnum?></b> </font></a>条。</div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">我的好友：</div>
				<div class=chgp3 style="width: 500px">您当前共有好友<a href="friend.php"><font color="red"> <b>0</b> </font></a>位</div>
				<div class=cl></div>
			</div>
			<div class=chgjg>
				<div class=chgp1 style="width: 150px">我的贡献：</div>
				<div class=chgp3 style="width: 500px">您当前贡献为<a href="myp.php"><font color="red"> <b><?php echo $comepoint?></b> </font></a>点，共邀请<font color="red"> <b><?php echo $comenum?></b> </font>位朋友来到<?php echo PT_SITENAME?></div>
				<div class=cl></div>
			</div>
			<div class=cl></div>
		</div>
	</div>
</div>
<div class=cl></div>
</div>
	</div>
	<div class="spline"></div>
</div>
<div class="copyright">Copyright &copy; 2011 <a href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?> </a> All Rights Reserved. 【<?php echo PT_SITENAME?>】 <script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
</body>
</html>