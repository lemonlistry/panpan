<?php
$bookurl = $pt->getbookurl($bookid);
$downurl = $pt->getdownurl($bookid);
$readurl = $pt->getreadurl($cutid, $bookid);
$chapterurl = $pt->getchapterurl($cutid, $bookid, $chapterid);
$authorurl = $pt->getsearchurl($author, 'author');
$voteurl = $pt->getvoteurl($bookid);
$markurl = $pt->getmarkurl();
$markaddurl = $pt->getmarkaddurl($bookid, $chapterid, $chaptername);
if ($backid=='start') {
	$backurl=$pt->getreadurl($cutid,$bookid);
} else {
	$backurl=$pt->getchapterurl($cutid,$bookid,$backid);
}
if ($nextid=='end') {
	$nexturl=$pt->getreadendurl($bookid);
} else {
	$nexturl=$pt->getchapterurl($cutid,$bookid,$nextid);
}

//载入全局缓存文件
include PT_DIR . PT_CACHEDIR . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';

//载入页面信息文件
include PT_DIR . 'data/page/' . $pt_type . '.php';
?>