<?php
$pt_type = 'chapter';
include './inc/global.php';
include PT_DIR . 'inc/print/info.php';
$showid = $chapterid;
include PT_DIR . 'inc/data.php';
$chapterid = $showid;
$usejs=false;
if (PT_CACHE_DATA == 'true'){
	$cachefile = PT_DIR . 'files/chapter/page/'.$dirid.'/'.$bookid.'/'.$chapterid.'.ptc';
	if (file_exists($cachefile) and empty($dataupdate)){
		$datatime=filemtime($tenfile);
		$pagetime=filemtime($cachefile);
		if ($pagetime>$datatime){
			$usecache=true;
			include $cachefile;
		}
	}
	if (empty($usecache)){
		include PT_DIR . 'inc/order.php';
		$str = "<?php\n";
		$str .= "\$chaptername='$chaptername';\n";
		$str .= "\$backid='$backid';\n";
		$str .= "\$nextid='$nextid';\n";
		$str .= "?>";
		$pt->writeto($cachefile,$str);
	}
}else{
	include PT_DIR . 'inc/order.php';
}
include PT_DIR . 'inc/rules/' . $pt_type . '.php';
$txtfile = PT_DIR . 'files/chapter/txt/'.$dirid.'/'.$bookid.'/'.$chapterid.'.txt';
$ptcfile = PT_DIR . 'files/chapter/txt/'.$dirid.'/'.$bookid.'/'.$chapterid.'.ptc';
if (PT_CHAPTERTYPE == '3'){
	$usejs = true;
}else if (PT_CHAPTERTYPE=='1' and !file_exists($txtfile) and !file_exists($ptcfile)){
	$usejs = true;
}
if ($usejs){
	if (PT_CHAPTERJSURL=='true' and file_exists($txtfile)){
		$jsurl = PT_SITEURL . 'files/chapter/txt/'.$dirid.'/'.$bookid.'/'.$chapterid.'.txt';
	}else{
		$jsurl = PT_SITEURL . 'pttxt.php?cutid=' . $cutid . '&bookid=' . $bookid . '&chapterid=' . $chapterid;
	}
	$chaptercontent = '<span id="ptchaptercontent" style="text-align:center;font-size:21px;"><br /><img src="'. PT_SITEURL . 'images/loading.gif" alt="章节内容载入中……" />章节内容载入中……<br /></span><script type="text/javascript" src="'.$jsurl.'"></script><script type="text/javascript">document.getElementById("ptchaptercontent").innerHTML="";</script>';
	include PT_DIR . 'inc/output.php';
	exit();
}
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
	include PT_DIR . PT_RULESDIR . PT_RULE . '/' . $pt_type . '.php';
	$chaptercontent=str_replace('\\', '', $chaptercontent);
	$chaptercontent=str_replace("'", '"', $chaptercontent);
	$chaptercontent=str_replace("\n", '', $chaptercontent);
	$chaptercontent=str_replace("\r", '', $chaptercontent);
	if (PT_CACHE_CHAPTER=='true'){
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
include PT_DIR . 'inc/output.php';
?>