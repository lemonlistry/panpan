<?php
include 'conn.php';
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<{$Charset}>" />
<title>欢迎页面</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/facebox.js" type="text/javascript"></script>
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script>
function setUpdateAlert(d)
{
$.ajax({
    url: 'conn.php?do=set_update_alert&type='+d,
    type: 'GET',
    dataType: 'html',
    timeout: 1000,
    error: function(){
        alert('Error loading XML document');
    },
    success: function(data){
        $.facebox.close();
    }
});
}
</script>
<?php
include "./info.php";
$time=$_SERVER['REQUEST_TIME'];
if(is_file("./msg.php")){
	$uptime = filemtime("./msg.php");
}else{
	$needupdate = true;
}
if($needupdate or $time-$uptime>3600){
	$update = file_get_contents($ptbook['updateurl']);
	if(!empty($update)){
		$str = "<?php\n";
		$str .= $update;
		$str .= "\n?>";
		$pt->writeto("./msg.php", $str);
	}
}
include "./msg.php";
if($time>$ptbook['warn_time'] and $release>$ptbook['warn_release'] and $release>$ptbook['release']){
?>
<script>
jQuery(document).ready(function($) {
	$.facebox.settings.loadingImage = 'images/loading.gif'; 
	$.facebox('<div style="background-color:transparent ;"><span style="font-weight: bold;"><center><h1><?php echo $infotitle?></h1></center></span><br><span><?php echo $infocon?></span></div>'+"<div align='center'><input type='button' id='NoUpdateAlert' value='不再提醒' onclick='setUpdateAlert(1);'>&nbsp;&nbsp;<input type='button' id='AlertAfterWeek' value='明天再说' onclick='setUpdateAlert(2);'>&nbsp;&nbsp;<input type='button' id='AlertAfterWeek' value='关闭' onclick='$.facebox.close();'></div>");
})
</script>
<?php
}
?>
</head>
<body style="overflow-x:hidden">
<div id="rightWelcome">
	<p>
		<strong>您好，<?php echo $_SESSION['adminname'];?>，欢迎进入 PT小说系统 控制台</strong>
		上次登录时间: <?php echo $_SESSION['logtime'];?>，上次登录ip: <?php echo $_SESSION['logip'];?>
	</p>
</div>
<dl id="rightCon">
<dt>安全提示</dt>
<dd>
    <ul>
		<li><font color="red"><b>为了迎接PT小说程序3.0即将发布，2.X系列现已全面免费！为防止程序被人加上后门，请您到官方网站及授权下载点下载！</b></font></li>
		<?php
        if (strpos(dirname(__FILE__),'admin')){
            echo '<li>您的后台管理目录为<span class="red">默认目录</span>，请您使用ftp或者其他方式<span class="blue">将后台目录重命名</span></li>';   
        }
		if (file_exists('../install')){
		    echo '<li>您的<span class="red">安装程序目录仍然存在</span>，请您使用ftp或者其他方式<span class="blue">将安装程序目录删除或者重命名</span></li>';    
		}
		if ($_SESSION['adminname']=='admin'){
		    echo '<li>您的管理员账号为<span class="red">默认账号</span>，请您在【<a href="config_adminuser.php" class="bold">管理员设置</a>】页面重新设置管理账号</li>';  
		}
        ?>
    </ul>
</dd>
<dt>系统信息</dt>
<dd>
    <table border="1">
        <tr>
            <th>服务器操作系统:</th>
            <td width="35%"><?php echo php_uname();?></td>
            <th>WEB 服务器:</th>
            <td width="35%"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
        </tr>
        <tr>
            <th>PHP 版本:</th>
            <td><?php echo phpversion();?></td>
            <th>MYSQL 版本:</th>
            <td><?php if(extension_loaded('mysql')){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
        </tr>
		<tr>
            <th>PT 程序类别:</th>
            <td><?php echo $ptbook['version'];?></td>
            <th>PT 程序版本:</th>
            <td><?php echo $ptbook['build'];?></td>
        </tr>
    </table>
</dd>
<dt>使用条例</dt>
<dd>
	<ul>
		<li>一、PT小偷系列软件由<a href="http://pakey.net" title="Pakey blog">Pakey</a>开发,Mobile进行修改完善，严禁使用任何非法手段破解本程序，进行修改发布等行为；    
		<li>二、不得使用本程序进行违反我国现行法律法规的任何行为，如传病毒木马、播恶意软件、淫秽色情等；  
		<li>三、严禁使用本程序进行刷流量、刷联盟等行为，如经发现，我们有权追回程序使用权，并不退还任何金额；    
		<li>四、本程序作为小偷程序，将会随着您的站点的流量增加而对目标站造成一定的影响，故请保留目标站的链接；           
		<li>五、如因用户违反程序使用条例，本站有权终止对该用户的技术支持、更新升级、数据采集等服务并保留追究其相应的法律责任；
	</ul>
</dd>
<dt>关于PT</dt>
<dd>
    <table>
        <tr>
            <th>官方网站：</th>
            <td width="35%"><a href="http://www.ptcms.com/" target="_blank">http://WwW.PTcms.CoM/</a></td>
            <th>官方论坛：</th>
            <td><a href="http://bbs.ptcms.com/" target="_blank">http://BBS.PTcms.CoM/</a></td>
		</tr>
    </table>
</dd>
</dl>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>