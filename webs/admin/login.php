<?php
date_default_timezone_set ('PRC');
include 'conn.php';
session_start();
if (isset($_POST['submit'])){
    if ($_POST['admin']==$adminname and md5($_POST['pass'])==$adminpwd){        
        $_SESSION['adminname']=$_POST['admin'];
        $_SESSION['adminpwd']=md5($_POST['pass']);
        $_SESSION['logtime']=date("Y-m-d H:i:s");
        $_SESSION['logip']= $_SERVER["REMOTE_ADDR"];
        $str='<?php'."\n";
        foreach($_SESSION as $key => $value){
            $str.="\$$key='$value';\n";
        }
        $str.='?>';
        $pt->writeto('../data/adminuser.php',$str);
        $_SESSION['logtime']=$logtime;
        $_SESSION['logip']=$logip;
        echo"<script>location.href='main.php';</script>";
    }else{
	    echo"<script>alert('账号或者密码错误！');location.href='?';</script>";
    }
}

if (isset($_SESSION['adminname']) and isset($_SESSION['adminpwd']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    echo "<script>location.href='main.php';</script>";
    exit();
}else{
    session_destroy();
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PT小说程序后台管理登陆 - Powered by PTcms.COM</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function loginok(form){
	if (form.admin.value==""){
		alert("用户名不能为空！");
		form.admin.focus();
		return (false);
	}
	if (form.pass.value==""){
		alert("密码不能为空！");
		form.pass.focus();
		return (false);
	}
	
	return (true);
}

if (self != top) {
    top.location.href = self.location.href;
}
</script>


</head>
<body>
<div id="enter">
    <h1><img alt="PT小说程序管理后台" src="images/enter_logo.gif" /></h1>
    <table>
    <form method="post" onsubmit="return loginok(this)">
        <tr>
            <td width="70">用户名:</td>
            <td colspan="3"><input class="text" type="text" id="admin" name="admin" /></td>
        </tr>
        <tr>
            <td>密&nbsp;&nbsp;&nbsp;码:</td>
            <td class="width160"><input class="text" type="password" name="pass" /></td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <th  colspan="4">
            <input class="btnEnter" type="submit" name="submit" value="" />
            <input class="btnBack" type="button" name="" value="" onclick="go('../')"/>            
            <p>Copyright &copy; 2011 <a href="http://www.ptcms.com" target="_blank">(PTcms.COM) </a> . All Rights Reserved . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></p>
            </th>
        </tr>
    </form>
    </table>
</div>

</body>
</html> 