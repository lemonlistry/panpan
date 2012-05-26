<?php
if ($infoupdate){
	$chaptername=$lastchaptername;
	$chapterid=$lastchapterid;
}
$update = date("Y-m-d H:i:s",$lastupdate);
$fontsize = ceil($lastsize/2);
$sortcurl = $pt->getsorturl($sortcid);
$sortnurl = $pt->getsorturl($sortnid);
$bookurl = $pt->getbookurl($bookid);
$downurl = $pt->getdownurl($bookid);
$readurl = $pt->getreadurl($cutid, $bookid);
$chapterurl = $pt->getchapterurl($cutid, $bookid, $chapterid);
$authorurl = $pt->getsearchurl($author, 'author');
$voteurl = $pt->getvoteurl($bookid);
$markurl = $pt->getmarkurl();
$markaddurl = $pt->getmarkaddurl($bookid);
$markaddurlc = $pt->getmarkaddurl($bookid, $chapterid,$chaptername);
$txtdownurl = $pt->getdownurl($bookid, 'txt');
$chmdownurl = $pt->getdownurl($bookid, 'chm');
$umddownurl = $pt->getdownurl($bookid, 'umd');
$jardownurl = $pt->getdownurl($bookid, 'jar');
$jaddownurl = $pt->getdownurl($bookid, 'jad');

//封面
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

//载入全局缓存文件
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';

//载入页面信息文件
include PT_DIR . 'data/page/' . $pt_type . '.php';
?>