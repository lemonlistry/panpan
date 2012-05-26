<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

$setfile= '../data/page.inc.php';
include $setfile;

$page['1']='首页';
$page['2']='分类列表';
$page['3']='全本列表';
$page['4']='排行';
$page['5']='全本排行';
$page['6']='简介页';
$page['7']='目录页';
$page['8']='下载页';
$page['9']='章节页';
$page['10']='阅读尾页';
$page['11']='搜索页';

$pagekey['1']='index';
$pagekey['2']='sort';
$pagekey['3']='over';
$pagekey['4']='top';
$pagekey['5']='topover';
$pagekey['6']='book';
$pagekey['7']='read';
$pagekey['8']='down';
$pagekey['9']='chapter';
$pagekey['10']='readend';
$pagekey['11']='search';

$help['1']='1、{sitename} 网站名';
$help['2']='1、{sitename} 网站名<br>2、{sortname}栏目名';
$help['3']='1、{sitename} 网站名';
$help['4']='1、{sitename} 网站名<br>2、{topname} 排行类别名';
$help['5']='1、{sitename} 网站名<br>2、{topname} 排行类别名';
$help['6']='1、{sitename} 网站名<br>2、{bookname} 书名<br />3、{author} 作者名';
$help['7']='1、{sitename} 网站名<br>2、{bookname} 书名<br />3、{author} 作者名';
$help['8']='1、{sitename} 网站名<br>2、{bookname} 书名<br />3、{author} 作者名';
$help['9']='1、{sitename} 网站名<br>2、{bookname} 书名<br />3、{chaptername} 章节名';
$help['10']='1、{sitename} 网站名<br>2、{bookname} 书名<br />3、{author} 作者名';
$help['11']='1、{sitename} 网站名<br>2、{key} 搜索关键词';

if (isset($_POST["save"])){
    unset($_POST['save']);
    $str='<?php'."\n";
    for ($i=1;$i<12;$i++){
        $str.="\$title['".$pagekey[$i]."']='".$_POST["title_$pagekey[$i]"]."';\n";
        $str.="\$keywords['".$pagekey[$i]."']='".$_POST["keywords_$pagekey[$i]"]."';\n";
        $str.="\$description['".$pagekey[$i]."']='".$_POST["description_$pagekey[$i]"]."';\n\n";
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    
    for ($i=1;$i<12;$i++){
        $str='<?php'."\n";
        $str.="\$title='".$_POST["title_$pagekey[$i]"]."';\n";
        $str.="\$keywords='".$_POST["keywords_$pagekey[$i]"]."';\n";
        $str.="\$description='".$_POST["description_$pagekey[$i]"]."';\n\n";
        $str.='?>';
        
        $str = str_replace('{sitename}',"'.PT_SITENAME.'",$str);
        $str = str_replace('{',"'.$",$str);
        $str = str_replace('}',".'",$str);
        
        $file='../data/page/'.$pagekey[$i].'.php';
        $pt->writeto($file,$str);                
    }    
    if ($result){
        $msg="1|恭喜您，修改参数成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='config_page.php';
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
	<p>您当前位置： 系统设置 &raquo; 页面信息设置</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>授权文件修改</span></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title1" ><a href="javascript:void(0);">首页</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title2" ><a href="javascript:void(0);">分类列表</a></li>
		<li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title3" ><a href="javascript:void(0);">全本列表</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title4" ><a href="javascript:void(0);">排行</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title5" ><a href="javascript:void(0);">全本排行</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title6" ><a href="javascript:void(0);">简介页</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title7" ><a href="javascript:void(0);">目录页</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title8" ><a href="javascript:void(0);">下载页</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title9" ><a href="javascript:void(0);">章节页</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title10" ><a href="javascript:void(0);">阅读尾页</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title11" ><a href="javascript:void(0);">搜索页</a></li>		
	</ul>
</div>
<div class="info" >
    <form method="post" >
        <?php
        for ($i=1;$i<12;$i++){            
        ?>
        <table class="infoTable" id="rightTop_Content<?php echo $i?>">
          <tr>
            <th class="paddingT15"><label for="time_zone"> <?php echo $page[$i];?>页面标题：</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="title_<?php echo $pagekey[$i]?>"  style="width:550px;height:30px;" ><?php echo $title[$pagekey[$i]];?></textarea>            
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"><label for="time_zone"> <?php echo $page[$i];?>页面关键词：</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="keywords_<?php echo $pagekey[$i]?>"  style="width:550px;height:30px;" ><?php echo $keywords[$pagekey[$i]];?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"><label for="time_zone"> <?php echo $page[$i];?>页面描述：</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="description_<?php echo $pagekey[$i]?>"  style="width:550px;height:48px;" ><?php echo $description[$pagekey[$i]];?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"><label for="time_zone"> 参数使用帮助：</label></th>
            <td class="paddingT15 wordSpacing5">                                
                <span class="gray">在<?php echo $page[$i];?>可以使用的参数有<br />
                <?php echo $help[$i];?></span>
            </td>
          </tr>
          
          </table>
          <?php
            }
          ?>
                  
                
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