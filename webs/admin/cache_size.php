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
// 说明： 遍历缓存目录,并统计大小
// 来源：网络
function dirsize($dirpath){
    $thisdirstat = array('filesize'=>0,"files"=>0,"dirs"=>0);
    if (false ==($dirhandle = @opendir($dirpath))) return $thisdirstat ;
    while (false !== ($name = readdir($dirhandle))){
        if ($name == "." or $name == "..") continue;
        if (!is_dir($dirpath.DIRECTORY_SEPARATOR.$name)){
            $thisdirstat["filesize"] += filesize($dirpath.DIRECTORY_SEPARATOR.$name);
            ++$thisdirstat["files"];
            }
        else{
            ++$thisdirstat["dirs"];
            $subdirstat = dirsize($dirpath.DIRECTORY_SEPARATOR.$name);
            $thisdirstat["filesize"] += $subdirstat["filesize"]; 
            $thisdirstat["files"] += $subdirstat["files"]; 
            $thisdirstat["dirs"] += $subdirstat["dirs"]; 
        };
    };
    closedir($dirhandle);
    return $thisdirstat;
}
function size($dirpath){
$fsize=(dirsize($dirpath));
$fizeKB="{$fsize[filesize]}"/1024;
if($fizeKB>0)
  {
   list($t1,$t2)=explode(".",$fizeKB);
   $fizeKB=$t1.".".substr($t2,0,2).'KB';
  }else{$fizeKB='0.00KB';}  
return $fizeKB;
}
if (isset($_GET['delfile'])){
    $filename=PT_DIR.$_GET['delfile'];    
    if (unlink($filename) or !file_exists($filename)){
        $msg="1|恭喜您，清除缓存成功";
    }else{
        $msg="0|很遗憾，清除缓存失败";
    }
	$url='cache_size.php';
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
	$url='cache_size.php';
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
    		<li><span>缓存大小查看</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
            <li>查看主要缓存所占大小，便于控制空间占用。</li>    		
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="数据显示区">
            <thead>
        		<tr>        		  
        		  <th style="width: 220px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;缓存名称</th>
        		  <th style="width: 250px;">缓存地址</th>
                  <th style="width: 250px;">缓存大小</th>
                  <th>操作</th>
        		</tr>
        	</thead>        
          <tr>
            <th class="paddingT15">临时缓存</th>
            <td class="paddingT15 wordSpacing5">cache</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../cache');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=cache">清除缓存</a></td>
          </tr>
          <tr>
            <th class="paddingT15">小说数据信息缓存</th>
            <td class="paddingT15 wordSpacing5">files/data</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/data');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/data">清除缓存</a></td>
          </tr>
          <tr>
            <th class="paddingT15">小说章节内容缓存</th>
            <td class="paddingT15 wordSpacing5">files/chapter/txt</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/chapter/txt');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/chapter/txt">清除缓存</a></td>
          </tr>
          <tr>
            <th class="paddingT15">小说章节翻页缓存</th>
            <td class="paddingT15 wordSpacing5">files/chapter/page</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/chapter/page');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/chapter/page">清除缓存</a></td>
          </tr>
          <tr>
            <th class="paddingT15">小说搜索结果缓存</th>
            <td class="paddingT15 wordSpacing5">files/search</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/search');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/search">清除缓存</a></td>
          </tr>
          <tr>
            <th class="paddingT15">小说封面图片缓存</th>
            <td class="paddingT15 wordSpacing5">files/cover</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/cover');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/cover">清除缓存</a></td>
          </tr>
          <tr>
            <th class="paddingT15">小说章节图片缓存</th>
            <td class="paddingT15 wordSpacing5">files/images</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/images');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/images">清除缓存</a></td>
          </tr>
          <tr>
            <th class="paddingT15">清除静态缓存</th>
            <td class="paddingT15 wordSpacing5">files/static</td>
            <td class="paddingT15 wordSpacing5"><?php echo size('../files/static');?></td>
            <td class="paddingT15 wordSpacing5"><a href="?deldir=files/static">清除缓存</a></td>
          </tr>
        </table>
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>