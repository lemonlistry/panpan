<?php
if (!file_exists(dirname(__FILE__).'/data/install.lock')){
	header("LOCATION:/install/");
	exit;
}
$pt_type = 'index';
include './inc/global.php';
include PT_DIR . 'data/cachetime.php';
$cachefile = PT_DIR . 'files/static/update/update.pth';
if ((PT_CACHE_HTML == 'true' and $cachetime[$pt_type] > 0) or PT_CACHE_INDEX=="true") {
	if (PT_CACHE_INDEX == "true" and PT_CACHE_HTML == 'false') {
		$cachetime[$pt_type] = 0.1;
	}
	include PT_DIR . 'inc/static.php';
	include PT_DIR . PT_RULESDIR . PT_RULE . '/' . $pt_type . '.php';
	include PT_DIR . 'inc/rules/' . $pt_type . '.php';
	include PT_DIR . 'inc/cache.php';
} else {
	include PT_DIR . PT_RULESDIR . PT_RULE . '/' . $pt_type . '.php';
	include PT_DIR . 'inc/rules/' . $pt_type . '.php';
	include PT_DIR . 'inc/output.php';
}
?>