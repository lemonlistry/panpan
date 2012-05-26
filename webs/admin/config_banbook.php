<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/banbook.php';
if (file_exists($setfile)){
    $str=explode('|||',file_get_contents($setfile));
}
$num=count($str);
if ($num>0){
    $numf=$num;        
}else{
    $numf=1;
    $str['1']="";   
}

if (isset($_POST["save"])){
    unset($_POST['save']);
    $str="";
    $i=0;
    while(isset($_POST['str'.$i])){
        if ($_POST['str'.$i]!=''){
            $str.=$_POST['str'.$i]."|||";    
        }        
        $i++;
    }
    $result=$pt->writeto($setfile,$str);
    if ($result){
        $msg="1|恭喜您，修改参数成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='config_banbook.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
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
var startNum = <?php echo $num?>;
function MakeUpload()
{
	var upfield = document.getElementById("uploadfield");
	var endNum =  parseInt(document.list_frm.inputnum.value) + startNum;
	for(startNum; startNum<endNum; startNum++){
		upfield.innerHTML += "<table width='100%' cellspacing='0' class='dataTable'><tbody ><tr class='tatr2'><td width='350'><input name='str"+startNum+"' type='text' value='' class='infoTableInput3' style='width: 300px;' /></td></tr></tbody></table>";
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
	<p>您当前位置： 系统设置 &raquo; 内容替换</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>图书屏蔽管理</span></li>		
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>直接在下面填写要屏蔽的书号即可。</li>        
	</ul>
</div>
<form name="list_frm" id="ListFrm" action="" method="post">
<div class="tdare1">
    <table width="100%" cellspacing="0" class="dataTable">
        <thead>
    		<tr>
              <th align="left" width="350">被屏蔽书号</th>  
    		</tr>
        </thead>
        <tbody align="left">
            <?php
            for ($j=0;$j<$numf;$j++){
            ?>
    		<tr class="tatr2">
    		  <td width="350"><input name="str<?php echo $j;?>" type="text" value="<?php echo $str[$j];?>" class="infoTableInput3" style="width: 300px;" /></td>		  
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
            <td class="ptb20" style="text-align:center;width: 350px;">
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