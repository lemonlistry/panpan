<?php
$pt_type = 'book';
include './inc/global.php';
include PT_DIR . 'inc/print/info.php';
include PT_DIR . 'inc/data.php';
include PT_DIR . 'inc/rules/info.php';
if (PT_CACHE_DATA == 'true' and empty($dataupdate)) {
	include $tenfile;
}
include PT_DIR . 'inc/output.php';
?>