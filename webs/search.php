<?php
$pt_type = 'search';
include './inc/global.php';
include PT_DIR . 'inc/print/' . $pt_type . '.php';
include PT_DIR . 'data/cachetime.php';
if (PT_CACHE_SEARCH=='true' and $cachetime[$pt_type]>0){
	$cachefile=PT_DIR . 'files/search/'.$type.'/'.$key.'.ptc';
	$searchtime=filemtime($cachefile) + $cachetime[$pt_type] * 3600;
	if ($_SERVER['REQUEST_TIME'] < $searchtime){
		$usecache=true;
		include $cachefile;
	}else{
		include PT_DIR . PT_RULESDIR . PT_RULE . '/' . $pt_type . '.php';
		include PT_DIR . 'inc/search.save.php';
	}
}else{
	include PT_DIR . PT_RULESDIR . PT_RULE . '/' . $pt_type . '.php';
}
if(PT_SEARCHJUMP=='true' and $searchnum==1){
	$resulturl=$pt->getbookurl($search_list[1]['bookid']);
	header("Location: $resulturl");
	exit();
}
include PT_DIR . 'inc/rules/' . $pt_type . '.php';
include PT_DIR . 'inc/output.php';
?>