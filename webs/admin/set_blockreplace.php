<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/replace/block.php';
if (file_exists($setfile)){
    $str=file($setfile);
}
$num=count($str);
if ($num>0){
    $numf=$num;
    for ($i=0;$i<$num;$i++){
        $estr=explode('|||',$str[$i]);
        if(isset($estr['0'])){$stra[$i]=$estr['0'];}else{$stra[$i]="";}
        if(isset($estr['1'])){$strb[$i]=$estr['1'];}else{$strb[$i]="";}
        if(isset($estr['2'])){$strc[$i]=$estr['2'];}else{$strc[$i]="";}
    }    
}else{
    $numf=1;
    $stra['0']="";
    $strb['0']=""; 
    $strc['0']="";   
}

if (isset($_POST["save"])){
    unset($_POST['save']);
    $str="";
    $i=0;
    while(isset($_POST['stra'.$i])){
        if ($_POST['stra'.$i]!=''){
            $str.=$_POST['stra'.$i].'|||'.$_POST['strb'.$i].'|||'.$_POST['strc'.$i]."\n";    
        }        
        $i++;
    }
    $result=$pt->writeto($setfile,$str);
    $msg="1|恭喜您，修改参数成功";
	$url='set_blockreplace.php';
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
var startNum = <?php echo $numf?>;
function MakeUpload()
{
	var upfield = document.getElementById("uploadfield");
	var endNum =  parseInt(document.list_frm.inputnum.value) + startNum;
	for(startNum; startNum<endNum; startNum++){
		upfield.innerHTML += "<table width='100%' cellspacing='0' class='dataTable'><tbody ><tr class='tatr2'><td width='120'><input name='stra"+startNum+"' type='text' value='' class='infoTableInput3' style='width: 100px;' /></td><td width='170'><input name='strb"+startNum+"' type='text' value='' class='infoTableInput3' style='width: 150px;' /></td><td width='320'><input name='strc"+startNum+"' type='text' value='' class='infoTableInput3' style='width: 300px;' /></td><td>&nbsp;</td></tr></tbody></table>";
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
	<p>您当前位置： 系统设置 &raquo; 模板管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>首页区块修正</span></li>
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>此功能主要用户修正首页区块当中有瑕疵的地方。</li>
		<li>替换内容主要为封面图片和小说简介。</li>
		<li>封面图片在替换类别中填入“bookimg”，小说简介则填入“bookinfo”。</li>
		<li>“替换类型”内容必填，如果“书号”内容没有填写，则代表清除被替换内容。</li>
		<li>删除某个替换只要删除该替换“书号”内容即可。</li>        
	</ul>
</div>
<form name="list_frm" id="ListFrm" action="" method="post">
<div class="tdare1">
    <table width="100%" cellspacing="0" class="dataTable" width="620">
        <thead>
    		<tr>
              <th align="center" width="120">书号</th>
    		  <th width="170">替换类别</th>
              <th width="320">替换内容</th>
              <th >&nbsp;</th>		  
    		</tr>
        </thead>
        <tbody align="center">
            <?php
            for ($j=0;$j<$numf;$j++){
            ?>
    		<tr class="tatr2">
    		  <td><input name="stra<?php echo $j;?>" type="text" value="<?php echo $stra[$j];?>" class="infoTableInput3" style="width: 100px;" /></td>
    		  <td><input name="strb<?php echo $j;?>" type="text" value="<?php echo $strb[$j];?>" class="infoTableInput3" style="width: 150px;" /></td>
              <td><input name="strc<?php echo $j;?>" type="text" value="<?php echo $strc[$j];?>" class="infoTableInput3" style="width: 300px;" /></td>
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