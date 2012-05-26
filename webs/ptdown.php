<?php
include './inc/global.php';
error_reporting(0);
$bookid=$_GET['bookid'];
$type=$_GET['type'];
$id=$_GET['id'];
if (PT_DEFEND=="true") {
	$defendurl = explode( '|', PT_DEFENDURL );
	$referer = $_SERVER['HTTP_REFERER'];
	foreach( $defendurl as $row ) {
		if ( stristr( $referer, $row ) ) {
			$defend = true;
			break;
		}
	}
	if ( empty( $defend ) ) {
		$pt_type='msg';
		$msg="本站严禁盗链下载，请您从本站内部下载！";
		$url=$pt->getdownurl($bookid,$type);
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}
if(PT_DOWNLOGIN=="true"){
	if (isset($_COOKIE['pt_username'])){
		$username = $_COOKIE['pt_username'];
	}else{
		$username = "";
	}
	if ($username=="" or !file_exists(PT_DIR.'data/user/'.$username.'/info.php')){
		setcookie("pt_username","",time()-41536000,"/");
		$pt_type='msg';
		$msg="您尚未登录，下载电子书请先登录！";
		$url=PT_SITEURL."user/login.php";
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}
include PT_DIR . PT_RULESDIR . PT_RULE . '/down.php';
$pt_downurl=$downlist[$id]['url'];
if(empty($pt_downurl)){
	$pt_downurl=$pt->getdownurl($bookid);
}
header("Location: $pt_downurl");
?>