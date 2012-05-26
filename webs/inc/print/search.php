<?php
if (isset($_REQUEST['type'])) {
    $type = $_REQUEST['type'];
} else if ( PT_URLTYPE=='web' ) {
    $type = "bookname";
} else {
    $type = "";
}
if (isset($_REQUEST['key'])) {
    $key = trim( $_REQUEST['key'] );
    $key = str_replace(chr(32),"",$key);
	$key = str_replace(" ","",$key);
	if (PT_URLTYPE=='wap' and PT_WAPCHS=='utf-8') {
		$key = iconv("utf-8","gbk",$key);
	}
} else {
    $key="";
}
?>