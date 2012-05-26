<?php
for($i=1; $i<=$searchnum; $i++){
	$search_list[$i]['sorturl']=$pt->getsorturl($search_list[$i]['sortid']);
	$search_list[$i]['bookurl']=$pt->getbookurl($search_list[$i]['bookid']);
	$search_list[$i]['downurl']=$pt->getdownurl($search_list[$i]['bookid']);
	$search_list[$i]['readurl']=$pt->getreadurl($search_list[$i]['cutid'],$search_list[$i]['bookid']);
	$search_list[$i]['chapterurl']=$pt->getchapterurl($search_list[$i]['cutid'],$search_list[$i]['bookid'],$search_list[$i]['chapterid']);
	$search_list[$i]['authorurl']=$pt->getsearchurl($search_list[$i]['author'],'author');
}

//载入全局缓存文件
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';

//载入页面信息文件
include PT_DIR . 'data/page/' . $pt_type . '.php';
?>