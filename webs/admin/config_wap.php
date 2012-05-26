<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

$setfile= '../data/wap.php';
include $setfile;
if (isset($_POST["save"])){
    unset($_POST['save']);    
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        $str.="\$$key='$value';\n";
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);    
    
    if ($result){
        $msg="1|恭喜您，修改参数成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='config_wap.php';
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
	<p>您当前位置： 系统设置 &raquo; 功能设置</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>功能开关</span></li>
		
		
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
		 
          <tr>
            <th class="paddingT15"><label for="time_zone"> 推荐1标题：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_wap_title1" type="text" value="<?php echo $pt_wap_title1?>" class="infoTableInput" />
                <span class="gray">wap首页推荐内容1标题。</span>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"><label for="time_zone"> 推荐1内容：</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="pt_wap_con1"  style="width:350px;height:100px;" ><?php echo $pt_wap_con1;?></textarea><br /><br />
				<span class="gray">格式：书名|书号 然后回车换行隔开下一个。<font color="red">书号必须为本站书号</font></span>
            </td>
          </tr>
          
		  <tr>
            <th class="paddingT15"><label for="time_zone"> 推荐2标题：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_wap_title2" type="text" value="<?php echo $pt_wap_title2?>" class="infoTableInput" />
                <span class="gray">wap首页推荐内容2标题。</span>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"><label for="time_zone"> 推荐2内容：</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="pt_wap_con2"  style="width:350px;height:100px;" ><?php echo $pt_wap_con2;?></textarea><br /><br />
				<span class="gray">格式：书名|书号 然后回车换行隔开下一个。<font color="red">书号必须为本站书号</font></span>
            </td>
          </tr>
          
        </table>
        
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="save" value="提交" />
                <input class="formbtn" type="reset" name="reset" value="重置" />
            </td>
          </tr>
        </table>
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>