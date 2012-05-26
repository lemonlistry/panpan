<?php
include './inc/global.php';
error_reporting(0);
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
		header("Location:".PT_SITEURL."images/defend.gif");
		exit;
	}
}
$type=$_GET['type'];
$picurl=$_GET["url"];
$bookid=$_GET['bookid'];
$dirid=floor($bookid/1000);
$ext=strtolower(extend_3(basename($picurl)));
if ($ext=="jpg") {
	$header="jpeg";
} else {
	$header=$ext;
}
if (($type=='chapterimg' and PT_CACHE_CHAPTERIMG=="true") or ($type=='bookimg' and PT_CACHE_BOOKIMG=="true")){
	if ($type=='chapterimg'){
		$file=PT_DIR . 'files/images/'.$dirid.'/'.$bookid.'/'.basename($picurl);
	}else{
		$file=PT_DIR . 'files/cover/'.$dirid.'/'.$bookid.'/'.basename($picurl);
	}
	header("Content-type:image/$header");
	if (file_exists($file)){
        echo file_get_contents($file);
        exit;
    }else{
        $str=$pt->getcode($picurl);
		if (strlen($str)>1000 and ($ext=='jpg' or $ext=='jpeg' or $ext=='gif' or $ext=='png' or $ext=='bmp')){
			$pt->writeto($file,$str);
		}
		if ($type=='chapterimg'){
			include PT_DIR . 'inc/imgmark.func.php';
		}
        echo file_get_contents($file);
        exit;
    }
}else{
	switch (PT_IMGGETTYPE){
		case 1:
			header("Location:$picurl");
			break;
		case 2:
			header("Content-type:image/$header");
			echo $pt->getcode($picurl);
			break;
		case 3:
			header("Content-type:image/$header");
			readfile($picurl);
			break;
		default:
			header("Content-type:image/$header");
			echo $pt->getcode($picurl);
			break;
	}
	exit;
}
?>