<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../plus/bot/botlist.php';
include $setfile;
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
<script language="javascript">
<!--
var startNum = <?php echo $botnum+1?>;
function MakeUpload()
{
	var upfield = document.getElementById("uploadfield");
	var endNum =  parseInt(document.list_frm.inputnum.value) + startNum;
	for(startNum; startNum<endNum; startNum++){
		upfield.innerHTML += "<table width='100%' cellspacing='0' class='dataTable'><tbody ><tr class='tatr2'><td width='180'><input name='botlist["+startNum+"][name]' type='text' value='' class='infoTableInput3' style='width: 150px;' /></td><td width='250'><input name='botlist["+startNum+"][type]' type='text' value='' class='infoTableInput3' style='width: 200px;' /></td><td>&nbsp;</td></tr></tbody></table>";
	}
}
-->
</script>
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
		<li><span>蜘蛛设置</span></li>		
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>此处设置重写自动记录从哪里过来的蜘蛛。</li>
        <li>特征码可以从iis的网站访问日志中看到。</li>
	</ul>
</div>
<form name="list_frm" id="ListFrm" action="" method="post">
<div class="tdare1">
    <table width="100%" cellspacing="0" border="1">
        <thead >
    		<tr>
              <th align="center" width="180">蜘蛛名称</th>
    		  <th width="250">蜘蛛特征码</th>
              <th >&nbsp;</th>		  
    		</tr>
        </thead>
        <tbody align="center">
            <?php
            for ($j=1;$j<=$botnum;$j++){
            ?>
    		<tr class="tatr2">
    		  <td style="width: 180px;"><input name="botlist[<?php echo $j;?>][name]" type="text" value="<?php echo $botlist[$j]['name'];?>" class="infoTableInput3" style="width: 150px;" /></td>
    		  <td ><input name="botlist[<?php echo $j;?>][type]" type="text" value="<?php echo $botlist[$j]['type'];?>" class="infoTableInput3" style="width: 200px;" /></td>
              <td>&nbsp;</td>		  
    		</tr>
    		<?php
            }
            ?>   
        </tbody>
    </table>
    <div id='uploadfield'></div>    
</div>
<div class="tdare">
    <table class="infoTable">
          <tr>
            <td class="ptb20" style="text-align:center;width: 50%;">
                <input name="inputnum" type="text" id="inputnum" size="15" value="1" />
                <input name='kkkup' type='button' class="formbtn" value='增加条目' onclick="MakeUpload();" />
                <input class="formbtn" type="submit" name="save" value="提交" />
                <input class="formbtn" type="reset" name="reset" value="重置" />
            </td>
            <td>&nbsp;</td>
          </tr>
    </table>	
</div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>