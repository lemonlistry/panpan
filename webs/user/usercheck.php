<?php
include '../inc/global.php';
include '../data/user.php';
if (isset($_COOKIE['pt_username'])){
	$username = $_COOKIE['pt_username'];
}else{
	$username = "";
}
if ($username=="" or !file_exists('../data/user/'.$username.'/info.php')) {
	setcookie("pt_username","",time()-41536000,"/");
	$pt_type='msg';
	$msg="µÇÂ¼³¬Ê±£¬ÇëÖØÐÂµÇÂ¼£¡";
	$url=PT_SITEURL."user/login.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
include '../data/user/'.$username.'/log.php';
include '../data/user/'.$username.'/info.php';
include '../data/user/'.$username.'/point.php';
$logtimelast=explode(' ',$logtime);
$logtimenow=date("Y-m-d");
if ($logtimenow != $logtimelast['0']) {
	$dayuserpoint=$userpoint+$pt_user_loginpoint;
	$daypmstr=file_get_contents('../data/user/'.$username_chk.'/pm.php');
	$daypmnum=substr_count($pmstr,'1~|~1');
	$daylogtime=date("Y-m-d H:i:s");
	$daylogip=$_SERVER["REMOTE_ADDR"];
	$str='<?php'."\n";
	$str.="\$logtime='".$daylogtime."';\n";
	$str.="\$logip='".$daylogip."';\n";
	$str.="?>";
	$file='../data/user/'.$username.'/log.php';
	$result=$pt->writeto('../data/user/'.$username.'/log.php',$str);
	$str='<?php'."\n";
	$str.="\$userpoint='".$dayuserpoint."';\n";
	$str.="\$userlv='".$userlv."';\n";
	$str.="\$comepoint='".$comepoint."';\n";
	$str.="\$comenum='".$comenum."';\n";
	$str.="?>";
	$result=$pt->writeto('../data/user/'.$username.'/point.php',$str);
	setcookie("pt_userpmnum",$daypmnum,time()+86400,"/");
	setcookie("logtime",$logtime,time()+86400,"/");
	setcookie("logip",$logip,time()+86400,"/");
}
?>