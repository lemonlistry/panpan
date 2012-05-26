<?php
if (isset($_POST['username'])){
	$username=$_POST['username'];
	$password=MD5($_POST['password']);
	$email=$_POST['email'];
	$qq=$_POST['qq'];
	if (!file_exists('../data/user/'.$username.'')){
		include '../inc/global.php';
		$pt_type='reg3';
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}else{
		echo"<script>alert('该用户名已经存在！');location.href='reg2.php';</script>";
		exit();
	}
}else{
	echo"<script>alert('来路不正确！');location.href='reg.php';</script>";
	exit();
}
?>