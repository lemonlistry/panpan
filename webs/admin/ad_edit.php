<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

if (isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    $msg="0|编辑失败，无法获取链接id";
    $url='ad_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
}
//链接数据库
include '../data/ad/'.$id.'.php';

if (isset($_POST["save"])){    
    unset($_POST["save"]);    
    $str="<?php\n";
    foreach ($_POST as $key=>$value){
        $str.="\$$key=<<<flink\n".stripslashes($value)."\nflink;\n";
    }
    $str.="?>";
    $result=$pt->writeto('../data/ad/'.$_POST['adid'].'.php',$str);
    $jsadcode=htmltojs($_POST['adcode']);
    $result=$pt->writeto(PT_DIR.'files/'.PT_ADDIR.$_POST['adid'].'.js',$jsadcode);  
    if ($result){
        $msg="1|恭喜您，修改广告成功";
    }else{
        $msg="0|很遗憾，添加广告失败";
    }
    
	$url='ad_view.php?id='.$_POST['adid']; 
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
	<p>您当前位置： 系统工具 &raquo;  广告管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>广告编辑</span></li>
        <li><a href="ad_add.php">添加广告</a></li>
        <li><a href="ad_list.php">广告列表</a></li>
    </ul>
</div>

<div class="info" >
    <form method="post">        
        <table class="infoTable">
          <tr>
            <th class="paddingT15"> 广告标识：</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="adid" value="<?php echo $adid?>" readonly="readonly"/>                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 广告名称：</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="adname" value="<?php echo $adname?>" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 广告尺寸：</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="adsize" value="<?php echo $adsize?>" />
            </td>
          </tr>               
          <tr>
            <th class="paddingT15"> 广告备注：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:60px;" name="adinfo"><?php echo $adinfo?></textarea>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 广告代码：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode"><?php echo $adcode?></textarea>
            </td>
          </tr>
          <tr>
            <th></th>
            <td class="ptb20">
    			<input class="formbtn" type="submit" name="save" value="更新广告" />
            </td>
          </tr>
        </table>
        
        
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>