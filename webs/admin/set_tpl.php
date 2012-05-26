<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
$setfile= '../'.PT_TPLDIR.PT_TPL.'/templets.set.php';
include $setfile;

if (isset($_POST["save"])){
    unset($_POST["save"]);
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){            
            foreach($_POST[$key] as $akey => $avalue){
                if (is_array($_POST[$key][$akey])){
                    foreach($_POST[$key][$akey] as $bkey => $bvalue){
                        $str.="\$".$key."['".$akey."']['".$bkey."']='".$bvalue."';\n";
                    }
                }
                
            }
        }else{
            $str.="\$$key='".valuedo($value)."';\n";
        }
        
    }    
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    
	unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/nav.tpl.php');
    if ($result){
        $msg="1|恭喜您，修改规则成功";
    }else{
        $msg="0|很遗憾，修改失败";
    }
	$url='set_tpl.php';
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
	<p>您当前位置： 模板管理 &raquo; 模板设置</p>
</div>
<form method="post" > 
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>模板基本信息</span></li>		
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> 模板名称：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_name" type="text" value="<?php echo $pt_templets_name?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 模板作者：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_author" type="text" value="<?php echo $pt_templets_author?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 模板原创：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_copyurl" type="text" value="<?php echo $pt_templets_copyurl?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 模板演示：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_demourl" type="text" value="<?php echo $pt_templets_demourl?>" class="infoTableInput" />                
            </td>
          </tr>
        </table>
    </div>
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>模板导航设置</span></li>		
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable" id="rightTop_Content1">
          <?php for ($i=1;$i<=count($pt_templets_nav);$i++) {?>  
          <tr>
            <th class="paddingT15">
                <label for="time_zone">
                    <input name="pt_templets_nav[<?php echo $i?>][name]" type="text" value="<?php echo $pt_templets_nav[$i]['name']?>" style="width: 120px;" />
                </label>
            </th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_nav[<?php echo $i?>][url]" type="text" value="<?php echo $pt_templets_nav[$i]['url']?>" style="width: 450px;" />                
            </td>
          </tr>
          <?php } ?>    
        </table>
    </div>
    
    <div class="info" >        
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="save" value="提交" />
                <input class="formbtn" type="reset" name="reset" value="重置" />
            </td>
          </tr>
        </table>
  
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>