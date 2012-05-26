<?php
include '../inc/global.php';

if (isset($_COOKIE['pt_username'])){
	$pt_type='msg';
	$msg="您已经登录，系统转入用户中心！";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}

$pt_type='login';
include PT_DIR . 'inc/useroutput.php';
?>