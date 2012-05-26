<?php
if (isset($_GET['cutid'])) {
	$cutid = $_GET['cutid'];
} else {
	$cutid = 0;
}
if (isset($_GET['bookid'])) {
	$bookid = $_GET['bookid'];
} else {
	$bookid = 0;
}
if (isset($_GET['chapterid'])) {
	$chapterid = $_GET['chapterid'];
} else {
	$chapterid = 0;
}
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$addon='';
$infoupdate=false;
//屏蔽图书
if (PT_BANBOOK=="true"){
	$str=explode('|||',file_get_contents(PT_DIR.'data/banbook.php'));
	$num=count($str);
	if ($num>0){
		for ($i=0;$i<$num;$i++){
			if ($bookid==$str[$i]){
				$pt_type='msg';
				$msg=PT_BANBOOKINFO;
				if (PT_URLTYPE=='web') {
					$url=PT_SITEURL;
					include PT_DIR . 'inc/useroutput.php';
				}else{
					$url='index.php';
					include PT_DIR . 'inc/wapoutput.php';
				}
				exit();
			}
		}
	}
}

//自动保存书签
if (isset($_COOKIE['pt_automark'])) {
	$tempmark=$_COOKIE['pt_automark'];
} else {
	$tempmark="";
}
$mark=explode("&",$tempmark);
$isnew=1;
$bookmark="";
foreach($mark as $markout) {
	if ($markout==$bookid) {
		$isnew=0;
	}
	if ($markout<>"") {
		$bookmark=$bookmark.'&'.$markout;
	}	
}
if ($isnew==1) {
	$bookmark=$bookid.'&'.$bookmark;
}
setcookie("pt_automark",$bookmark,time()+3600*24*30,"/");
?>