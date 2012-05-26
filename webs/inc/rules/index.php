<?php
//载入友情链接文件
if (!file_exists(PT_DIR . 'cache/flink.php')){
	include PT_DIR . 'inc/link.reset.php';
}
include PT_DIR . 'cache/flink.php';

//载入公告文件
if (!file_exists(PT_DIR . 'cache/ptann.php')){
	include PT_DIR . 'inc/ann.reset.php';
}
include PT_DIR . 'cache/ptann.php';

//载入首页区块文件
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/block.tpl.php';

//载入全局缓存文件
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';

//载入页面信息文件
include PT_DIR . 'data/page/' . $pt_type . '.php';
?>