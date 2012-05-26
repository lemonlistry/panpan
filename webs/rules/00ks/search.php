<?php
if ($type=='author'){
    $type=0;
}else{
    $type=1;
}
$code=$pt->getcode("http://www.00ks.com/Book/Search.aspx?SearchKey=".$key."&SearchClass=".$type);
$search_content = $pt->steal($code,'align="absmiddle" style="border:0;" />','<form name="__aspnetForm',false,false);
$search_listarr = explode('<div id="CListTitle">',$search_content);
$searchnum=count($search_listarr)-1;
for($i = 1; $i <= $searchnum; $i++){
	$search_list[$i]['bookname']=$pt->steal($search_listarr[$i],'<b>','</',false,false);
    $search_list[$i]['bookid']=$pt->steal($search_listarr[$i],'<a href="/Book/','/',false,false);
    $search_list[$i]['con']=$pt->steal($search_listarr[$i],'</b></a>  [','</div>',false,false);
    $search_list[$i]['author']=$pt->steal($search_list[$i]['con'],'.aspx">','</a>',false,false);
    $search_list[$i]['sortname']=$pt->steal($search_list[$i]['con'],'.aspx" target="_blank">','</',false,false);
    $search_list[$i]['sortid']=$pt->steal($search_list[$i]['con'],'<a href="/Book/LN/','.aspx',false,false);
    $search_list[$i]['chaptername']=$pt->steal($search_list[$i]['con'],'.html" target="_blank">','</',false,false);
    $search_list[$i]['cutid']=$pt->steal($search_list[$i]['con'],'<a href="/Html/Book/','/',false,false);
    $search_list[$i]['chapterid']=$pt->steal($search_list[$i]['con'],'<a href="/Html/Book/'.$search_list[$i]['cutid'].'/'.$search_list[$i]['bookid'].'/','.html',false,false)+PT_PLUSTID;
    $search_list[$i]['bookinfo']=$pt->steal($search_listarr[$i],'<div id="CListText">','</div>',false,false);
    $search_list[$i]['update']=$pt->steal($search_listarr[$i],$search_list[$i]['chaptername'].'</a> | ',' ¸üĞÂ ]',false,false);
	$search_list[$i]['bookid']=$search_list[$i]['bookid']+PT_PLUSBID;
	$search_list[$i]['cutid']=floor($search_list[$i]['bookid']/1000);
	$search_list[$i]['bookurl']=$pt->getbookurl($search_list[$i]['bookid']);
    $search_list[$i]['downurl']=$pt->getdownurl($search_list[$i]['bookid']);
    $search_list[$i]['readurl']=$pt->getreadurl($search_list[$i]['cutid'],$search_list[$i]['bookid']);
    $search_list[$i]['chapterurl']=$pt->getchapterurl($search_list[$i]['cutid'],$search_list[$i]['bookid'],$search_list[$i]['chapterid']);    
    $search_list[$i]['sorturl']=$pt->getsorturl($search_list[$i]['sortid']);
    $search_list[$i]['authorurl']=$pt->getsearchurl($search_list[$i]['author'],'author');
}
?>