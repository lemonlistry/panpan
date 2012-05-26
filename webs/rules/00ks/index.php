<?php
$code=$pt->getcode('http://www.00ks.com/Book/ShowBookList.aspx');
$pt_update_con=$pt->steal($code,'<div class="con" style="background:none">','<div class="bookpage">',false,false);
$pt_update_listcon=explode('<ul>',$pt_update_con);
$count_list=count($pt_update_listcon)-1;
for ($i=1;$i<=$count_list;$i++){
	$pt_update_list[$i]['bookname']=$pt->steal($pt_update_listcon[$i],'Index.aspx">','</',false,false);
	$pt_update_list[$i]['chaptername']=$pt->steal($pt_update_listcon[$i],'.html" target="_blank">','</',false,false);
	$pt_update_list[$i]['sortname']=$pt->steal($pt_update_listcon[$i],'.aspx">','</',false,false);
	$pt_update_list[$i]['sortid']=$pt->steal($pt_update_listcon[$i],'/Book/LN/','.aspx',false,false);
	$pt_update_list[$i]['sorturl']=$pt->getsorturl($pt_update_list[$i]['sortid']);
	$pt_update_list[$i]['cutid']=$pt->steal($pt_update_listcon[$i],'<a href="/Html/Book/','/',false,false);
	$pt_update_list[$i]['bookid']=$pt->steal($pt_update_listcon[$i],'<a class="f14" href="/Book/','/',false,false);
	$pt_update_list[$i]['chapterid']=$pt->steal($pt_update_listcon[$i],'</a> <a href="/Html/Book/'.$pt_update_list[$i]['cutid'].'/'.$pt_update_list[$i]['bookid'].'/','.html',false,false)+PT_PLUSTID;
	$pt_update_list[$i]['bookid']=$pt_update_list[$i]['bookid']+PT_PLUSBID;
	$pt_update_list[$i]['cutid']=floor($pt_update_list[$i]['bookid']/1000);
	$pt_update_list[$i]['bookurl']=$pt->getbookurl($pt_update_list[$i]['bookid']);
	$pt_update_list[$i]['readurl']=$pt->getreadurl($pt_update_list[$i]['cutid'],$pt_update_list[$i]['bookid']);
	$pt_update_list[$i]['chapterurl']=$pt->getchapterurl($pt_update_list[$i]['cutid'],$pt_update_list[$i]['bookid'],$pt_update_list[$i]['chapterid']);
	$pt_update_list[$i]['update']=$pt->steal($pt_update_listcon[$i],'<li class="ro4">','</',false,false);
	$pt_update_list[$i]['author']=$pt->steal($pt_update_listcon[$i],'<li class="ro3">','</li>',false,false);
	$pt_update_list[$i]['author']=$pt->steal($pt_update_list[$i]['author'],'.aspx">','</',false,false);
	$pt_update_list[$i]['authorurl']=$pt->getsearchurl($pt_update_list[$i]['author'],'author');
}
?>