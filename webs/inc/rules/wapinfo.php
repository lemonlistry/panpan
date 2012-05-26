<?php
if ($infoupdate){
	$chaptername=$lastchaptername;
	$chapterid=$lastchapterid;
}
$update = date("Y-m-d H:i:s",$lastupdate);
$fontsize = ceil($lastsize/2);
$bookinfo=str_ireplace('<br>','<br/>',$bookinfo);
$bookinfo=str_ireplace('<br/>','<br/>',$bookinfo);
$bookinfo=str_ireplace('<br />','<br/>',$bookinfo);
if ($bookimg == '' or stristr($bookimg,'noimg') or stristr($bookimg,'nocover')) {
	$bookimg=PT_SITEURL . 'images/noimg.gif';
} else if (PT_IMGURL == 'true') {
	if (PT_CACHE_BOOKIMG == 'true' and PT_CACHE_BOOKIMGURL == 'true') {
		$dirid = floor($bookid / 1000);
		$file = PT_DIR . 'files/cover/' . $dirid . '/' . $bookid . '/' . basename($bookimg);
		if (!file_exists($file)) {
			$ext = strtolower(extend_3(basename($bookimg)));
			$str = $pt->getcode($bookimg,'0');
			if (strlen($str) > 1000 and ($ext == 'jpg' or $ext == 'gif' or $ext == 'jpeg' or $ext == 'bmp')) {
				$pt->writeto($file, $str);
			}
		}
		$bookimg = PT_SITEURL . 'files/cover/' . $dirid . '/' . $bookid . '/' . basename($bookimg);
	} else {
		$bookimg = PT_SITEURL . 'ptpic.php?type=bookimg&bookid=' . $bookid . '&url=' . $bookimg;
	}
}
$bookimg=str_replace('&','&amp;',$bookimg);
?>