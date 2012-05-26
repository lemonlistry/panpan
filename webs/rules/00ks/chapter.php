<?php
$code = $pt->getcode('http://www.00ks.com/Html/Book/' . floor(($bookid-PT_PLUSBID)/1000) . '/' . ($bookid-PT_PLUSBID) . '/' . ($chapterid-PT_PLUSTID) . '.html');
$chaptercontent=$pt->steal($code,'<Div id="BookText">','</Div>');
$chaptercontent = preg_replace('/<div style=["|\']display:none["|\']>[^<]*<\/div>/','',$chaptercontent);
$chaptercontent = str_replace('http://www.00ks.com','',$chaptercontent);
$chaptercontent = str_replace('www.00ks.com','',$chaptercontent);
$chaptercontent = str_replace('00ks.com','',$chaptercontent);
$chaptercontent = str_replace('Áãµã¿´Êé','',$chaptercontent);
$chaptercontent = str_replace('src="/','src="http://www.00ks.com/',$chaptercontent);
$chaptercontent = str_replace('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','¡¡¡¡',$chaptercontent);
$chaptercontent = str_replace('&nbsp;&nbsp;&nbsp;&nbsp;','¡¡¡¡',$chaptercontent);
?>