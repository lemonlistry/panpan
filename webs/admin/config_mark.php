<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/mark.php';
include $setfile;

if (isset($_POST['save'])){
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
	$url='config_mark.php';
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
	<p>您当前位置： 系统设置 &raquo; 功能管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>图片水印设置</span></li>
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>水印位置:有10种状态，1-9以外为随机位置；</li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1为顶端居左，2为顶端居中，3为顶端居右；</li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4为中部居左，5为中部居中，6为中部居右；</li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7为底端居左，8为底端居中，9为底端居右；</li>
        <li>这个功能仅仅是简单的加个水印，启不到什么大作用，也做不到经常见到的水印效果；</li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">          
          <tr> 
			<th class="paddingT15">水印模式:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_mark_type" value="pic" <?php if ($pt_mark_type=='pic'){echo 'checked="checked"';}?> />图片模式</label>
                <label><input type="radio" name="pt_mark_type" value="text" <?php if ($pt_mark_type=='text'){echo 'checked="checked"';}?> />文字模式</label>                
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 水印位置：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_where" type="text" value="<?php echo $pt_mark_where?>" class="infoTableInput" />
                <span class="gray">如果同时在多个位置添加请用“|”隔开</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 水印图片地址：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_picurl" type="text" value="<?php echo $pt_mark_picurl?>" class="infoTableInput" />
                <span class="gray">水印图片的地址，相对于根目录，不带最开始的“/”。</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 水印文字内容：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_textstr" type="text" value="<?php echo $pt_mark_textstr?>" class="infoTableInput" />
                             
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 水印文字大小：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_textsize" type="text" value="<?php echo $pt_mark_textsize?>" class="infoTableInput" />
                <span class="gray">单位px</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 水印文字颜色：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_mark_textcolor" type="text" value="<?php echo $pt_mark_textcolor?>" class="infoTableInput" />
                <span class="gray">如#ff0000红色。</span>
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