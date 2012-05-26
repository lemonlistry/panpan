<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/user.php';
include $setfile;

$lvnum['1']="一";
$lvnum['2']="二";
$lvnum['3']="三";
$lvnum['4']="四";
$lvnum['5']="五";
$lvnum['6']="六";
$lvnum['7']="七";
$lvnum['8']="八";
$lvnum['9']="九";
$lvnum['10']="十";

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
                }else{
                    $str.="\$".$key."['".$akey."']='".$avalue."';\n";
                }
                
            }
        }else{
            $str.="\$$key='".valuedo($value)."';\n";
        }
        
    }
    
    $str.="?>";    
    $result=$pt->writeto($setfile,$str);    
    if ($result){
        $msg="1|恭喜您，修改参数成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='config_user.php';
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
	<p>您当前位置： 系统设置 &raquo; 用户管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>用户中心参数设置</span></li>
		<li class="btn1" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title1" ><a href="javascript:void(0);">基本设置</a></li>
		<li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title2" ><a href="javascript:void(0);">积分级别</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title3" ><a href="javascript:void(0);">级别称号</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title4" ><a href="javascript:void(0);">书架书量</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title5" ><a href="javascript:void(0);">书架个数</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title6" ><a href="javascript:void(0);">短信条数</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title7" ><a href="javascript:void(0);">推荐票数</a></li>
        <li class="btn0" onclick="nTabs('rightTop',this,'btn1');" id="rightTop_Title8" ><a href="javascript:void(0);">好友个数</a></li>
	</ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>系统最多设置10个用户级别，如果不启用这么多，只需将相应的积分级别设置为较大的数目即可</li>
        <li>系统为每个用户至多分配10个书架，每个书架建议设置可以保存50本之内书</li>        
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
            <th class="paddingT15"><label for="time_zone"> 初始积分：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_user_regpoint" type="text" value="<?php echo $pt_user_regpoint?>" class="infoTableInput" />
                <span class="gray">注册时赠送的积分</span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> 登陆积分：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_user_loginpoint" type="text" value="<?php echo $pt_user_loginpoint?>" class="infoTableInput" />
                <span class="gray">每登陆一次获得多少积分</span>
    		</td>
          </tr> 
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> 下载积分：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_user_downpoint" type="text" value="<?php echo $pt_user_downpoint?>" class="infoTableInput" />
                <span class="gray">每下载一本电子书需要消费多少积分</span>
    		</td>
          </tr>
          <tr>
            <th class="paddingT15"><label for="time_format_simple"> 推广积分：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_user_comepoint" type="text" value="<?php echo $pt_user_comepoint?>" class="infoTableInput" />
                <span class="gray">每推广一个人来本站可以获得多少积分</span>
    		</td>
          </tr>         
        </table>
        
        <table class="infoTable" id="rightTop_Content2"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >升级等级<?php echo $lvnum[$i]?>所需积分 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_lvpoint[$i]"?>" type="text" value="<?php echo $pt_user_lvpoint[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >升级 VIP 所需积分 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_lvpoint[vip]"?>" type="text" value="<?php echo $pt_user_lvpoint['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content3"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >等级<?php echo $lvnum[$i]?> 称号 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_lvname[$i]"?>" type="text" value="<?php echo $pt_user_lvname[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP 称号 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_lvname[vip]"?>" type="text" value="<?php echo $pt_user_lvname['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content4"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >等级<?php echo $lvnum[$i]?>书架藏书数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_marknum[$i]"?>" type="text" value="<?php echo $pt_user_marknum[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP 书架藏书数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_marknum[vip]"?>" type="text" value="<?php echo $pt_user_marknum['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content5"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >等级<?php echo $lvnum[$i]?> 书架个数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_markc[$i]"?>" type="text" value="<?php echo $pt_user_markc[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP 书架个数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_markc[vip]"?>" type="text" value="<?php echo $pt_user_markc['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content6"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >等级<?php echo $lvnum[$i]?> 短消息条数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_pmnum[$i]"?>" type="text" value="<?php echo $pt_user_pmnum[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP 短消息条数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_pmnum[vip]"?>" type="text" value="<?php echo $pt_user_pmnum['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        
        <table class="infoTable" id="rightTop_Content7"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >等级<?php echo $lvnum[$i]?> 推荐票数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_votenum[$i]"?>" type="text" value="<?php echo $pt_user_votenum[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP 推荐票数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_votenum[vip]"?>" type="text" value="<?php echo $pt_user_votenum['vip']?>" class="infoTableInput" />
            </td>
          </tr>
        </table>
        <table class="infoTable" id="rightTop_Content8"  style="display:none">
          <?php
            for($i=1;$i<=10;$i++){
          ?>      
          <tr>
            <th class="paddingT15"><label >等级<?php echo $lvnum[$i]?> 好友个数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_friendnum[$i]"?>" type="text" value="<?php echo $pt_user_friendnum[$i]?>" class="infoTableInput" />
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <th class="paddingT15"><label >VIP 好友个数 ：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="<?php echo "pt_user_friendnum[vip]"?>" type="text" value="<?php echo $pt_user_friendnum['vip']?>" class="infoTableInput" />
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