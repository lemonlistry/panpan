<?php
if (PT_CACHE_DATA == 'true' and empty($dataupdate)){
	$read=cache_file($readfile);
	unset($read[0]);
}
$orderid=array_search($chapterid,$read);
if (!$orderid){
	if (PT_URLTYPE=='wap'){
		$indexurl=PT_SITEURL."wap/read.php?cutid=$cutid&bookid=$bookid&user=$user";
	}else{
		$indexurl=$pt->getreadurl($cutid,$bookid);
	}
	header("Location: $indexurl");
	exit();
}
if (PT_CACHE_DATA == 'true' and empty($dataupdate)){
	$show=cache_file($showfile);
}
$chaptername=$show[$orderid];
$backid=$read[$orderid-1];
$nextid=$read[$orderid+1];
if (empty($backid)){
	$backid='start';
}
if (empty($nextid)){
	$nextid='end';
}
?>