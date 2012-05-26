<?php
include dirname(__FILE__).'/data/config.php';
?>
<link href="<?php echo PT_SITEURL;?>templets/default/css/basic.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL;?>templets/default/css/header.css" type="text/css" rel="stylesheet"/>
<body style="background-color: #fff;">
<div id="login" style="float: right;">
<?php
if (isset($_COOKIE['pt_username'])){
$username=$_COOKIE['pt_username'];
$userlv=$_COOKIE['pt_userlv'];
$pmnum=$_COOKIE['pt_userpmnum'];
?>
<a class="asign" title="修改资料" href="<?php echo PT_SITEURL;?>user/index.php" target="_blank"><em></em>
<div><?php echo $username?><span class="i_vote">（<font color="#cc0000" id="userVote"><?php echo $userlv?></font>）</span></div>
<label></label>
</a>
<a class="abook" target="_blank" href="<?php echo PT_SITEURL;?>user/usermark.php" title="我的书架"><em></em>
<div>书架</div>
<label></label>
</a>
<a class="amsg" target="_blank" href="<?php echo PT_SITEURL;?>user/pm.php" title="我的短信息"><em></em>
<div>（<font color="#cc0000" id="userMsg"><?php echo $pmnum?> 条未读</font>）</div>
<label></label>
</a>
<a class="aout header_logout" href="<?php echo PT_SITEURL;?>user/logout.php?logintype=logfrm&url=<?php echo PT_SITEURL;?>login.php"><div>退　出</div><label></label></a>
<?php
}else {
?>
<form action="<?php echo PT_SITEURL;?>user/logchk.php" method="post" id="login_form">
<span>用户名：</span><input type="text" class="text" size="15" name="username"/>
<span>密　码：</span><input type="password" class="text" size="15" name="password"/>
<span>Cookie：</span><select name="cookietime" id="cookietime"><option value="3600" selected="selected">不保存</option><option value="86400">保存一天</option><option value="2592000" >保存一月</option><option value="31536000">保存一年</option></select>
<input type="submit" value="登　录" name="login" id="formtj" class="adenglu" />
<input value="logfrm" name="logintype" type="hidden"/>
<input value="<?php echo PT_SITEURL;?>login.php" name="comeurl" type="hidden"/>
</form>
<a href="<?php echo PT_SITEURL;?>user/reg.php" class="azhuce" target="_blank">
<div>注　册</div>
<label></label>
</a>
<a href="<?php echo PT_SITEURL;?>user/getpwd.php" class="awjmm" target="_blank">
<div>忘记密码</div>
<label></label>
</a>
<?php
}
?>
</div>
</body>