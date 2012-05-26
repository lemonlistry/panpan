<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/config.inc.php';
include $setfile;

if (isset($_POST["save"])){
    unset($_POST['save']);
    foreach($_POST as $key => $value){
        $pt_set[strtoupper($key)]=$value;
    }
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="\$pt_set['$key']='$value';\n";
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    
    $file='../data/config.php';
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="define('$key','$value');\n";
    }
    $str.='?>';
    $result=$pt->writeto($file,$str);
    
    
    if ($result){
        $msg="1|恭喜您，修改参数成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='config_filename.php';
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
	<p>您当前位置： 系统设置 &raquo; 动态文件名</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>动态文件名</span></li>		
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> 首页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_index" type="text" value="<?php echo $pt_set['PT_FILENAME_INDEX']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 列表页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_sort" type="text" value="<?php echo $pt_set['PT_FILENAME_SORT']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 全本页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_over" type="text" value="<?php echo $pt_set['PT_FILENAME_OVER']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 排行页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_top" type="text" value="<?php echo $pt_set['PT_FILENAME_TOP']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 全本排行页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_topover" type="text" value="<?php echo $pt_set['PT_FILENAME_TOPOVER']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 书页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_book" type="text" value="<?php echo $pt_set['PT_FILENAME_BOOK']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 下载页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_down" type="text" value="<?php echo $pt_set['PT_FILENAME_DOWN']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 目录页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_read" type="text" value="<?php echo $pt_set['PT_FILENAME_READ']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 章节页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_chapter" type="text" value="<?php echo $pt_set['PT_FILENAME_CHAPTER']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 阅读尾页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_readend" type="text" value="<?php echo $pt_set['PT_FILENAME_READEND']?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 搜索页文件名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filename_search" type="text" value="<?php echo $pt_set['PT_FILENAME_SEARCH']?>" class="infoTableInput" />                
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