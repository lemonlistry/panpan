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
		header( "Content-type: text/plain" );
		exit('document.write(\'<div style="text-align:center;font-size:21px;">请访问本站最新网址：<a href="'.PT_SITEURL.'" style="font-size:21px;">'.PT_SHORTURL.'</a></div>\');');
	}
}
$bookid=$_GET['bookid'];
$dirid=floor($bookid/1000);
$chapterid=$_GET['chapterid'];
$txtfile = PT_DIR . 'files/chapter/txt/'.$dirid.'/'.$bookid.'/'.$chapterid.'.txt';
$ptcfile = PT_DIR . 'files/chapter/txt/'.$dirid.'/'.$bookid.'/'.$chapterid.'.ptc';
if (file_exists($txtfile)){
	$usechapter=true;
	$chaptercontent=file_get_contents($txtfile);
	$chaptercontent=str_replace("document.write('", '', $chaptercontent);
	$chaptercontent=str_replace("');", '', $chaptercontent);
}else if (file_exists($ptcfile)){
	$ptctime=filemtime($ptcfile) + $cachetime[$pt_type] * 3600;
	if ($_SERVER['REQUEST_TIME'] < $ptctime){
		$usechapter=true;
		$chaptercontent=file_get_contents($ptcfile);
	}
}
if (empty($usechapter)){
	include PT_DIR . PT_RULESDIR . PT_RULE . '/chapter.php';
	$chaptercontent=str_replace('\\', '', $chaptercontent);
	$chaptercontent=str_replace("'", '"', $chaptercontent);
	$chaptercontent=str_replace("\n", '', $chaptercontent);
	$chaptercontent=str_replace("\r", '', $chaptercontent);
	if (PT_CACHE_CHAPTER == 'true'){
		if (strlen($chaptercontent)<1000 or stristr($chaptercontent,'src=')){
			$pt->writeto($ptcfile,$chaptercontent);
		}else{
			if (file_exists($ptcfile)){
				@unlink($ptcfile);
			}
			$str = "document.write('$chaptercontent');";
			$pt->writeto($txtfile,$str);
		}
	}
}
include PT_DIR . 'inc/show.php';
header( "Content-type: text/plain" );
echo "document.write('$chaptercontent');";
?>