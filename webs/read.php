<?php
$pt_type = 'read';
include './inc/global.php';
include PT_DIR . 'inc/print/info.php';
include PT_DIR . 'inc/data.php';
$cachefile = PT_DIR . 'files/static/' . $pt_type . '/' . $dirid . '/' . $bookid . '.pth';
if (PT_CACHE_HTML == 'true' and $cachetime[$pt_type] > 0) {
	if (empty($dataupdate) or PT_CACHE_DATA != 'true') {
		include PT_DIR . 'inc/static.php';
	}
	include PT_DIR . 'inc/rules/info.php';
	include PT_DIR . 'inc/menu.php';
	include PT_DIR . 'inc/cache.php';
} else {
	include PT_DIR . 'inc/rules/info.php';
	include PT_DIR . 'inc/menu.php';
	include PT_DIR . 'inc/output.php';
}
?>