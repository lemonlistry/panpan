<?php
include 'conn.php';
include '../data/config.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    $name=$_SESSION['adminname'];
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<{$Charset}>" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>PT小说后台管理 </title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="js/prototype.lite.js" type="text/javascript"></script>
<script src="js/moo.fx.js" type="text/javascript"></script>
<script src="js/moo.fx.pack.js" type="text/javascript"></script>
<style>
	html { overflow-y:hidden; }
</style>
<script type="text/javascript">
window.onresize=function(){
	setWorkspace();
}
function showsrc(q){		
	var dllist=document.getElementById("container").getElementsByTagName("dl");
	var lilist=document.getElementById("nav").getElementsByTagName("li");
	for(i=0;i<lilist.length;i++){
		if(i==q){ 
			lilist[i].className="link actived";
		}else lilist[i].className="link";
	}
	for(j=0;j<dllist.length;j++){
		if(j==q){ 
			dllist[j].className="jx";
		}else dllist[j].className="hid";
	}
	var contents = document.getElementsByClassName('content');
	var toggles = document.getElementsByClassName('type');
	var myAccordion = new fx.Accordion(
		toggles, contents, {opacity: true, duration: 400}
	);
	var shownum=new Array()
	shownum[0]="0"
	shownum[1]="4"
	shownum[2]="7"
	shownum[3]="9"
	shownum[4]="10"
	shownum[5]="12"
	shownum[6]="14"
	shownum[7]="17"
	myAccordion.showThisHideOpen(contents[shownum[q]]);
}
</script>
</head>
<body style="background: url(images/content.gif) repeat-y;">
<div id="head">
	<div id="logo">
		<a href="http://www.ptcms.com/" target="_blank"><img src="images/logo.gif" alt="ptcms" border="0" /></a>
	</div>
    <div id="menu">
		<span>您好，<strong><?php echo $name;?></strong> 
		[ <a href="config_adminuser.php" title="账号设置" target="workspace">账号设置</a>，<a href="logout.php">退出</a> ]</span>
		<a href="javascript:workspace.location.reload();" class="menu_btn1" >刷新页面</a>
		<a href="welcome.php" class="menu_btn1" title="后台首页" target="workspace">后台首页</a>
		<a href="../" class="menu_btn1" title="查看站点" target="_blank">查看站点</a>
		<a href="http://www.ptcms.com" class="menu_btn1" title="官方网站" target="_blank">官方网站</a>
		<a href="http://bbs.ptcms.com/" class="menu_btn1" title="官方论坛" target="_blank">官方论坛</a>
		<a href="javascript:void(0);" id="back_btn"><img src="images/tiring_room_nav.gif" /></a>
    </div>
    <ul id="nav">
		<li class="link actived" onclick="javascript:showsrc(0)">后台首页</li>
		<li class="link" onclick="javascript:showsrc(1)">系统设置</li>
		<li class="link" onclick="javascript:showsrc(2)">广告链接</li>
		<li class="link" onclick="javascript:showsrc(3)">用户管理</li>
		<li class="link" onclick="javascript:showsrc(4)">缓存管理</li>
		<li class="link" onclick="javascript:showsrc(5)">模板规则</li>
		<li class="link" onclick="javascript:showsrc(6)">系统工具</li>
		<li class="link" onclick="javascript:showsrc(7)">站长中心</li>
	</ul>
    <div id="headBg"></div>
