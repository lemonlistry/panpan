<?php
include PT_DIR.PT_TPLDIR.PT_TPL.'/blocklist.php';
/**
 * 重新生成区块列表缓存文件
 */
echo '检测到全局区块缓存不存在，下面系统将为您重新获取全局区块缓存<br />';
//列表区块缓存需要读取规则中设置的各排行的地址，故进行验证是否生成排行缓存文件
$rule_file_blocklist = PT_DIR . 'cache/' . PT_RULESDIR . PT_RULE . '/block.list.php';
if (file_exists($rule_file_blocklist)) {
	include $rule_file_blocklist;
} else {
	include PT_DIR . 'inc/list.block.php';	
	include $rule_file_blocklist;
}
$setfile= PT_DIR.'data/replace/block.php';
if (file_exists($setfile)){
	$repstr=file($setfile);
}
$repnum=count($repstr);
for ($i=0;$i<$repnum;$i++){
	$estr=explode('|||',$repstr[$i]);
	if(isset($estr['0'])){$stra=$estr['0'];}else{$stra="";}
	if(isset($estr['1'])){$strb=$estr['1'];}else{$strb="";}
	if(isset($estr['2'])){$strc=$estr['2'];}else{$strc="";}
	$repstrbook[$stra][$strb]=$strc;
}
echo '载入区块修正数据成功.....<br />';
$blocklistcount = count($pt_templets_blocklist);
echo '开始处理全局区块缓存内容,共检测到需处理<font color="red"><b>'.$blocklistcount.'条数据</b></font><br />';
$blockliststr = "<?php\n";
for ($tpli = 1; $tpli <= $blocklistcount; $tpli++) {
	$type = $pt_templets_blocklist[$tpli]['type'];
	$block_con = '';
	//free为自由列表。其他未内置列表。
	if ($type == "free") {
		$blockarr = explode('|', $pt_templets_blocklist[$tpli]['num']);
		$blockarrcount = count($blockarr);
		echo '<div style="padding-left:40px;">'.$tpli.'、开始处理<font color="red"><b>'.$pt_templets_blocklist[$tpli]['name'].'</b></font>缓存内容,共检测到需处理<font color="red"><b>'.$blockarrcount.'</b></font>条数据<br /><div style="padding-left:40px;">';
		for ($tplj = 1; $tplj <= $blockarrcount; $tplj++) {
			$bookid = $blockarr[$tplj - 1];
			echo $tplj.'、获取目标书号'.$bookid.'信息............';
			$read=$show=$volumeid=$volumename=null;
			include PT_DIR . 'inc/data.php';
			if ($infoupdate){
				$chaptername=$lastchaptername;
				$chapterid=$lastchapterid;
			}
			if (isset($repstrbook[$bookid]['bookinfo'])){
				$bookinfo=$repstrbook[$bookid]['bookinfo'];
			}else{
				$bookinfo=str_replace(' ','',$bookinfo);
				$bookinfo=str_replace('　　','',$bookinfo);
				$bookinfo=str_ireplace('&nbsp;','',$bookinfo);
				$bookinfo=str_ireplace('<br>','',$bookinfo);
				$bookinfo=str_ireplace('<br/>','',$bookinfo);
			}
			if (isset($repstrbook[$bookid]['bookimg'])){
				$bookimg=$repstrbook[$bookid]['bookimg'];
			}
			//封面图片写入缓存
			if($bookimg=='' or strpos($bookimg,'noimg') or strpos($bookimg,'nocover')){
				$bookimg=PT_SITEURL.'images/noimg.gif';
			}else if(PT_IMGURL == 'true'){
				$dirid=floor($bookid/1000);
				$file=PT_DIR . 'files/cover/'.$dirid.'/'.$bookid.'/'.basename($bookimg);
				$ext=strtolower(extend_3(basename($bookimg)));
				if (!file_exists($file)){
					$str=$pt->getcode($bookimg,'0');
					if (strlen($str)>1000 and ($ext=='jpg' or $ext=='gif' or $ext=='jpeg' or $ext=='bmp') and strlen($str)<100000 ){
						$pt->writeto($file,$str);
					}			
				}
				$bookimg=PT_SITEURL.'files/cover/'.$dirid.'/'.$bookid.'/'.basename($bookimg);
			}
			$pt_block_list[$tplj]['cutid']=$cutid;
			$pt_block_list[$tplj]['bookid']=$bookid;
			$pt_block_list[$tplj]['bookname']=$bookname;
			$pt_block_list[$tplj]['bookinfo']=$bookinfo;
			$pt_block_list[$tplj]['author']=$author;
			$pt_block_list[$tplj]['authorurl']=$pt->getsearchurl($author, 'author');
			$pt_block_list[$tplj]['sortcname']=$sortcname;
			$pt_block_list[$tplj]['sortcid']=$sortcid;
			$pt_block_list[$tplj]['sortcurl']=$pt->getsorturl($sortcid);
			$pt_block_list[$tplj]['sortnname']=$sortnname;
			$pt_block_list[$tplj]['sortnid']=$sortnid;
			$pt_block_list[$tplj]['sortnurl']=$pt->getsorturl($sortnid);
			$pt_block_list[$tplj]['update']=date("Y-m-d",$lastupdate);
			$pt_block_list[$tplj]['chaptername']=$chaptername;
			$pt_block_list[$tplj]['chapterid']=$chapterid;
			$pt_block_list[$tplj]['chapterurl']=$pt->getchapterurl($cutid,$bookid,$chapterid);
			$pt_block_list[$tplj]['allclick']=$allclick;
			$pt_block_list[$tplj]['allvote']=$allvote;
			$pt_block_list[$tplj]['goodnum']=$goodnum;
			$pt_block_list[$tplj]['bookimg']=$bookimg;
			$pt_block_list[$tplj]['fontsize']=ceil($lastsize/2);
			$pt_block_list[$tplj]['isover']=$isover;
			$pt_block_list[$tplj]['bookurl']=$pt->getbookurl($bookid);
			$pt_block_list[$tplj]['readurl']=$pt->getreadurl($cutid,$bookid);
			$pt_block_list[$tplj]['downurl']=$pt->getdownurl($bookid);
			$pt_block_list[$tplj]['voteurl']=$pt->getvoteurl($bookid);
			$pt_block_list[$tplj]['markurl']=$pt->getmarkurl();
			$i=$tplj;
			$file = $pt_tpl->parser('block/' . $pt_templets_blocklist[$tpli]['templets']);	
			ob_start();
			include $file;
			$block_con .= ob_get_contents();
			ob_end_clean();
			echo $bookname,'信息获取完毕,并载入模板信息程序及将封面图片存储到'.$bookimg.'<br />';
		}
		echo '</div></div><hr>';
	}else{
		echo '<div style="padding-left:40px;">'.$tpli.'、开始处理<font color="red"><b>'.$pt_templets_blocklist[$tpli]['name'].'</b></font>缓存内容,共检测到需处理<font color="red"><b>'.$pt_templets_blocklist[$tpli]['num'].'</b></font>条数据......';
		for ($tplj = 1; $tplj <= $pt_templets_blocklist[$tpli]['num']; $tplj++) {			
			$pt_block_list[$tplj]['bookurl'] = $topblock[$tplj][$type]['bookurl'];
			$pt_block_list[$tplj]['bookname'] = $topblock[$tplj][$type]['bookname'];
			$i = $tplj;
			$file = $pt_tpl->parser('block/' . $pt_templets_blocklist[$tpli]['templets']);
			ob_start();
			include $file;
			$block_con .= ob_get_contents();
			ob_end_clean();
		}
		echo $pt_templets_blocklist[$tpli]['name'].'信息获取完毕,并载入模板信息程序<br /></div><hr>';
	}
	$blockliststr .= '$pt_block_list[' . "'$tpli'" . ']=<<<pttpl' . "\n" . $block_con . "\n" . "pttpl;\n";
}
$blockliststr .= "?>";
echo '全部全局区块缓存获取完毕，即将写入缓存文件......<br />';
$pt->writeto($tpl_file_blocklist, $blockliststr);
echo '<font color="red"><b>写入文件成功，缓存完毕，请重新刷新当前页面！</b></font>';
exit;
?>