<?php
include 'usercheck.php';

$logtime=$_COOKIE['logtime'];
$logip=$_COOKIE['logip'];
$pmnum=$_COOKIE['pt_userpmnum'];
$userlevel=$pt_user_lvname[$userlv];
$usernextlevelpoint=$pt_user_lvpoint[$userlv+1];
if ($usernextlevelpoint<=$userpoint){
	$levelupmsg="（<a href='editlevel.php' style='color:red'>您已达升级条件，点此自助升级</a>）";
}else{
	$levelupmsg="";
}
$usermarknum=$pt_user_marknum[$userlv];
$usermarkc=$pt_user_markc[$userlv];
include '../data/user/'.$username.'/vote.php';
$uservotenum=$pt_user_votenum[$userlv];
if ($votedate!=date("Y-m-d")){
	$votenum=0;
}

$pt_type='index';
include PT_DIR . 'inc/useroutput.php';
?>