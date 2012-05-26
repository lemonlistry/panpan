<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/randstr_set.php';
include $setfile;
$mark_text=file_get_contents('../data/randstr.php');
$str=explode('#start#',$mark_text);
$str=explode('#end#',$str['1']);
$mark_text=str_replace('#,','',$str['0']);
if (isset($_POST["save"])){
    unset($_POST['save']);
    $str='<?php'."\n";    
    $str.="\$mark_bgcolor='".$_POST['mark_bgcolor']."';\n";
    $str.="\$mark_size='".$_POST['mark_size']."';\n";    
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    $markstr='<?php
//----------------------------
//以下为手工指定的混淆串
//请修改start和end中间部分，其他地方请勿动
//每行以“#,”开始
//----------------------------
#start#
';
    $markstr.='#,'.str_replace(chr(10),chr(10).'#,',$_POST['mark_text']);
    $markstr.='#end#
?>';
    $markstr=str_replace('#,#end#','#end#',$markstr);
    $result=$pt->writeto('../data/randstr.php',$markstr);
    if ($result){
        $msg="1|恭喜您，修改参数成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='config_randstr.php';
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
	<p>您当前位置： 系统设置 &raquo; 功能设置</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>混淆字设置</span></li>		
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> 模板背景色：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="mark_bgcolor" type="text" value="<?php echo $mark_bgcolor?>" class="infoTableInput" />
                <span class="gray">填写章节页的背景色代码，便于让字体颜色同背景色一致。</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> 文字频繁度：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="mark_size" type="text" value="<?php echo $mark_size?>" class="infoTableInput" />
                <span class="gray">数值越小越频繁，数值可以理解为间隔多少字增加一次混淆字符</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 混淆文字：</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="mark_text"  style="width:550px;height:250px;" ><?php echo $mark_text?></textarea><br /><br />
                <span class="gray" style="color: red;">每行一个，用回车隔开。</span>
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