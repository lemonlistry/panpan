<?php
include_once PT_DIR.'inc/array.sort.php';
unset($files);
$dir_name=PT_DIR."data/link";
$od = opendir($dir_name);
while ($name = readdir($od)){
    $file_path = $dir_name.'/'.$name;
    if (is_file($file_path)){
        $files[] = $file_path;
    }
}
$str="<?php\n";
for($j=0;$j<count($files);$j++){
    include $files[$j];
    $flink[$j]['sitename']=$sitename;
    $flink[$j]['siteurl']=$siteurl;
    $flink[$j]['sitelogo']=$sitelogo;
    $flink[$j]['sitetitle']=$sitetitle;
    $flink[$j]['sitenum']=$sitenum;
}
$flink=sortarray($flink,'sitenum',"SORT_ASC",'sitename','SORT_DESC');
if (count($files)<24){
    $linknum=24;
}else{
    $linknum=count($files);
}
for($j=0;$j<$linknum;$j++){
    $l=$j+1;
    if (isset($flink[$j]['sitename'])){
        $str.="\$flink['$l']['sitename']=<<<flink\n".$flink[$j]['sitename']."\nflink;\n";
        $str.="\$flink['$l']['siteurl']=<<<flink\n".$flink[$j]['siteurl']."\nflink;\n";
        $str.="\$flink['$l']['sitelogo']=<<<flink\n".$flink[$j]['sitelogo']."\nflink;\n";
        $str.="\$flink['$l']['sitetitle']=<<<flink\n".$flink[$j]['sitetitle']."\nflink;\n";
    }else{
        $str.="\$flink['$l']['sitename']=<<<flink\n".PT_LINK_DEFAULTTEXT."\nflink;\n";
        $str.="\$flink['$l']['siteurl']=<<<flink\n".PT_SITEURL."\nflink;\n";
        $str.="\$flink['$l']['sitelogo']=<<<flink\n".PT_SITEURL."images/no.gif\nflink;\n";
        $str.="\$flink['$l']['sitetitle']=<<<flink\n欢迎同类站点与本站交换链接\nflink;\n";
    }
    
}
$str.="?>";
$pt->writeto(PT_DIR.'cache/flink.php',$str);
?>