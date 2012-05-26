<?php
$dirid = floor($bookid/1000);
$infofile = PT_DIR . 'files/data/' . $dirid . '/' . $bookid . '/info.ptv';
$tenfile = PT_DIR . 'files/data/' . $dirid . '/' . $bookid . '/ten.ptv';
$readfile = PT_DIR . 'files/data/' . $dirid . '/' . $bookid . '/read.ptv';
$showfile = PT_DIR . 'files/data/' . $dirid . '/' . $bookid . '/show.ptv';
//数据缓存时间
include PT_DIR . 'data/cachetime.php';
if ( empty( $cachetime['data'] ) or !is_numeric( $cachetime['data'] ) or $cachetime['data']<0.1 ) {
	$cachetime['data'] = 0.1;
}
if (file_exists($infofile)) {
	include $infofile;
	$effecttime = $createtime + $cachetime['data'] * 3600;
	if ($effecttime < $_SERVER['REQUEST_TIME']) {
		//重新获取信息
		$infoupdate = true;
		include PT_DIR . PT_RULESDIR . PT_RULE . '/info.php';
		if (PT_CACHE_DATA == 'true') {
			include PT_DIR . 'inc/info.save.php';
		}
		if ($chapterid != $lastchapterid or $sign != $lastsign){
			$dataupdate = true;
			//重新获取数据
			include PT_DIR . PT_RULESDIR . PT_RULE . '/data.php';
			if (PT_CACHE_DATA == 'true') {
				include PT_DIR . 'inc/data.save.php';
			}
		}
	}
} else {
	$infoupdate = true;
	$dataupdate = true;
	include PT_DIR . PT_RULESDIR . PT_RULE . '/info.php';
	include PT_DIR . PT_RULESDIR . PT_RULE . '/data.php';
	if (PT_CACHE_DATA == 'true') {
		include PT_DIR . 'inc/info.save.php';
		include PT_DIR . 'inc/data.save.php';
	}
}
?>