</div>
<div id="content">
    <div id="left">
		<table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
			<tr>
				<td width="182" valign="top">
					<div id="container">
						<dl id="0" class="jx">
							<h1 class="type" name="type"><a href="javascript:void(0)">常用设置</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_base.php" target="workspace">参数设置</a></li>
									<li><a href="config_function.php" target="workspace">功能开关</a></li>
									<li><a href="set_tpl.php" target="workspace">模板设置</a></li>
									<li><a href="set_rule.php" target="workspace">规则设置</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">常用管理</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="ad_list.php" target="workspace">广告管理</a></li>
									<li><a href="link_list.php" target="workspace">链接管理</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">缓存清理</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
									</table>
								<ul class="MM">
                                    <li><a href="cache_delblock.php" target="workspace">清理区块缓存</a></li>
                                    <li><a href="cache_deldata.php" target="workspace">清理数据缓存</a></li>
									<li><a href="cache_deltpl.php" target="workspace">清理模板缓存</a></li>
									<li><a href="cache_delstatic.php" target="workspace">清理静态缓存</a></li>
                                    <li><a href="cache_delimg.php" target="workspace">清理图片缓存</a></li>
                                    <li><a href="cache_delbook.php" target="workspace">清理书籍缓存</a></li>
                                    <li><a href="cache_delall.php" target="workspace">清理所有缓存</a></li>
                                    <li><a href="cache_size.php" target="workspace">缓存大小统计</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">使用帮助</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
									<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="http://www.ptcms.com/" target="workspace">目录结构</a></li>
									<li><a href="http://www.ptcms.com/" target="workspace">模板标签</a></li>
									<li><a href="http://www.ptcms.com/" target="workspace">官方网站</a></li>
									<li><a href="http://bbs.ptcms.com/" target="workspace">官方论坛</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="1">
							<h1 class="type" name="type"><a href="javascript:void(0)">参数设置</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_base.php" target="workspace">基本参数</a></li>
									<li><a href="config_dir.php" target="workspace">目录设置</a></li>
                                    <li><a href="config_wap.php" target="workspace">WAP推荐设置</a></li>
                                    <li><a href="config_adminuser.php" target="workspace">管理员账号</a></li>
									<li><a href="config_key.php" target="workspace">授权码录入</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">功能设置</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_function.php" target="workspace">功能开关</a></li>
									<li><a href="config_filename.php" target="workspace">动态名设置</a></li>
									<li><a href="config_reurl.php" target="workspace">伪静态设置</a></li>
									<li><a href="config_page.php" target="workspace">页面信息设置</a></li>
									<li><a href="config_mark.php" target="workspace">水印设置</a></li>
                                    <li><a href="config_randstr.php" target="workspace">混淆字设置</a></li>
                                    <li><a href="config_banbook.php" target="workspace">图书屏蔽管理</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">内容替换</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_chapterreplace.php" target="workspace">章节页内容替换</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="2">
							<h1 class="type" name="type"><a href="javascript:void(0)">常规广告管理</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="ad_add.php" target="workspace">添加广告</a></li>
									<li><a href="ad_list.php" target="workspace">广告列表</a></li>
                                    <li><a href="ad_powerwin.php" target="workspace">超级弹窗</a></li>									
								</ul>
							</div>
                            <h1 class="type" name="type"><a href="javascript:void(0)">友情链接</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="link_add.php" target="workspace">增加链接</a></li>
									<li><a href="link_list.php" target="workspace">链接列表</a></li>
                                    <li><a href="link_num.php" target="workspace">链接排序</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="3">
							<h1 class="type" name="type"><a href="javascript:void(0)">用户管理</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="config_user.php" target="workspace">参数设置</a></li>
									<li><a href="user_add.php" target="workspace">添加用户</a></li>
									<li><a href="user_list.php" target="workspace">用户列表</a></li>
									<li><a href="user_edit.php" target="workspace">编辑用户</a></li>
									<li><a href="user_point.php" target="workspace">积分管理</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="4">
							<h1 class="type" name="type"><a href="javascript:void(0)">缓存管理</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="cache_time.php" target="workspace">缓存间隔设置</a></li>
                                    <li><a href="cache_index.php" target="workspace">刷新首页</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">缓存清理</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="cache_delblock.php" target="workspace">清理区块缓存</a></li>
									<li><a href="cache_deldata.php" target="workspace">清理数据缓存</a></li>
									<li><a href="cache_deltpl.php" target="workspace">清理模板缓存</a></li>
									<li><a href="cache_delstatic.php" target="workspace">清理静态缓存</a></li>
									<li><a href="cache_delimg.php" target="workspace">清理图片缓存</a></li>
									<li><a href="cache_delbook.php" target="workspace">清理书籍缓存</a></li>
									<li><a href="cache_delall.php" target="workspace">清理所有缓存</a></li>
									<li><a href="cache_size.php" target="workspace">缓存大小统计</a></li>
								</ul>
							</div>
						</dl>
						<dl class="hid" id="5">
							<h1 class="type"><a href="javascript:void(0)">模板管理</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="set_tpl.php" target="workspace">模板设置</a></li>
									<li><a href="filemanage.php?action=open&filename=../<?php echo PT_TPLDIR.PT_TPL?>" target="workspace">模板编辑</a></li>
									<li><a href="set_block.php" target="workspace">首页区块</a></li>                                    
                                    <li><a href="set_blocklist.php" target="workspace">全局区块</a></li>
                                    <li><a href="set_blockreplace.php" target="workspace">区块修正</a></li>
									<li><a href="filemanage.php?action=open&filename=../cache/<?php echo PT_TPLDIR.PT_TPL?>" target="workspace">模板缓存</a></li>
								</ul>
							</div>
							<h1 class="type"><a href="javascript:void(0)">规则管理</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="set_rule.php" target="workspace">规则设置</a></li>
									<li><a href="filemanage.php?action=open&filename=../<?php echo PT_RULESDIR.PT_RULE?>" target="workspace">规则编辑</a></li>
									<li><a href="set_sort.php" target="workspace">分类管理</a></li>
								</ul>
							</div>
						</dl>
						<dl  class="hid" id="6">
							<h1 class="type"><a href="javascript:void(0)">文件管理</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="filemanage.php?action=open&filename=.." target="workspace">文件管理器</a></li>
									<li><a href="filemanage.php?action=open&filename=../<?php echo PT_TPLDIR.PT_TPL?>" target="workspace">模板在线管理</a></li>
									<li><a href="filemanage.php?action=open&filename=../<?php echo PT_RULESDIR.PT_RULE?>" target="workspace">规则在线管理</a></li>
								</ul>
							</div>
							<h1 class="type"><a href="javascript:void(0)">网站公告</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="ann_add.php" target="workspace">添加公告</a></li>
									<li><a href="ann_list.php" target="workspace">公告列表</a></li>
								</ul>
							</div>
							<h1 class="type"><a href="javascript:void(0)">蜘蛛记录</a></h1>
								<div class="content">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
									<ul class="MM">
										<li><a href="bot_set.php" target="workspace">蜘蛛功能设置</a></li>
										<li><a href="bot_last.php" target="workspace">最近来访蜘蛛</a></li>
                                        <li><a href="bot_day.php" target="workspace">单日来访记录</a></li>
                                        <li><a href="bot_date.php" target="workspace">按时间段记录</a></li>
                                        <li><a href="bot_reset.php" target="workspace">数据初始化</a></li>
									</ul>
							</div>
						</dl>
						<dl class="hid" id="7">
							<h1 class="type"><a href="javascript:void(0)">查询工具</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="../plus/check/dircheck.php" target="workspace">目录检测</a></li>
									<li><a href="../plus/check/phpcheck.php" target="workspace">函数检测</a></li>
									<li><a href="phpinfo.php" target="workspace">PHP探针</a></li>
								</ul>
							</div>
							<h1 class="type"><a href="javascript:void(0)">运营工具</a></h1>
							<div class="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="http://www.ptcms.com/" target="workspace">等待加入</a></li>
								</ul>
							</div>
							<h1 class="type" name="type"><a href="javascript:void(0)">使用帮助</a></h1>
							<div class="content" name="content">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td><img src="images/menu_topline.gif" width="182" height="5" /></td>
									</tr>
								</table>
								<ul class="MM">
									<li><a href="http://www.ptcms.com/" target="workspace">目录结构</a></li>
									<li><a href="http://www.ptcms.com/" target="workspace">模板标签</a></li>
									<li><a href="http://www.ptcms.com/" target="workspace">官方网站</a></li>
									<li><a href="http://bbs.ptcms.com/" target="workspace">官方论坛</a></li>
								</ul>
							</div>
						</dl>
						<script type="text/javascript">
						var contents = document.getElementsByClassName('content');
						var toggles = document.getElementsByClassName('type');
						var myAccordion = new fx.Accordion(
							toggles, contents, {opacity: true, duration: 400}
						);
						myAccordion.showThisHideOpen(contents[0]);
						</script>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div id="right">
		<iframe frameborder="0"src="welcome.php" id="workspace" name="workspace" style="margin-left:5px"></iframe>
		<script type="text/javascript">
		setWorkspace(); 
		function setWorkspace(){
		var Height=document.documentElement.clientHeight;
		var Width=document.body.clientWidth;
		document.getElementById("workspace").style.height=(Height-100)+"px";
		document.getElementById("workspace").style.width=(Width-190)+"px";
		}
		</script>
	</div>
