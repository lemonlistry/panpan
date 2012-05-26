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
	$url='config_dir.php';
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
	<p>您当前位置： 系统设置 &raquo; 目录参数</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>目录参数设置</span></li>		
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> 程序目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_dir" type="text" value="<?php echo $pt_set['PT_DIR']?>" class="infoTableInput" />
                <span class="gray">程序所在绝对路径。<a href="../plus/check/dircheck.php" target="_blank">点击此处对目录进行校验</a></span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> 广告目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_addir" type="text" value="<?php echo $pt_set['PT_ADDIR']?>" class="infoTableInput" />
                <span class="gray">广告存放目录，请根据需要修改。</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> 模板目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_tpldir" type="text" value="<?php echo $pt_set['PT_TPLDIR']?>" class="infoTableInput" />
                <span class="gray">模板存放目录，不建议修改。</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_complete"> 规则目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rulesdir" type="text" value="<?php echo $pt_set['PT_RULESDIR']?>" class="infoTableInput" />
                <span class="gray">目标站规则存放目录，不建议修改。</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_complete"> 缓存目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_cachedir" type="text" value="<?php echo $pt_set['PT_CACHEDIR']?>" class="infoTableInput" readonly="readonly"/>
                <span class="gray">缓存文件存放目录，系统运行必须目录，禁止修改！</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> 数据目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_datadir" type="text" value="<?php echo $pt_set['PT_DATADIR']?>"  class="infoTableInput" readonly="readonly"/>
                <span class="gray">数据配置文件存放目录，系统运行必须目录，禁止修改！</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> 函数目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_incdir" type="text" value="<?php echo $pt_set['PT_INCDIR']?>"  class="infoTableInput" readonly="readonly"/>
                <span class="gray">函数、类文件存放目录，系统运行必须目录，禁止修改！</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> 文件目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_filesdir" type="text" value="<?php echo $pt_set['PT_FILESDIR']?>"  class="infoTableInput"  readonly="readonly"/>
                <span class="gray">程序文件存放目录，系统运行必须目录，禁止修改！</span>
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