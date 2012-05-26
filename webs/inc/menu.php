<?php
if (PT_CACHE_DATA == 'true' and empty($dataupdate)) {
	$read=cache_file( $readfile );
	$show=cache_file( $showfile );
	$volumeid=explode('|',$read[0]);
	$volumename=explode('¡á¡â',$show[0]);
	unset($read[0]);
}
$pt_chapterurl=$pt->getchapterurl($cutid,$bookid,'<chapterid>');
$i=1;
$v=1;
$c=1;
foreach($read as $row){
	if ($c==$volumeid[$v]){
		if ($i != 1){
			$readlist[$i]['type']='end';
			$i++;
		}
		$readlist[$i]['type']='fenjuan';
		$readlist[$i]['name']=$volumename[$v];
		$v++;
		$i++;
		$readlist[$i]['type']='start';
		$i++;
	}
	$readlist[$i]['type']='chapter';
	$readlist[$i]['name']=$show[$c];
	$readlist[$i]['chapterid']=$read[$c];
	$readlist[$i]['url']=str_replace('<chapterid>',$read[$c],$pt_chapterurl);
	$c++;
	$i++;
}
$readlist[$i]['type']='end';
$readlistnum=$i;
$linenum=0;
$update=date("Y-m-d H:i:s");
?>