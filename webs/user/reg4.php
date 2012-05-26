<?php
if (isset($_POST['dosubmit'])){
	unset($_POST['dosubmit']);
}else{
	echo"<script>alert('来路不正确！');location.href='reg.php';</script>";
	exit();
}

include '../inc/global.php';
include '../data/user.php';
$username=$_POST['username'];

//写入资料信息
$str='<?php'."\n";
foreach($_POST as $key => $value){
	$str.="\$$key='$value';\n";
}
$str.="\$regdate='".date("Y-m-d")."';\n";
$str.="?>";
$file='../data/user/'.$username.'/info.php';
$result=$pt->writeto($file,$str);
//建立登录日志
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
//建立推荐文档
$file='../data/user/'.$username.'/vote.php';
$str='<?php'."\n";
$str.="\$votenum=1;\n";
$str.="\$votedate='".date("Y-m-d")."';\n";
$str.="?>";
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

//首次登录
setcookie("pt_username",$username,time()+3600,"/");
setcookie("logtime",date("Y-m-d H:i:s"),time()+3600,"/");
setcookie("logip",$_SERVER["REMOTE_ADDR"],time()+3600,"/");
setcookie("pt_userlv",$pt_user_lvname['1'],time()+3600,"/");
setcookie("pt_userpmnum","0",time()+3600,"/");
$pt_type='reg4';
include PT_DIR . 'inc/useroutput.php';
?>