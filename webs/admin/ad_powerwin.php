<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

$id='powerwin';

//链接数据库
include '../data/ad/'.$id.'.php';

if (isset($_POST["save"])){    
    unset($_POST["save"]);    
    $str="<?php\n";
    foreach ($_POST as $key=>$value){
        $str.="\$$key=<<<flink\n".stripslashes($value)."\nflink;\n";        
        $key=$value;
    }
    $str.="?>";
    $result=$pt->writeto('../data/ad/'.$id.'.php',$str);
    $jsadcode1=htmltojs($_POST['adcode1']);
    $jsadcode2=htmltojs($_POST['adcode2']);
    $jsadcode3=htmltojs($_POST['adcode3']);
    $jsadcode4=htmltojs($_POST['adcode4']);
    $jsadcode5=htmltojs($_POST['adcode5']);
    $adcon=file_get_contents('../files/powerwin.txt');
    $comekeyarr=explode('|',$comekey);
    $comekey='"'.$comekeyarr['0'].'"';
    for ($i=1;$i<count($comekeyarr);$i++){
        $comekey.=',"'.$comekeyarr[$i].'"';
    }
    if ($islogin=='true'){
        $islogin='1=1';
    }else{
        $islogin='1>2';
    }
    $adcon=str_replace('{adnum}',$adnum,$adcon);
    $adcon=str_replace('{adcode1}',$jsadcode1,$adcon);
    $adcon=str_replace('{adcode2}',$jsadcode2,$adcon);
    $adcon=str_replace('{adcode3}',$jsadcode3,$adcon);
    $adcon=str_replace('{adcode4}',$jsadcode4,$adcon);
    $adcon=str_replace('{adcode5}',$jsadcode5,$adcon);
    $adcon=str_replace('{islogin}',$islogin,$adcon);
    $adcon=str_replace('{adtime}',$adtime,$adcon);
    $adcon=str_replace('{comekey}',$comekey,$adcon);
    $result=$pt->writeto(PT_DIR.'files/'.PT_ADDIR.$id.'.js',$adcon);
    if ($result){
        $msg="1|恭喜您，修改广告成功";
    }else{
        $msg="0|很遗憾，修改广告失败";
    }
    
	$url='ad_powerwin.php'; 
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
	<p>您当前位置： 系统工具 &raquo; 广告管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>超强弹窗管理</span></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>超强弹窗为普通弹窗的增强版</li>
        <li>可以判断用户是否登录</li>
        <li>可以设置根据来路判断是否弹窗</strong></li>
        <li>可以设置间隔一定时间弹出一次</li>
        <li>可以设置最多5个弹窗轮弹</li>
        <li><b>调用代码为{pt.getad.powerwin},加入到页面模板合适位置处</b></li>
	</ul>
</div>
<div class="info" >
    <form method="post">        
        <table class="infoTable">
          <!--
          <tr> 
			<th class="paddingT15">会员广告:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="islogin" value="true" <?php if ($islogin=='true'){echo 'checked="checked"';}?> />判断登录</label>
                <label><input type="radio" name="islogin" value="false" <?php if ($islogin=='false'){echo 'checked="checked"';}?> />不判断登录</label>
                <span class="gray">是否对登录状态区分，即登陆后是否显示广告，和游客显示的广告是否相同</span>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"> 弹出间隔：</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="adtime" value="<?php echo $adtime?>" />
                <span class="gray">单位分钟</span>                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 来路判断：</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="comekey" value="<?php echo $comekey?>" />
                <span class="gray">输入来路域名中的关键词，比如百度可以为baidu，搜读可以为sodu，用“|”隔开</span>
            </td>
          </tr>               
          <tr>
            <th class="paddingT15"> 轮换数量：</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="adnum" value="<?php echo $adnum?>" />
                <span class="gray">设置下面的广告有多少个参与轮放</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 广告代码1：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode1"><?php echo $adcode1?></textarea>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 广告代码2：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode2"><?php echo $adcode2?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"> 广告代码3：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode3"><?php echo $adcode3?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"> 广告代码4：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode4"><?php echo $adcode4?></textarea>
            </td>
          </tr>
          
          <tr>
            <th class="paddingT15"> 广告代码5：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea style="width:400px;height:100px;" name="adcode5"><?php echo $adcode5?></textarea>
            </td>
          </tr>
          
          <tr>
            <th></th>
            <td class="ptb20">
    			<input class="formbtn" type="submit" name="save" value="更新广告" />
            </td>
          </tr>
          -->
          后台设置功能暂时关闭，请前去files/<?php echo PT_ADDIR;?>目录自行修改powerwin.js文件，然后使用{pt.getad.powerwin}在页面中调用
        </table>
        
        
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>