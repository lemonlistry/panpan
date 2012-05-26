<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/cachetime.php';
include $setfile;
if (isset($_POST['save'])){
    unset($_POST['save']);
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){
            foreach($_POST[$key] as $akey => $bvalue){
                $str.="\$".$key."['".$akey."']='".$bvalue."';\n";
            }
        }else{
            $str.="\$$key='$value';\n";
        }
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);    
    if ($result){
        $msg="1|恭喜您，修改参数成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='cache_time.php';
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
	<p>您当前位置： 系统设置 &raquo; 缓存管理</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>静态缓存间隔设置</span></li>
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>静态缓存为当你访问一次页面后程序生成的缓存页面，可以加大程序的再次访问这个页面的速度；</li>
        <li>静态缓存总开关是在<a href="config_function.php">功能开关</a>当中,单项当时间设为0即为不开启此项静态缓存；</li>
		<li>缓存间隔时间单位为小时，0.5即为半小时 30分钟；</li>
        <li>如果你的访问量并不大，静态缓存那么并不会加快你的速度；</li>
        <li>当你决定开启静态缓存，请准备好空间，因为章节页的缓存是很占用空间的。</li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">          
          <tr>
            <th class="paddingT15"><label for="time_zone"> 首页缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[index]" type="text" value="<?php echo $cachetime['index']?>" class="infoTableInput" />
                <span class="gray">网站的门面,访问频繁，受众较多，建议一个小时之内。</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 列表页缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[sort]" type="text" value="<?php echo $cachetime['sort']?>" class="infoTableInput" />
                <span class="gray">非常用页面，建议设置间隔稍长。</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 全本页缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[over]" type="text" value="<?php echo $cachetime['over']?>" class="infoTableInput" />
                <span class="gray">非常用页面，建议设置间隔稍长。</span>                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 排行页缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[top]" type="text" value="<?php echo $cachetime['top']?>" class="infoTableInput" />
                <span class="gray">很少用的页面，建议设置间隔更长。</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 全本排行页缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[topover]" type="text" value="<?php echo $cachetime['topover']?>" class="infoTableInput" />
                <span class="gray">很少用的页面，建议设置间隔更长。</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 搜索结果缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[search]" type="text" value="<?php echo $cachetime['search']?>" class="infoTableInput" />
                <span class="gray">此项无需频繁更新</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 书籍数据缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[data]" type="text" value="<?php echo $cachetime['data']?>" class="infoTableInput" />
                <span class="gray">由于小说连载因素，建议设置一个小时之内。</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 目录页缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
               <input name="cachetime[read]" type="text" value="<?php echo $cachetime['read']?>" class="infoTableInput" />
                <span class="gray">由于小说连载因素，建议设置一个小时之内。</span>
            </td>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 章节页缓存间隔：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="cachetime[chapter]" type="text" value="<?php echo $cachetime['chapter']?>" class="infoTableInput" />
                <span class="gray">只更新图片章节或空白章节内容，建议设置很长。</span>
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