<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname'] == $adminname and $_SESSION['adminpwd'] ==
    $adminpwd) {

} else {
    echo "<script>location.href='login.php';</script>";
    exit();
}
if (isset($_POST["save"])) {
    unset($_POST['save']);
    $username=$_POST['username'];
    $_POST['password']=md5($_POST['password']);
    //写入资料信息
    if (file_exists('../data/user/'.$username.'/info.php')){
        $msg = "0|用户已经存在";
        $url = 'user_add.php';
        echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
        exit();
    }else{            
        $str='<?php'."\n";
        foreach($_POST as $key => $value){
            $str.="\$$key='$value';\n";
        }
        $str.="\$regdate='".date("Y-m-d",time())."';\n";
        $str.="?>";
        $file='../data/user/'.$username.'/info.php';
        $result=$pt->writeto($file,$str);
        //建立登陆日志
        $str='<?php'."\n";
        $str.="\$logtime='".date("Y-m-d H:i:s")."';\n";
        $str.="\$logip='".$_SERVER["REMOTE_ADDR"]."';\n";
        $str.="?>";
        $file='../data/user/'.$username.'/log.php';
        $result=$pt->writeto($file,$str);
        //建立积分文档
        $str="<?php\n";
        $str.='$userlv="1"'.";\r\n";
        $str.='$userpoint="'.$pt_user_regpoint.'"'.";\r\n";
        $str.='$comepoint="0"'.";\r\n";
        $str.='$comenum="0"'.";\r\n";
        $str.='?>';
        $file='../data/user/'.$username.'/point.php';
        $result=$pt->writeto($file,$str);
        //建立pm文档
        $file='../data/user/'.$username.'/pm.php';
        $result=$pt->writeto($file,"");
        //建立好友文档
        $file='../data/user/'.$username.'/friend.php';
        $result=$pt->writeto($file,"");
        //建立书架文档
        $str="<?php\n";
        for ($i=1;$i<=10;$i++){
            $str.="\$markname['$i']='我的书架$i';\n";
            $str.="\$markbook['$i']='';\n";
        }
        $str.='?>';
        $file='../data/user/'.$username.'/mark.php';
        $result=$pt->writeto($file,$str);
    
        $msg = "1|恭喜您，添加用户成功";
        $url = 'user_add.php';
        echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
        exit();
    }
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
		<li><span>添加用户</span></li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">          
            <tr>
                <th class="paddingT15"><label for="time_zone"> 用户名：</label></th>
                <td class="paddingT15 wordSpacing5">
                    <input name="username" type="text" value="" class="infoTableInput" />
                </td>
            </tr>          
            <tr>
              <th class="paddingT15">密码：</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="password" type="text"   value="123456" />
              <span>默认密码为123456</span>
            </tr>
            <tr>
              <th class="paddingT15">E-mail：</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="email" type="text"   value="" />
              </td>
            </tr>
            <tr>
              <th class="paddingT15">QQ号码：</th>
              <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="qq" type="text"    value="" />
              </td>
            </tr>
            <tr>
                <th class="paddingT15">姓名：</th>
                <td class="paddingT15 wordSpacing5"><input class="infoTableInput" type="text" name="turename" value=""  class=""  /> </td>
            </tr>
            <tr>
                <th class="paddingT15">性别：</th>
                <td class="paddingT15 wordSpacing5"><span style="width:80px"><label><input type="radio" name="sex"  value="男" style="border:0px"   checked="checked" /> 男</label></span> <span style="width:80px"><label><input type="radio" name="sex" value="女" style="border:0px"   /> 女</label></span> </td>
            </tr>
            <tr>
                <th class="paddingT15">生日：</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" type="text" name="birthday" id="birthday" value="" />
					<link rel="stylesheet" type="text/css" href="<?php echo PT_SITEURL;?>templets/user/css/calendar.css"/>
					<script type="text/javascript" src="<?php echo PT_SITEURL;?>templets/user/js/calendar.js"></script>
               </td>
            </tr>
            <tr>
                <th class="paddingT15">头像：</th>
                <td class="paddingT15 wordSpacing5"><input class="infoTableInput"  type="text" name="userimg" value="../images/face/01.gif" /> <a href='javascript:///' onclick="window.open('<?php echo PT_SITEURL;?>user/face.html','chooseface','left=190px,top=110px,Width=537px,Height=425px,resizable=no,scrolls=no')">选择头像</a></td>
            </tr>
            <tr>
            <th class="paddingT15">来自：</th>
                    <td class="paddingT15 wordSpacing5">
                        <select id="usercity" name="usercity">
                            <option value="北京">北京</option>
                            <option value="上海">上海</option>
                            <option value="天津">天津</option>
                            <option value="重庆">重庆</option>
                            <option value="河北">河北</option>
                            <option value="山西">山西</option>
                            <option value="内蒙古">内蒙古</option>
                            <option value="辽宁">辽宁</option>
                            <option value="吉林">吉林</option>
                            <option value="黑龙江">黑龙江</option>
                            <option value="江苏">江苏</option>
                            <option value="浙江">浙江</option>
                            <option value="安徽">安徽</option>
                            <option value="福建">福建</option>
                            <option value="江西">江西</option>
                            <option value="山东">山东</option>
                            <option value="河南">河南</option>
                            <option value="湖北">湖北</option>
                            <option value="湖南">湖南</option>
                            <option value="广东">广东</option>
                            <option value="广西">广西</option>
                            <option value="海南">海南</option>
                            <option value="四川">四川</option>
                            <option value="贵州">贵州</option>
                            <option value="云南">云南</option>
                            <option value="西藏">西藏</option>
                            <option value="陕西">陕西</option>
                            <option value="甘肃">甘肃</option>
                            <option value="青海">青海</option>
                            <option value="云南">云南</option>
                            <option value="宁夏">宁夏</option>
                            <option value="新疆">新疆</option>
                            <option value="香港">香港</option>
                            <option value="澳门">澳门</option>
                            <option value="台湾">台湾</option>
                            <option value="其他">其他</option>
                        </select>
                    </td>
            </tr>
            <tr>
            <th class="paddingT15">电话：</th><td class="paddingT15 wordSpacing5"><input type="text" name="telephone" value="" size="20" class="infoTableInput" /> </td>
            </tr>
            <tr>
            <th class="paddingT15">MSN：</th><td class="paddingT15 wordSpacing5"><input type="text" name="msn" value="" class="infoTableInput" /> </td>
            </tr>
            <tr>
            <th class="paddingT15">个人主页：</th><td class="paddingT15 wordSpacing5"><input type="text" name="myurl"  value="" class="infoTableInput" /> </td>
            </tr>
        </table>
        <table class="infoTable">
          <tr>
            <th class="paddingT15"></th>
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