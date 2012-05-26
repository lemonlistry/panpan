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
    if ($pt_set['PT_RULE']!=$_POST['pt_rule']){
        $filename=PT_DIR.'cache/'.PT_TPLDIR.$_POST['pt_tpl'].'/block.tpl.php';  
        unlink($filename);
        $filename=PT_DIR.'cache/'.PT_TPLDIR.$_POST['pt_tpl'].'/blocklist.tpl.php';  
        unlink($filename);
        $filename=PT_DIR.'cache/'.PT_RULESDIR.$_POST['pt_rule'].'/block.list.php';  
        unlink($filename);
    }
    $setfile= '../data/config.inc.php';
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
	$url='config_base.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
function tree($directory,$check){
    global $pt_set;
    $mydir=dir($directory);
    while($file=$mydir->read()){
    if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")){
        if (file_exists("$directory/$file/rules.set.php") and strpos($directory,'rules')){
            include "$directory/$file/rules.set.php";
            $name=$pt_rules_name.'('.$pt_rules_copyurl.')';
        }elseif (file_exists("$directory/$file/templets.set.php") and strpos($directory,'templets')){
            include "$directory/$file/templets.set.php";
            $name=$pt_templets_name;
        }else{
            $name=$file.'(不可用，缺乏必需文件)';
        }
    	if ($file==$check)
    	{
    		echo "<option value=$file selected='true'>$name</option>";
    	}else
    	{
            echo "<option value=$file>$name</option>";
    	}
    }
    }
    $mydir->close();
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
	<p>您当前位置： 系统设置 &raquo; 基本参数</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>基本设置</span></li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">         
          <tr>
            <th class="paddingT15"><label for="time_zone"> 网站名称：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_sitename" type="text" value="<?php echo $pt_set['PT_SITENAME']?>" class="infoTableInput" />
                <span class="gray">网站名称，可以在标题及底部中显示。</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> 网站地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_siteurl" type="text" value="<?php echo $pt_set['PT_SITEURL']?>" class="infoTableInput" />
                <span class="gray">网站访问的地址，请注意需加上最前面的<font color="red"><b>'http://'</b></font>和最后的<font color="red"><b>'/'</b></font>。</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_complete"> 网站短地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_shorturl" type="text" value="<?php echo $pt_set['PT_SHORTURL']?>" class="infoTableInput" />
                <span class="gray">网站短地址，一般去除http://及最后的/,该地址常用在网站的宣传上。</span>
    		</td>
          </tr>
		  <tr>
            <th class="paddingT15"><label for="time_format_simple"> WAP地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_wapurl" type="text" value="<?php echo $pt_set['PT_WAPURL']?>" class="infoTableInput" />
                <span class="gray">WAP访问的地址，使用此地址访问后自动转向为http://yourdomain/wap(请使用<font color="red"><b>小写</b></font>，不需要带<font color="red"><b>'http://'</b></font>和最后的<font color="red"><b>'/'</b></font>)。</span>
    		</td>
          </tr>
		  <tr>
            <th class="paddingT15"><label for="time_format_simple"> WAP编码：</label></th>
            <td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_wapchs" value="utf-8" <?php if ($pt_set['PT_WAPCHS']=='utf-8' or !isset($pt_set['PT_WAPCHS'])){echo 'checked="checked"';}?> />UTF-8</label>
                <label><input type="radio" name="pt_wapchs" value="gbk" <?php if ($pt_set['PT_WAPCHS']=='gbk'){echo 'checked="checked"';}?>/>GBK</label>
                <span class="gray">WAP模式访问页面编码，UTF-8 必须 iconv 编码库支持。</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_complete"> 站长名称：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_zzname" type="text" value="<?php echo $pt_set['PT_ZZNAME']?>" class="infoTableInput" />
                <span class="gray">站长名称，在页面中输出用于用户与站长联系时如何称谓。</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> 站长 Q Q：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_zzqq" type="text" value="<?php echo $pt_set['PT_ZZQQ']?>"  class="infoTableInput" />
                <span class="gray">站长联系QQ，在页面中输出用于用户与站长联系。</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> 站长邮箱：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_zzemail" type="text" value="<?php echo $pt_set['PT_ZZEMAIL']?>"  class="infoTableInput" />
                <span class="gray">站长联系邮箱，在页面中输出用于用户与站长联系。</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> 网站备案信息代码：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_beian" type="text" value="<?php echo $pt_set['PT_BEIAN']?>"  class="infoTableInput" />
                <span class="gray">如果网站已备案，在此输入您的 ICP 备案信息。</span>
            </td>
          </tr>
          <tr> 
			<th class="paddingT15">目标站选择:</th> 
			<td class="paddingT15 wordSpacing5">
                <select name="pt_rule" style="width: 260px;">
					<?php  tree("../rules",$pt_set['PT_RULE']); ?>
                </select>
                <span class="gray">网站所偷取的目标站,选项为目标站标识即规则目录的目录名。</span>
            </td> 
		  </tr>          
          <tr> 
			<th class="paddingT15">模板选择:</th> 
			<td class="paddingT15 wordSpacing5">
                <select name="pt_tpl" style="width: 260px;">
					<?php  tree("../templets",$pt_set['PT_TPL']); ?>
                </select>
                <span class="gray">网站所偷取的目标站,选项为目标站标识即规则目录的目录名。</span>
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