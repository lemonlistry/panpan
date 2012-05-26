<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

if (isset($_POST["reset"])){
    include PT_DIR . 'plus/bot/botlist.php';
    
    $file = PT_DIR . 'plus/bot/data/day.php';
    $botstr = "<?php\n";
    for ($i = 1; $i <= $botnum; $i++) {
        $botstr .= "\$botclick['day']['$i']='0';\n";
    }
    $botstr .= "?>";
    $pt->writeto($file, $botstr);
    $file = PT_DIR . 'plus/bot/data/day1.php';
    $pt->writeto($file, $botstr);
    $file = PT_DIR . 'plus/bot/data/day2.php';
    $pt->writeto($file, $botstr);
    
    $file = PT_DIR . 'plus/bot/data/month.php';
    $botstr = "<?php\n";
    for ($i = 1; $i <= $botnum; $i++) {
        $botstr .= "\$botclick['month']['$i']='0';\n";
    }
    $botstr .= "?>";
    $pt->writeto($file, $botstr);
    
    $file = PT_DIR . 'plus/bot/data/week.php';
    $botstr = "<?php\n";
    for ($i = 1; $i <= $botnum; $i++) {
        $botstr .= "\$botclick['week']['$i']='0';\n";
    }
    $botstr .= "?>";
    $pt->writeto($file, $botstr);
    
    $file = PT_DIR . 'plus/bot/data/year.php';
    $botstr = "<?php\n";
    for ($i = 1; $i <= $botnum; $i++) {
        $botstr .= "\$botclick['year']['$i']='0';\n";
    }
    $botstr .= "?>";
    $pt->writeto($file, $botstr);
    
    $file = PT_DIR . 'plus/bot/data/all.php';
    $botstr = "<?php\n";
    for ($i = 1; $i <= $botnum; $i++) {
        $botstr .= "\$botclick['all']['$i']='0';\n";
    }
    $botstr .= "?>";
    $pt->writeto($file, $botstr);
    
    $msg="1|恭喜您，初始化数据成功";
	$url='bot_reset.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>控制台 - PT小偷</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<style type="text/css">
td.hover, tr.hover
{
	background-color: #F2F9FD;
}
th.hover, thead td.hover, tfoot td.hover
{
	background-color: ivory;
}

</style>

</head>
<body>
<div id="currentPosition">
	<p>您当前位置： 系统工具 &raquo; 蜘蛛记录管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>最数据初始化</span></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>本功能将蜘蛛数据全部初始化，操作为不可逆！</li>
	</ul>
</div>

<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <div style="padding: 20px;"><input type="submit" name="reset" value="确认将蜘蛛记录初始化"/></div>
        
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>