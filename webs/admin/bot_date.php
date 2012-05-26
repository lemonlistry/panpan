<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

include PT_DIR . 'plus/bot/botlist.php';
include PT_DIR . 'plus/bot/data/week.php';
include PT_DIR . 'plus/bot/data/month.php';
include PT_DIR . 'plus/bot/data/year.php';
include PT_DIR . 'plus/bot/data/all.php';

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
		<li><span>时间段蜘蛛来记录查看</span></li>		
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
    		  <th width="150">本周来访次数</th>
              <th width="150">本月来访次数</th>
              <th width="150">今年来访次数</th>
              <th width="150">总来访次数</th>
              <th >&nbsp;</th>		  
    		</tr>
        </thead>
        <tbody align="center">
            <?php
            for ($j=1;$j<=$botnum;$j++){
            ?>
    		<tr class="tatr2">
    		  <td style="width: 180px;height:25px"><?php echo $botlist[$j]['name'];?></td>
    		  <td style="width: 150px;"><?php echo $botclick['week'][$j];?></td>
              <td style="width: 150px;"><?php echo $botclick['month'][$j];?></td>
              <td style="width: 150px;"><?php echo $botclick['year'][$j];?></td>
              <td style="width: 150px;"><?php echo $botclick['all'][$j];?></td>
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