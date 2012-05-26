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

//ÆÁ±ÎÍ¼Êé
if (PT_BANBOOK=="true"){
	$str=explode('|||',file_get_contents(PT_DIR.'data/banbook.php'));
	$num=count($str);
	if ($num>0){
		for ($i=0;$i<$num;$i++){
			if ($bookid==$str[$i]){
				$pt_type='msg';
				$msg=PT_BANBOOKINFO;
				$url='index.php';
				include PT_DIR . 'inc/wapoutput.php';
				exit();
			}
		}
	}
}
?>