</div>
<div class="back_nav">
	<div class="back_nav_list">
		<dl>
			<dt>PTcms</dt>
			<dd><a href="http://www.ptcms.com/" target="_blank">PT小偷</a></dd>
			<dd><a href="http://bbs.ptcms.com/" target="_blank">程序帮助</a></dd>
			<dd><a href="http://bbs.ptcms.com/" target="_blank">官方论坛</a></dd>
			<dd><a href="javascript:void(0);" onclick="window.open('http://www.ptcms.com/', 'Error', 'width=520,height=320,resizable=0,scrollbars=no');">程序报错</a></dd>
		</dl>
		<dl>
			<dt>设置</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('base_setting','setting');none_fn();">站点设置</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('base_config','setting');none_fn();">后台设置</a></dd>
		</dl>
		<dl>
			<dt>广告</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('ads_list','ads');none_fn();">广告列表</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('ads_add','ads');none_fn();">添加广告</a></dd>
		</dl>
		<dl>
			<dt>链接</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('links_list','links');none_fn();">链接列表</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('links_add','links');none_fn();">增加链接</a></dd>
		</dl>
		<dl>
			<dt>模板</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('template_list','templates');none_fn();">页面模板管理</a></dd>
		</dl>
		<dl>
			<dt>帐号</dt>
			<dd><a href="javascript:void(0);" onclick="openItem('admin_list','admin');none_fn();">管理员管理</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('admin_add','admin');none_fn();">添加管理员</a></dd>
			<dd><a href="javascript:void(0);" onclick="openItem('log_list','admin');none_fn();">操作日志管理</a></dd>
		</dl>
	</div>
	<div class="shadow"></div>
	<div class="close_float"><img src="images/close2.gif" /></div>
</div>
</body>
</html>