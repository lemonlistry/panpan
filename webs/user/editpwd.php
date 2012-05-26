<?php
include 'usercheck.php';

if (isset($_POST['dosubmit'])){
	unset($_POST['dosubmit']);
	if ($password==md5($_POST['old_password'])){
		$newpassword=md5($_POST['password']);
		$file='../data/user/'.$username.'/info.php';
		$str=file_get_contents($file);
		$str=str_replace($password,$newpassword,$str);
		$result=$pt->writeto($file,$str);
		if ($result){
			setcookie("pt_username","",time()-41536000,"/");
			$pt_type='msg';
			$msg="修改成功，请重新登录！";
			$url=PT_SITEURL."user/login.php";
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}else{
			$pt_type='msg';
			$msg="修改失败，请联系管理员！";
			$url=PT_SITEURL."user/editpwd.php";
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}
	}else{
		$pt_type='msg';
		$msg="修改失败，原密码错误！";
		$url=PT_SITEURL."user/editpwd.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

$pt_type='editpwd';
include PT_DIR . 'inc/useroutput.php';
?>