<?php
include 'conn.php';
ini_set("max_execution_time", "600");
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
if (isset($_GET['delfile'])){
    $filename=PT_DIR.$_GET['delfile'];    
    if (unlink($filename) or !file_exists($filename)){
        $msg="1|恭喜您，清除缓存成功";
    }else{
        $msg="0|很遗憾，清除缓存失败";
    }
	$url='cache_delimg.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_GET['deldir'])){
    $dirname=PT_DIR.$_GET['deldir'];
    if (removedir($dirname) or !file_exists($dirname)){
        $msg="1|恭喜您，清除缓存成功";
    }else{
        $msg="0|很遗憾，清除缓存失败";
    }
	$url='cache_delimg.php';
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
	<p>您当前位置： 缓存管理 &raquo; </p>
</div>
<form method="post" name="list_frm" id="ListFrm">
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>清理图片缓存</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>该项仅清理程序在运行过程中存储的图片，比如封面图片，章节图片。</li>           
            <li>如果目录太大，我们还是建议您使用ftp或者其他办法。</li>
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="数据显示区">
            <thead>
        		<tr>        		  
        		  <th style="width: 220px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;缓存名称</th>
        		  <th style="width: 250px;">缓存地址</th>
                  <th>操作</th>
        		</tr>
        	</thead>
          <tr>
            <th class="paddingT15">小说封面图片缓存</th>
            <td class="paddingT15 wordSpacing5">files/cover</td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/cover">清除缓存</a></td>
          </tr>
           <tr>
            <th class="paddingT15">小说章节图片缓存</th>
            <td class="paddingT15 wordSpacing5">files/images</td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/images">清除缓存</a></td>            
          </tr>
        </table>
    </div>
    <div class="info" ></div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>