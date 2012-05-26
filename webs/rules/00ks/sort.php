<?php
if( in_array( $sortid, array( '1', '2', '3', '4', '5', '6', '7', '8' ) ) ){
	$code=$pt->getcode('http://www.00ks.com/Book/ShowBookList.aspx?tclassid='.$sortid.'&page='.$page);
}else{
	$code=$pt->getcode('http://www.00ks.com/Book/ShowBookList.aspx?nclassid='.$sortid.'&page='.$page);
	if (strpos($code,'¼ÇÂ¼ <font color=red><b>0</b></font> Ìõ')){
		$code=$pt->getcode('http://www.00ks.com/Book/ShowBookList.aspx?tclassid='.$sortid.'&page='.$page);
	}
}
$sortname=$pt->steal($code,'<title>',' ');
$pt_list=$pt->steal($code,'<div class="con" style="background:none">','<div class="bookpage">',false,false);
$pt_listcon=explode('<ul>',$pt_list);
$pt_list=null;
$count_list=count($pt_listcon)-1;
for ($i=1;$i<=$count_list;$i++){
	$pt_list[$i]['bookname']=$pt->steal($pt_listcon[$i],'Index.aspx">','</',false,false);
	$pt_list[$i]['chaptername']=$pt->steal($pt_listcon[$i],'.html" target="_blank">','</',false,false);
	$pt_list[$i]['sortname']=$pt->steal($pt_listcon[$i],'.aspx">','</',false,false);
	$pt_list[$i]['sortid']=$pt->steal($pt_listcon[$i],'/Book/LN/','.aspx',false,false);
	$pt_list[$i]['sorturl']=$pt->getsorturl($pt_list[$i]['sortid']);
	$pt_list[$i]['cutid']=$pt->steal($pt_listcon[$i],'<a href="/Html/Book/','/',false,false);
	$pt_list[$i]['bookid']=$pt->steal($pt_listcon[$i],'<a class="f14" href="/Book/','/',false,false);
	$pt_list[$i]['chapterid']=$pt->steal($pt_listcon[$i],'</a> <a href="/Html/Book/'.$pt_list[$i]['cutid'].'/'.$pt_list[$i]['bookid'].'/','.html',false,false)+PT_PLUSTID;
	$pt_list[$i]['bookid']=$pt_list[$i]['bookid']+PT_PLUSBID;
	$pt_list[$i]['cutid']=floor($pt_list[$i]['bookid']/1000);
	$pt_list[$i]['bookurl']=$pt->getbookurl($pt_list[$i]['bookid']);
	$pt_list[$i]['readurl']=$pt->getreadurl($pt_list[$i]['cutid'],$pt_list[$i]['bookid']);
	$pt_list[$i]['chapterurl']=$pt->getchapterurl($pt_list[$i]['cutid'],$pt_list[$i]['bookid'],$pt_list[$i]['chapterid']);
	$pt_list[$i]['update']=$pt->steal($pt_listcon[$i],'<li class="ro4">','</',false,false);
	$pt_list[$i]['author']=$pt->steal($pt_listcon[$i],'<li class="ro3">','</li>',false,false);
	$pt_list[$i]['author']=$pt->steal($pt_list[$i]['author'],'.aspx">','</',false,false);
	$pt_list[$i]['authorurl']=$pt->getsearchurl($pt_list[$i]['author'],'author');
}
$pagec = $pt->steal($code,'<font color=blue><b>','</b></font>',false,false);
$numc = $pt->steal($code,'¼ÇÂ¼ <font color=red><b>','</b></font>',false,false);
?>