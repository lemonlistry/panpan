<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
$setfile= '../'.PT_RULESDIR.PT_RULE.'/rules.set.php';
include $setfile;
if (isset($_POST["save"])){
    unset($_POST["save"]);
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){            
            foreach($_POST[$key] as $akey => $avalue){
                $str.="\$".$key."['".$akey."']='".$avalue."';\n";
            }
        }else{
            $str.="\$$key='".valuedo($value)."';\n";
        }
    }    
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    if ($result){
        $msg="1|恭喜您，修改规则成功";
    }else{
        $msg="0|很遗憾，修改失败";
    }
	$url='set_rule.php';
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
	<p>您当前位置： 规则管理 &raquo; 规则设置</p>
</div>
<form method="post" > 
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>规则基本信息</span></li>		
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> 规则名称：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rules_name" type="text" value="<?php echo $pt_rules_name?>" class="infoTableInput" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 规则作者：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rules_author" type="text" value="<?php echo $pt_rules_author?>" class="infoTableInput" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 规则来源：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rules_copyurl" type="text" value="<?php echo $pt_rules_copyurl?>" class="infoTableInput" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 规则演示：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_rules_demourl" type="text" value="<?php echo $pt_rules_demourl?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
    </div>
    
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>规则榜单设置</span></li>		
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> 总点击榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[allclick]" type="text" value="<?php echo $pt_top_list['allclick']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 月点击榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[monthclick]" type="text" value="<?php echo $pt_top_list['monthclick']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 周点击榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[weekclick]" type="text" value="<?php echo $pt_top_list['weekclick']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 总推荐榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[allvote]" type="text" value="<?php echo $pt_top_list['allvote']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 月推荐榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[monthvote]" type="text" value="<?php echo $pt_top_list['monthvote']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 周推荐榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[weekvote]" type="text" value="<?php echo $pt_top_list['weekvote']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 收藏排行榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[goodnum]" type="text" value="<?php echo $pt_top_list['goodnum']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 字数排行榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[fontsize]" type="text" value="<?php echo $pt_top_list['fontsize']?>" style="width: 450px;" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 新书榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[newbook]" type="text" value="<?php echo $pt_top_list['newbook']?>" style="width: 450px;" />
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 全本榜单：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list[overbook]" type="text" value="<?php echo $pt_top_list['overbook']?>" style="width: 450px;" />                
            </td>
          </tr>
        </table>
    </div>
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>榜单偷取规则</span></li>		
    	</ul>
    </div>
    <div class="info" >     
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> 列表块开始位置：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_start" type="text" value="<?php echo valuetoinput($pt_top_list_start)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 列表块结束位置：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_end" type="text" value="<?php echo valuetoinput($pt_top_list_end)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 列表块分隔符：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_split" type="text" value="<?php echo valuetoinput($pt_top_list_split)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 图书id开始位置：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_bookid_start" type="text" value="<?php echo valuetoinput($pt_top_list_bookid_start)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 图书id结束位置：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_bookid_end" type="text" value="<?php echo valuetoinput($pt_top_list_bookid_end)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 图书书名开始位置：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_bookname_start" type="text" value="<?php echo valuetoinput($pt_top_list_bookname_start)?>" class="infoTableInput" />                
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 图书书名结束位置：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_top_list_bookname_end" type="text" value="<?php echo valuetoinput($pt_top_list_bookname_end)?>" class="infoTableInput" />                
            </td>
          </tr>
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