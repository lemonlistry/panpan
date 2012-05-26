<?php
$code = $pt->getcode('http://www.00ks.com/Book/' . ($bookid-PT_PLUSBID) . '/Index.aspx');
$bookname = $pt->steal($code, '<title>', '/', false, false);
$author = $pt->steal($code, '作者：</strong>', '</em>', false, false);
	$author = $pt->steal($author, '.aspx">', '</a>', false, false);
$bookinfo = $pt->steal($code, '到收藏夹]</a></div>', '<div id="box4">', false, false);
	$bookinfo = str_replace('&nbsp;','',$bookinfo);
	$bookinfo = str_replace('<p>','',$bookinfo);
	$bookinfo = str_replace('</p>','',$bookinfo);
$bookimg = $pt->steal($code, '<div class="bortable wleft">','<div class="bortable cl">', false, false);
	$bookimg = $pt->steal($bookimg, '<img src="','"', false, false);
$sortc = $pt->steal($code, '作品大类：</strong>', '</td>', false, false);
	$sortcid = $pt->steal($sortc, '/Book/LC/', '.aspx', false, false);
	$sortcname = $pt->steal($sortc, '.aspx">', '</', false, false);
$sortn = $pt->steal($code, '<strong>分类：</strong>', '</span>', false, false);
	$sortnid = $pt->steal($sortn, '/Book/LN/', '.aspx', false, false);
	$sortnname = $pt->steal($sortn, '.aspx">', '</', false, false);
$cutid = floor($bookid/1000);
$lastchapter = $pt->steal($code, '<p class="readlast">', '</p>', false, false);
$lastchapterid = $pt->steal($lastchapter, '/Html/Book/'.floor(($bookid-PT_PLUSBID)/1000).'/'.($bookid-PT_PLUSBID).'/', '.', false, false)+PT_PLUSTID;
$lastchaptername=$pt->steal($lastchapter,'.html">','</');
$lastupdate=strtotime($pt->steal($code, '更新：</strong>', '</span>', false, false));
$lastsize=$pt->steal($code, '已写<small>', '</small>字', false, false);
$allclick=0;
$allvote=0;
$goodnum=0;
$isover = $pt->steal($code, '写作进程：</strong>', '</td>', false, false);
if ($isover=='完结'){ $isover='0'; }else{ $isover='1'; }
$lastsign = md5($lastupdate.'|'.$lastsize.'|'.$isover);
?>