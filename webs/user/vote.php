<?php
include 'usercheck.php';
//检查推荐书号
if (!empty($_GET['bookid']) and $_GET['bookid']>0){
	$bookid=$_GET['bookid'];
}else{
	$pt_type='msg';
	$msg="参数错误，请重新推荐！";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
//检查推荐票数
include '../data/user/'.$username.'/vote.php';
$uservotenum=$pt_user_votenum[$userlv];
$votedatenow=date("Y-m-d");
if ($votedate==$votedatenow){
	if ($uservotenum<=$votenum){
		$pt_type='msg';
		$msg="您今日的推荐票已用完 ".$uservotenum." 张，无法继续投票！<br />您当前用户等级为 ".$userlv." 级，每日推荐票数为 ".$uservotenum." 张。";
		$url=PT_SITEURL."user/index.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}else{
	$votenum=0;
}
//载入推荐页面
if(empty($_GET['action']) or $_GET['action']!='vote'){
	$pt_type='vote';
	include PT_DIR . 'inc/data.php';
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
//推荐操作
$bookvotenum=intval($_GET['bookvotenum']);
if(empty($bookvotenum) or $bookvotenum<0){
	$pt_type='msg';
	$msg="推荐票数错误，请重新填写！";
	$url=PT_SITEURL."user/vote.php?bookid=".$bookid;
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
//检查推荐票数
if ($bookvotenum > $uservotenum - $votenum){
	$pt_type='msg';
	$msg="推荐票数不足，请重新填写！";
	$url=PT_SITEURL."user/vote.php?bookid=".$bookid;
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
//推荐操作
include PT_DIR . PT_RULESDIR . PT_RULE . '/vote.php';
if (empty($vote)){
	$pt_type='msg';
	$msg="参数错误，请重新推荐！";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
$str='<?php'."\n";
$str.="\$votenum='".($votenum+$bookvotenum)."';\n";
$str.="\$votedate='".$votedatenow."';\n";
$str.="?>";
$file='../data/user/'.$username.'/vote.php';
$result=$pt->writeto($file,$str);
//推荐成功
$pt_type='msg';
$msg="推荐成功，您今日已使用 ".($votenum+$bookvotenum)." 张推荐票，感谢您对作者的支持！<br />您当前用户等级为 ".$userlv." 级，每日拥有推荐票数为 ".$uservotenum." 张。";
$url=$pt->getbookurl($bookid);
include PT_DIR . 'inc/useroutput.php';
?>