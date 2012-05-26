<?php
include 'usercheck.php';

if ($userlv=='vip'){
	$pt_type='msg';
	$msg="您已达人界极限，请飞升~~~~~~！";
	$url=PT_SITEURL."user/index.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}
$pt_user_lvname['11']=$pt_user_lvname['vip'];
$pt_user_lvpoint['11']=$pt_user_lvpoint['vip'];
$userlevel=$pt_user_lvname[$userlv];
$userlevelup=$pt_user_lvname[$userlv+1];
$usernextlevelpoint=$pt_user_lvpoint[$userlv+1];
if ($usernextlevelpoint<=$userpoint){
	$levelupmsg="<a href='editlevel.php?action=up' style='color:red'>您已达升级条件，点此自助升级</a>";
}else{
	$levelupmsg="您的积分没有达到标准，请继续努力！";
}
$nowinfo="书架个数：$pt_user_markc[$userlv]<br />
单个书架藏书数：$pt_user_marknum[$userlv]<br />
好友上限：$pt_user_friendnum[$userlv]<br />
短消息上限：$pt_user_pmnum[$userlv]";
$userlvup=$userlv+1;
if ($userlvup==11) {
	$userlvup='vip';
}
$upinfo="书架个数：$pt_user_markc[$userlvup]<br />
单个书架藏书数：$pt_user_marknum[$userlvup]<br />
好友上限：$pt_user_friendnum[$userlvup]<br />
短消息上限：$pt_user_pmnum[$userlvup]";
$usermarknum=$pt_user_marknum[$userlv];
$usermarkc=$pt_user_markc[$userlv];

if (isset($_GET['action'])){	
	if ($usernextlevelpoint<=$userpoint){
		if ($userlv==10){
			$userlv='vip';
		}else{
			$userlv++;
		}
		$str='<?php'."\n";
		$str.="\$userpoint='".$userpoint."';\n";
		$str.="\$userlv='".$userlv."';\n";
		$str.="\$comepoint='".$comepoint."';\n";
		$str.="\$comenum='".$comenum."';\n";
		$str.="?>";
		$file='../data/user/'.$username.'/point.php';
		$result=$pt->writeto($file,$str);
		if ($result){
			setcookie("pt_userlv",$pt_user_lvname[$userlv],time()+86400,"/");
			$pt_type='msg';
			$msg="恭喜您，升级成功！";
			$url=PT_SITEURL."user/editlevel.php";
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}else{
			$pt_type='msg';
			$msg="升级失败，请联系管理员！";
			$url=PT_SITEURL."user/index.php";
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}
	}else{
		$pt_type='msg';
		$msg="升级失败，您的积分未达到升级标准！";
		$url=PT_SITEURL."user/editlevel.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

$pt_type='editlevel';
include PT_DIR . 'inc/useroutput.php';
?>