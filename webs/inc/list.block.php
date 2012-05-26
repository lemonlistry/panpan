<?php
/**
 * 根据rules.set.php来获取列表的具体图书
 */
ini_set("max_execution_time", "1800");
echo '检测到排行榜数据缓存不存在，下面系统将为您重新获取排行榜数据缓存<br />';
$rule_file_set=PT_DIR . PT_RULESDIR . PT_RULE . '/rules.set.php';
if (!file_exists($rule_file_set)) {
    exit('规则配置文件rules.set.php不存在!(' . PT_RULESDIR . PT_RULE . '/rules.set.php' . ')');
}
include $rule_file_set;
$cachefile=PT_DIR . 'cache/' . PT_RULESDIR . PT_RULE . '/block.list.php';
$blstr="<?php\n";
echo '共有'.count($pt_top_list).'条排行榜数据需要缓存<br />';
$i=0;
foreach($pt_top_list as $type=>$value){
    $i++;
    $code=pt::getcode($value);
    $listcon=pt::steal($code,$pt_top_list_start,$pt_top_list_end,false,false);
    $listarr=explode($pt_top_list_split,$listcon);
    for ($l=1;$l<=30;$l++){
        $bookid=pt::steal($listarr[$l],$pt_top_list_bookid_start,$pt_top_list_bookid_end,false,false);
        $bookname=pt::steal($listarr[$l],$pt_top_list_bookname_start,$pt_top_list_bookname_end,false,false);
        if (strpos($bookid,'/')){
			$aaaaa=explode('/',$bookid);
			$bookid=$aaaaa['1'];
		}
		$bookurl=pt::getbookurl($bookid+PT_PLUSBID);
        $blstr .= '$topblock'."['$l']['$type']['bookurl']='$bookurl';\n";
        $blstr .= '$topblock'."['$l']['$type']['bookname']='$bookname';\n";
    }
    $blstr .= "\n\n";
    echo '第'.$i.'条数据缓存成功并写入内容，目标地址页面：',$value,'<br />';
	ob_flush( );
	flush( );
}
$blstr.="?>";
echo '全部排行榜数据缓存获取完毕，即将写入缓存文件......<br />';
pt::writeto($cachefile,$blstr);
echo '<font color="red"><b>写入文件成功，缓存完毕，请重新刷新当前页面！</b></font>';
exit;
?>