<?php
//หัห๗สýพÝ
$searchcache="<?php\n";
$searchcache.="\$searchnum=$searchnum;";
for($i=1; $i<=$searchnum; $i++){
	$searchcache.="\n";
	$searchcache.="\$search_list[$i]['bookname']='".$search_list[$i]['bookname']."';";
	$searchcache.="\$search_list[$i]['author']='".$search_list[$i]['author']."';";
	$searchcache.="\$search_list[$i]['bookinfo']='".$search_list[$i]['bookinfo']."';";
	$searchcache.="\$search_list[$i]['sortname']='".$search_list[$i]['sortname']."';";
	$searchcache.="\$search_list[$i]['update']='".$search_list[$i]['update']."';";
	$searchcache.="\$search_list[$i]['sortid']='".$search_list[$i]['sortid']."';";
	$searchcache.="\$search_list[$i]['cutid']='".$search_list[$i]['cutid']."';";
	$searchcache.="\$search_list[$i]['bookid']='".$search_list[$i]['bookid']."';";
	$searchcache.="\$search_list[$i]['chapterid']='".$search_list[$i]['chapterid']."';";
	$searchcache.="\$search_list[$i]['chaptername']='".$search_list[$i]['chaptername']."';";
}
$searchcache.="\n?>";
//ะดศ๋ปบดๆ
$pt->writeto( $cachefile, $searchcache );
?>