<?php
$pt_type = 'down';
include './inc/global.php';
include PT_DIR . 'inc/print/info.php';
include PT_DIR . 'inc/data.php';
include PT_DIR . 'inc/rules/info.php';
if (!empty($_GET['type']) and $_GET['type'] != "all") {
	$type=$_GET['type'];
	include PT_DIR . PT_RULESDIR . PT_RULE . '/' . $pt_type . '.php';
	include PT_DIR . 'inc/rules/' . $pt_type . '.php';
}else{
	$pt_type = 'downall';
}
include PT_DIR . 'inc/output.php';
?>