<?php
include 'usercheck.php';

$pmstr=file('../data/user/' . $username . '/pm.php');
$pmnum=0;

if (isset($_POST['del'])) {
	unset($_POST['del']);
	$pmsavefile='../data/user/'.$username.'/pm.php';
	$pmsavestr=file_get_contents($pmsavefile);
	foreach ($_POST['delid'] as $pmrid) {
		$pmsavestr=str_replace($pmstr[$pmrid],'',$pmsavestr);
	}
	$pt->writeto($pmsavefile,$pmsavestr);
	$pmnum=substr_count($pmsavestr,'1~|~1');
	setcookie("pt_userpmnum",$pmnum,time()+86400,"/");
	$pt_type='msg';
	$msg="短消息删除成功！";
	$url=PT_SITEURL."user/pm.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}

if (isset($_GET['viewid'])){
	$viewid=$_GET['viewid'];
	$pmcon=explode('~|~',$pmstr[$viewid]);
	$pmid=$viewid;
	$title=$pmcon['2'];
	$content=str_replace('<br />',"\r\n",$pmcon['3']);
	$usernamecome=$pmcon['4'];		
	$date=$pmcon['5'];
	$pmcon['1']=0;
	$pmnewstr=$pmcon['0'].'~|~0~|~'.$pmcon['2'].'~|~'.$pmcon['3'].'~|~'.$pmcon['4'].'~|~'.$pmcon['5'];
	$pmoldstr=file_get_contents('../data/user/' . $username . '/pm.php');
	$pmoldstr=str_replace($pmstr[$viewid],$pmnewstr,$pmoldstr);
	$pt->writeto('../data/user/' . $username . '/pm.php',$pmoldstr);
	$pmnum=substr_count($pmoldstr,'1~|~1');
	setcookie("pt_userpmnum",$pmnum,time()+86400,"/");
	$pt_type='pmview';
	include PT_DIR . 'inc/useroutput.php';
}else{
	for ($i=0;$i<count($pmstr);$i++){
		$pmcon=explode('~|~',$pmstr[$i]);
		if ($pmcon['0']==1){
			$pmnum++;
			$pmlist[$pmnum]['pmid']=$i;
			if ($pmcon['1']==1){
				$pmlist[$pmnum]['title']='<b>'.$pmcon['2'].'</b>(未读)';
			}else{
				$pmlist[$pmnum]['title']=$pmcon['2'];
			}
			$pmlist[$pmnum]['username']=$pmcon['4'];		
			$pmlist[$pmnum]['date']=$pmcon['5'];
			$pmlist[$pmnum]['pmurl']='pm.php?viewid='.$i;
		}	
	}
	setcookie("pt_userpmnum",$pmnum,time()+86400,"/");
	$pt_type='pmlist';
	include PT_DIR . 'inc/useroutput.php';
}
?>