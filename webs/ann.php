<?php
$pt_type = 'ann';
include './inc/global.php';
if (!file_exists(PT_DIR .  'cache/ptann.php')) {
    include PT_DIR . 'inc/ann.reset.php';
}
include PT_DIR . 'cache/ptann.php';
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';
if (isset($_GET['id'])) {
    $annid = count($ptann)-$_GET['id']+1;
} else {
    $annid = 1;
}
$annname=$ptann[$annid]['annname'];
$anncontent=$ptann[$annid]['anncontent'];
$annwriter=$ptann[$annid]['annwriter'];
$anndate=$ptann[$annid]['anndate'];
$file = $pt_tpl->parser($pt_type);
include $file;
?>