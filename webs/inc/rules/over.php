<?php
//目录翻页
$pagestart = $page-3;
if ($pagestart<=1){
	$pagestart=0;
}
$pageend=$pagestart+5;
if ($pageend>$pagec){
	$pageend=$pagec-$pagestart;
}else{
	$pageend=5;
}

//页面链接地址
$starturl=$pt->getoverurl(1);
$endurl=$pt->getoverurl($pagec);
$overurl=$pt->getoverurl();
if($page==1){
	$backurl=$pt->getoverurl($page);
}else{
	$backurl=$pt->getoverurl($page-1);
}
if ($page==$pagec){
    $nexturl=$pt->getoverurl($page);
}else{
	$nexturl=$pt->getoverurl($page+1);
}

//载入全局缓存文件
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';

//载入页面信息文件
include PT_DIR . 'data/page/' . $pt_type . '.php';
?>