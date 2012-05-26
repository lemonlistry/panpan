<?php
unset($files);
$dir_name=PT_DIR."data/ann";
$od = opendir($dir_name);
while ($name = readdir($od)){
	$file_path = $dir_name.'/'.$name;
	if (is_file($file_path)){
		$files[] = $file_path;
	}
}
$anncount=count($files);
$str="<?php\n";
for($j=0;$j<$anncount;$j++){
		include $files[$j];
		$aid=$anncount-$j;
        $ptann[$aid]['annname']=$annname;
        $ptann[$aid]['anncontent']=$anncontent;
        $ptann[$aid]['annwriter']=$annwriter;
        $ptann[$aid]['anndate']=$anndate;
}
for($j=1;$j<=$anncount;$j++){
	$id=$anncount-$j+1;
    $str.="\$ptann['$j']['id']=<<<ptann\n".$id."\nptann;\n";
    $str.="\$ptann['$j']['annname']=<<<ptann\n".$ptann[$j]['annname']."\nptann;\n";
    $str.="\$ptann['$j']['anncontent']=<<<ptann\n".$ptann[$j]['anncontent']."\nptann;\n";
    $str.="\$ptann['$j']['annwriter']=<<<ptann\n".$ptann[$j]['annwriter']."\nptann;\n";
    $str.="\$ptann['$j']['anndate']=<<<ptann\n".$ptann[$j]['anndate']."\nptann;\n";
}
$str.="?>";
$pt->writeto(PT_DIR.'cache/ptann.php',$str);
?>