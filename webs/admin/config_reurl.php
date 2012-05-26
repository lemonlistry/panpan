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
include_once '../data/config.php'; 
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
	$url='config_reurl.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
if (isset($_GET['type'])){
    switch($_GET['type']){       
        case 'iis':
            $str="[ISAPI_Rewrite]\r\n\r\n";
            $str.="RewriteRule (.*)".str_replace('{sortid}','([0-9]+)',str_replace('{page}','([0-9]+)',PT_REURL_SORT)).'$ $1'.PT_FILENAME_SORT."\?sortid=\$2&page=\$3 [L]\r\n";
            $str.="RewriteRule (.*)".str_replace('{page}','([0-9]+)',PT_REURL_OVER).'$ $1'.PT_FILENAME_OVER."\?page=\$2 [L]\r\n";
            $str.="RewriteRule (.*)".str_replace('{topid}','(.*)',str_replace('{page}','([0-9]+)',PT_REURL_TOP)).'$ $1'.PT_FILENAME_TOP."\?topid=\$2&page=\$3 [L]\r\n";
            $str.="RewriteRule (.*)".str_replace('{topid}','(.*)',str_replace('{page}','([0-9]+)',PT_REURL_TOPOVER)).'$ $1'.PT_FILENAME_TOPOVER."\?topid=\$2&page=\$3 [L]\r\n";
            $str.="RewriteRule (.*)".str_replace('{bookid}','([0-9]+)',PT_REURL_BOOK).'$ $1'.PT_FILENAME_BOOK."\?bookid=\$2 [L]\r\n";
            $str.="RewriteRule (.*)".str_replace('{type}','(.*)',str_replace('{bookid}','([0-9]+)',PT_REURL_DOWN)).'$ $1'.PT_FILENAME_DOWN."\?bookid=\$3&type=\$2 [L]\r\n";
            $str.="RewriteRule (.*)".str_replace('{bookid}','([0-9]+)',PT_REURL_READEND).'$ $1'.PT_FILENAME_READEND."\?bookid=\$2 [L]\r\n";
            $str.="RewriteRule (.*)".str_replace('{cutid}','([0-9]+)',str_replace('{bookid}','([0-9]+)',PT_REURL_READ)).'$ $1'.PT_FILENAME_READ."\?cutid=\$2&bookid=\$3 [L]\r\n";
            $str.="RewriteRule (.*)".str_replace('{cutid}','([0-9]+)',str_replace('{bookid}','([0-9]+)',str_replace('{chapterid}','([0-9]+)',PT_REURL_CHAPTER))).'$ $1'.PT_FILENAME_CHAPTER."\?cutid=\$2&bookid=\$3&chapterid=\$4 [L]\r\n";
            $reurlfile=PT_DIR.'httpd.ini';
            break;
        case 'apache':
            $str="<IfModule mod_rewrite.c>\r\nRewriteEngine On\r\n\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{sortid}','([0-9]+)',str_replace('{page}','([0-9]+)',PT_REURL_SORT)).'$ $1'.PT_FILENAME_SORT."\?sortid=\$2&page=\$3 [L]\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{page}','([0-9]+)',PT_REURL_OVER).'$ $1'.PT_FILENAME_OVER."\?page=\$2 [L]\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{topid}','(.*)',str_replace('{page}','([0-9]+)',PT_REURL_TOP)).'$ $1'.PT_FILENAME_TOP."\?topid=\$2&page=\$3 [L]\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{topid}','(.*)',str_replace('{page}','([0-9]+)',PT_REURL_TOPOVER)).'$ $1'.PT_FILENAME_TOPOVER."\?topid=\$2&page=\$3 [L]\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{bookid}','([0-9]+)',PT_REURL_BOOK).'$ $1'.PT_FILENAME_BOOK."\?bookid=\$2 [L]\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{type}','(.*)',str_replace('{bookid}','([0-9]+)',PT_REURL_DOWN)).'$ $1'.PT_FILENAME_DOWN."\?bookid=\$3&type=\$2 [L]\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{bookid}','([0-9]+)',PT_REURL_READEND).'$ $1'.PT_FILENAME_READEND."?bookid=\$2 [L]\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{cutid}','([0-9]+)',str_replace('{bookid}','([0-9]+)',PT_REURL_READ)).'$ $1'.PT_FILENAME_READ."\?cutid=\$2&bookid=\$3 [L]\r\n";
            $str.="RewriteRule ^(.*)".str_replace('{cutid}','([0-9]+)',str_replace('{bookid}','([0-9]+)',str_replace('{chapterid}','([0-9]+)',PT_REURL_CHAPTER))).'$ $1'.PT_FILENAME_CHAPTER."?\cutid=\$2&bookid=\$3&chapterid=\$4 [L]\r\n";
            $reurlfile=PT_DIR.'.htaccess';
            break;
        case 'nginx':
            $str="#你可以将这个文件直接用include导入配置文件，也可以复制这个文件的规则部分内容到nginx配置文件的相应的位置\r\n";
			$str.="location / {\r\n\r\n";
            $str.="rewrite \"^(.*)".str_replace('{sortid}','([0-9]+)',str_replace('{page}','([0-9]+)',PT_REURL_SORT)).'$" $1'.PT_FILENAME_SORT."?sortid=\$2&page=\$3 last;\r\n";
            $str.="rewrite \"^(.*)".str_replace('{page}','([0-9]+)',PT_REURL_OVER).'$" $1'.PT_FILENAME_OVER."?page=\$2 last;\r\n";
            $str.="rewrite \"^(.*)".str_replace('{topid}','(.*)',str_replace('{page}','([0-9]+)',PT_REURL_TOP)).'$" $1'.PT_FILENAME_TOP."?topid=\$2&page=\$3 last;\r\n";
            $str.="rewrite \"^(.*)".str_replace('{topid}','(.*)',str_replace('{page}','([0-9]+)',PT_REURL_TOPOVER)).'$" $1'.PT_FILENAME_TOPOVER."?topid=\$2&page=\$3 last;\r\n";
            $str.="rewrite \"^(.*)".str_replace('{bookid}','([0-9]+)',PT_REURL_BOOK).'$" $1'.PT_FILENAME_BOOK."?bookid=\$2 last;\r\n";
            $str.="rewrite \"^(.*)".str_replace('{type}','(.*)',str_replace('{bookid}','([0-9]+)',PT_REURL_DOWN)).'$" $1'.PT_FILENAME_DOWN."?bookid=\$3&type=\$2 last;\r\n";
            $str.="rewrite \"^(.*)".str_replace('{bookid}','([0-9]+)',PT_REURL_READEND).'$" $1'.PT_FILENAME_READEND."?bookid=\$2 last;\r\n";
            $str.="rewrite \"^(.*)".str_replace('{cutid}','([0-9]+)',str_replace('{bookid}','([0-9]+)',PT_REURL_READ)).'$" $1'.PT_FILENAME_READ."?cutid=\$2&bookid=\$3 last;\r\n";
            $str.="rewrite \"^(.*)".str_replace('{cutid}','([0-9]+)',str_replace('{bookid}','([0-9]+)',str_replace('{chapterid}','([0-9]+)',PT_REURL_CHAPTER))).'$" $1'.PT_FILENAME_CHAPTER."?cutid=\$2&bookid=\$3&chapterid=\$4 last;\r\n";
            $str.="};";
            $reurlfile=PT_DIR.'PTcms.conf';
            break;
        default:
          echo "error 参数错误";
    }
    $result=$pt->writeto($reurlfile,$str);
    if ($result){
        $msg="1|恭喜您，伪静态规则文件生成成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='config_reurl.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
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
	<p>您当前位置： 系统设置 &raquo; 伪静态设置</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>伪静态规则设置</span></li>
        <li class="btn1" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title1" ><a href="javascript:void(0);">规则设置</a></li>
		<li class="btn0" onclick="nTabs('rightTop',this,'btn3');" id="rightTop_Title2" ><a href="javascript:void(0);">规则生成</a></li>		
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>程序支持自动生成的伪静态规则是很死板的，必须按照参数顺序等条件设置。</li>
        <li>如果您想设置个性的伪静态，您还是需要对生成的规则进行修改</li>
        <li>在子目录的伪静态规则以及nginx环境下的都需要您自行修改</li>
        <li>规则参数顺序请按照支持的顺序填写！</li>         
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr> 
			<th class="paddingT15">是否开启伪静态:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_reurl" value="true" <?php if ($pt_set['PT_REURL']=='true'){echo 'checked="checked"';}?> />开启伪静态</label>
                <label><input type="radio" name="pt_reurl" value="false" <?php if ($pt_set['PT_REURL']=='false'){echo 'checked="checked"';}?> />关闭伪静态</label>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 首页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_index" type="text" value="<?php echo $pt_set['PT_REURL_INDEX']?>" class="infoTableInput" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 列表页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_sort" type="text" value="<?php echo $pt_set['PT_REURL_SORT']?>" class="infoTableInput" />
                <span class="gray">必备参数：{sortid},{page}</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 全本页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_over" type="text" value="<?php echo $pt_set['PT_REURL_OVER']?>" class="infoTableInput" />
                <span class="gray">必备参数：{page}</span>                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 排行页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_top" type="text" value="<?php echo $pt_set['PT_REURL_TOP']?>" class="infoTableInput" />
                <span class="gray">必备参数：{topid},{page}</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 全本排行页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_topover" type="text" value="<?php echo $pt_set['PT_REURL_TOPOVER']?>" class="infoTableInput" />
                <span class="gray">必备参数：{topid},{page}</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 书页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_book" type="text" value="<?php echo $pt_set['PT_REURL_BOOK']?>" class="infoTableInput" />
                <span class="gray">必备参数：{bookid}</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 下载页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_down" type="text" value="<?php echo $pt_set['PT_REURL_DOWN']?>" class="infoTableInput" />
                <span class="gray">必备参数：{type},{bookid}</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 目录页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_read" type="text" value="<?php echo $pt_set['PT_REURL_READ']?>" class="infoTableInput" />
                <span class="gray">必备参数：{cutid},{bookid}</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 章节页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_chapter" type="text" value="<?php echo $pt_set['PT_REURL_CHAPTER']?>" class="infoTableInput" />
                <span class="gray">必备参数：{cutid},{bookid},{chapterid}</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 阅读尾页地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_reurl_readend" type="text" value="<?php echo $pt_set['PT_REURL_READEND']?>" class="infoTableInput" />
                <span class="gray">必备参数：{bookid}</span>
            </td>
          </tr>
        </table>
        <table class="infoTable" id="rightTop_Content2" style="display: none;">
          <tr>
            <th class="paddingT15"><label for="time_zone"> IIS 伪静态规则：</label></th>
            <td class="paddingT15 wordSpacing5">
                <a href="?type=iis">点击此处生成</a>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> Apache 伪静态规则：</label></th>
            <td class="paddingT15 wordSpacing5">
                <a href="?type=apache">点击此处生成</a>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> Nginx 伪静态规则：</label></th>
            <td class="paddingT15 wordSpacing5">
                <a href="?type=nginx">点击此处生成</a>
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