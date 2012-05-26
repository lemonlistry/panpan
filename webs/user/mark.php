<?php
include 'usercheck.php';

include '../data/user/'.$username.'/mark.php';
$usermarknum=$pt_user_marknum[$userlv];
$usermarkc=$pt_user_markc[$userlv];

if (isset($_POST['dochange'])){
	unset($_POST['dochange']);
	for ($i=1;$i<=$usermarkc;$i++){
		$markname[$i]=$_POST[$i];		
	}
	$str="<?php\n";
	for ($i=1;$i<=10;$i++){
		$str.="\$markname['$i']='".$markname[$i]."';\n";
		$str.="\$markbook['$i']='".$markbook[$i]."';\n";
	}
	$str.='?>';
	$file='../data/user/'.$username.'/mark.php';
	$result=$pt->writeto($file,$str);
	if ($result){
		$pt_type='msg';
		$msg="书架名称修改成功！";
		$url=PT_SITEURL."user/mark.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}else{
		$pt_type='msg';
		$msg="书架名称修改失败！";
		$url=PT_SITEURL."user/mark.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

$pt_type='mark';
include PT_DIR . 'inc/useroutput.php';
?>