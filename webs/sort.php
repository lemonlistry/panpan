<?php
$pt_type = 'sort';
include './inc/global.php';
include PT_DIR . 'inc/print/' . $pt_type . '.php';
include PT_DIR . 'data/cachetime.php';
$cachefile = PT_DIR . 'files/static/' . $pt_type . '/'.$sortid.'_'.$page.'.pth';
if (PT_CACHE_HTML == 'true' and $cachetime[$pt_type] > 0 and $page <= 5) {
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