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
if (isset($_POST['save'])){
    $dirname=PT_DIR.'cache';
    removedir($dirname);
    $msg="1|恭喜您，清除缓存成功";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['block'])){
    unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/block.tpl.php');
    unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/blocklist.tpl.php');
    unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_RULE.'/block.list.php');
    $msg="1|恭喜您，清除缓存成功";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['static'])){
    $dirname=PT_DIR.'files/static';
    removedir($dirname);
    $msg="1|恭喜您，清除缓存成功";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['image'])){
    $dirname=PT_DIR.'files/cover';
    removedir($dirname);
    $dirname=PT_DIR.'files/images';
    removedir($dirname);
    $msg="1|恭喜您，清除缓存成功";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['data'])){
    $dirname=PT_DIR.'files/data';
    removedir($dirname);
    $msg="1|恭喜您，清除缓存成功";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['chapter'])){
    $dirname=PT_DIR.'files/chapter';
    removedir($dirname);
    $msg="1|恭喜您，清除缓存成功";
    $url='cache_delall.php';
    echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_POST['search'])){
    $dirname=PT_DIR.'files/search';
    removedir($dirname);
    $msg="1|恭喜您，清除缓存成功";
    $url='cache_delall.php';
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
<form method="POST" name="list_frm" id="ListFrm" action="?">
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>清理静态缓存</span></li>
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
            <li><b style="color: red;">一键清理仅当程序发生重大问题时使用，其他情况我们不推荐使用</b></li>
    		<li>一键清理数据模板缓存将会清除所有的模板缓存，书页、章节页信息缓存，排行榜数据缓存。</li>
            <li>一键清理静态缓存将会删除所有静态的缓存，此功能将消耗较长时间，请慎用，我们建议您直接利用其他方式删除files/static目录</li>
            <li>此功能一般用于刚换了目标站，或者对系统设置进行了较大的改动。</li>
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input type="submit" name="save" value="一键清理常规缓存" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="block" value="一键清理区块缓存" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="static" value="一键清理静态缓存" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="image" value="一键清理图片缓存" />
            </td>
          </tr>
          <tr>
            <th></th>
            <td class="ptb20">
                <input type="submit" name="data" value="一键清理数据缓存" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="chapter" value="一键清理章节缓存" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="search" value="一键清理搜索缓存" />
            </td>
          </tr>
        </table>   
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>