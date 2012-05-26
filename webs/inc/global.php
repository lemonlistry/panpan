<?php
//基本设置
error_reporting(0);
ini_set("max_execution_time", "180");
date_default_timezone_set ('PRC');
define('PT_PATH', str_replace('inc', '', dirname(__file__)));
//防止非法POST
if (!empty($_REQUEST )){
	$value=implode(" ",$_REQUEST );
	if(preg_match("/\{|\}|fputs|fopen|base64|eval/i", $value)){
		exit('操作非法');
	}
}
//载入配置
include PT_PATH . 'data/config.php';
//网站开关
if (PT_OPEN=="false"){
	header("HTTP/1.1 500 Internal Server Error");
	die(PT_CLOSEWHY);
}
//访问模式
define ('PT_URLTYPE','web');
if ($_SERVER["SERVER_NAME"]==PT_WAPURL){
	header('location:'.PT_SITEURL.'wap/index.php');
	exit;
}
//载入类文件
include PT_PATH . 'inc/common.class.php';//函数类
include PT_PATH . 'inc/tpl.class.php';//模板类
//初始化类
$pt = new pt;//函数类
$pt_tpl = new pt_tpl;//模板类
//蜘蛛记录
if (PT_BOT_POWER=="true"){
	include PT_DIR . 'plus/bot/ptbot.php';
}
//模板规则区块缓存文件
$tpl_file_nav = PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/nav.tpl.php';
$tpl_file_block = PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/block.tpl.php';
$tpl_file_blocklist = PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/blocklist.tpl.php';
$rule_file_blocklist=PT_DIR . 'cache/' . PT_RULESDIR . PT_RULE . '/block.list.php';
//判断是否需要再次解析
if (!file_exists($tpl_file_nav) or PT_CACHE_BLOCK=='false'){
	include PT_DIR . 'inc/tpl.nav.php';
}
if (!file_exists($rule_file_blocklist) or PT_CACHE_BLOCK=='false'){
	include PT_DIR . 'inc/list.block.php';
}
if (!file_exists($tpl_file_blocklist) or PT_CACHE_BLOCK=='false'){
	include PT_DIR . 'inc/tpl.blocklist.php';
}
if (!file_exists($tpl_file_block) or PT_CACHE_BLOCK=='false') {
	include PT_DIR . 'inc/tpl.block.php';
}
//载入分类缓存文件
include PT_DIR . 'cache/' . PT_TPLDIR . PT_TPL . '/nav.tpl.php';
?>