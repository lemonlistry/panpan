<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile=PT_DIR . 'plus/bot/data/day2.php';
include $setfile;
$botclick['day2']=$botclick['day'];
$setfile=PT_DIR . 'plus/bot/data/day1.php';
include $setfile;
$botclick['day1']=$botclick['day'];
$setfile=PT_DIR . 'plus/bot/data/day.php';
include $setfile;
include PT_DIR . 'plus/bot/botlist.php';
if (isset($_POST['save'])){
    $botnum=count($_POST['botlist']);
    $botstr = "<?php\n";
    $botstr.="\$botnum='$botnum';\n\n";
    for ($i = 1; $i <= $botnum; $i++) {
        $botstr .= "\$botlist['$i']['name']='" . $_POST['botlist'][$i]['name'] . "';\n";
        $botstr .= "\$botlist['$i']['type']='" . $_POST['botlist'][$i]['type'] . "';\n\n";
    }
    $botstr .= "?>";
    $pt->writeto($setfile,$botstr);
    $msg="1|恭喜您，修改成功";
    $url='bot_set.php';
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
	<p>您当前位置： 蜘蛛记录管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>当日蜘蛛来访记录查看</span></li>		
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>数据仅供参考，详细数据请查看网站访问日志。</li>        
	</ul>
</div>
<form name="list_frm" id="ListFrm" action="" method="post">
<div class="tdare1">
    <table width="100%" cellspacing="0" border="1">
        <thead >
    		<tr>
              <th align="center" width="180">蜘蛛名称</th>
    		  <th width="150">今日来访次数</th>
              <th width="150">昨日日来访次数</th>
              <th width="150">前日来访次数</th>
              <th >&nbsp;</th>		  
    		</tr>
        </thead>
        <tbody align="center">
            <?php
            for ($j=1;$j<=$botnum;$j++){
            ?>
    		<tr class="tatr2">
    		  <td style="width: 180px;height:25px"><?php echo $botlist[$j]['name'];?></td>
    		  <td style="width: 150px;"><?php echo $botclick['day'][$j];?></td>
              <td style="width: 150px;"><?php echo $botclick['day1'][$j];?></td>
              <td style="width: 150px;"><?php echo $botclick['day2'][$j];?></td>
              <td>&nbsp;</td>		  
    		</tr>
    		<?php
            }
            ?>   
        </tbody>
    </table>    
</div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>