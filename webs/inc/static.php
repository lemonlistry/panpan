<?php
if (file_exists($cachefile)) {
    $filetime = filemtime($cachefile) + $cachetime[$pt_type] * 3600;
    if ($filetime > $_SERVER['REQUEST_TIME']) {
        //Ö±½ÓÊä³ö
        if (PT_GZIP_POWER == "true") {
            ob_start('ob_gzip');
            echo file_get_contents($cachefile);
            ob_end_flush();
        }else{
            echo file_get_contents($cachefile);
        }
        exit;
    }
}
?>