<?php
if (PT_GZIP_POWER == "true"){
    $file = $pt_tpl->parser($pt_type);
    ob_start('ob_gzip');
    include $file;
    $str = ob_get_contents();
    ob_end_flush();
    if (strlen($str) > 1000) {
    	$pt->writeto($cachefile, $str);
    }
}else{
    $file = $pt_tpl->parser($pt_type);
    ob_start();
    include $file;
    $str = ob_get_contents();
    ob_end_flush();
    if (strlen($str) > 1000) {
    	$pt->writeto($cachefile, $str);
    }
}
?>