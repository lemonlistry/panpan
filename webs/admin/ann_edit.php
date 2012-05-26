<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$dir_name=PT_DIR."data/ann";
$od = opendir($dir_name);
while ($name = readdir($od)){
    $file_path = $dir_name.'/'.$name;
    if (is_file($file_path)){
        $files[] = $file_path;
    }
}
if (isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    $msg="0|编辑失败，无法获取链接id";
    $url='ann_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
}

include $files[$id];
if (isset($_POST["save"])){
    unset($_POST["save"]);
    $str="<?php\n";
    foreach ($_POST as $key=>$value){
        $str.="\$$key=<<<ptann\n$value\nptann;\n";
    }
    $str.="?>";
    $result=$pt->writeto($files[$id],$str);    
    include '../inc/ann.reset.php';
    $msg="1|恭喜您，修改链接成功";
	$url='ann_list.php';
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
<script type="text/javascript" src="js/pkEditor.js"></script>
<script language=JavaScript type=text/javascript>
        var pke=new PKEditor();
        pke.init("/admin/images/", "/admin/inc/","/admin/css/pke.css", false);
</script>
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
	<p>您当前位置： 系统工具 &raquo; 公告管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>编辑公告</span></li>
        <li><a href="ann_add.php">添加公告</a></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>批量删除要现在前面复选框选中在点击批量删除</li>
	</ul>
</div>
<div class="info" >
    <form method="post">
        <table class="infoTable">
          <tr>
            <th class="paddingT15"> 公告名称：</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="annname" value="<?php echo $annname;?>" />
                <label class="field_notice">在网站中显示的公告的名称，<b>必填</b></label>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 公告内容：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="anncontent" style="width: 400px;height:200px;"><?php echo re_br($anncontent); ?></textarea>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 添加人：</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="annwriter" value="<?php echo $annwriter;?>" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 添加时间：</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="anndate" value="<?php echo $anndate;?>" />
            </td>
          </tr>          
          <tr>
            <th></th>
            <td class="ptb20">
    			<input class="formbtn" type="submit" name="save" value="更新链接" />
            </td>
          </tr>
        </table>
        
        
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>