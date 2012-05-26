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
$directory=PT_DIR."cache/".PT_TPLDIR;
    $mydir=dir($directory);
    $id=0;
    while($file=$mydir->read()){
        if ($file!='.' and $file!='..'){
            $id++;
            if((is_dir($directory.$file)) AND ($file!=".") AND ($file!="..")){
                if (file_exists(PT_DIR.PT_TPLDIR."$file/templets.set.php") ){
                    include PT_DIR.PT_TPLDIR."$file/templets.set.php";
                    $cachename[$id]=$pt_templets_name;
                }else{
                    $cachename[$id]='位置目录';
                }
            	$cacheurl[$id]=str_replace(PT_DIR,'/',$directory).$file;
                $delurl[$id]='?del='.$file;
            }
        }        
    }
    $mydir->close();
if (isset($_GET['del'])){
    $dirname=PT_DIR.'cache/'.PT_TPLDIR.$_GET['del'];
    if (removedir($dirname) or !file_exists($dirname)){
        $msg="1|恭喜您，清除缓存成功";
    }else{
        $msg="0|很遗憾，清除缓存失败";
    }
	$url='cache_deltpl.php';
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
    		<li><span>清理模板缓存</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>该项仅清理程序在运行过程中产生的模板的缓存。</li>
            <li>模板缓存目录位于cache/templets。</li>
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
          <?php for($i=1;$i<=$id;$i++){ ?>
          <tr>
            <th class="paddingT15">
                <?php echo $cachename[$i]?>缓存
            </th>
            <td class="paddingT15 wordSpacing5">
                <?php echo $cacheurl[$i]?>                
            </td>
            <td class="paddingT15 wordSpacing5">
                <a href="<?php echo $delurl[$i]?>">清除缓存</a>                
            </td>            
          </tr>
          <?php } ?>  
        </table>
    </div>
    <div class="info" ></div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>