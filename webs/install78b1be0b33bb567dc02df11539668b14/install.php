<?php
include '../inc/common.class.php';
ini_set("max_execution_time", "1200");

$pt=new pt;
if ($_SERVER["SERVER_PORT"]==80){
	$siteurl = 'http://'.$_SERVER['SERVER_NAME'].str_replace('//','/',preg_replace('/\/(.*)install\/(.*)/is','/\\1', $_SERVER['SCRIPT_NAME']));
}else{
	$siteurl = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].str_replace('//','/',preg_replace('/\/(.*)install\/(.*)/is','/\\1', $_SERVER['SCRIPT_NAME']));
}
$newroot='';

if (isset($_GET['step'])){
    $step=$_GET['step'];
}else{
    $step=1;
}

if (isset($_GET['act']) and $_GET['act']=='phpinfo'){
    phpinfo();exit;
}
$stepname=array("PT小说程序","软件介绍","软件许可协议","运行环境检测","文件权限检测","填写网站基本信息","管理员设置","安装完成");
switch($step){
    case 1;
    include "step1.inc.php";
	break;
    case 2;
    include "step2.inc.php";
    break;
    case 3;
    include "step3.inc.php";
    break;
    case 4;
	$files = file("chmod.txt");
	$files = array_filter($files);
	$writablefile = $no_writablefile = null;
	foreach($files as $file)
	{
		$file = str_replace('*','',$file);
		$file = trim($file);
		if(!is_writable('../'.$file)){
			$no_writablefile .= $file.' '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&times;<br>";
		}else{
			$writablefile .= $file.' '.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&radic;<br>';
		}
	}
    include "step4.inc.php";
    break;
    case 5;
    include "step5.inc.php";
    break;
    case 6;
    unset($_POST['step']);
    $blockfile='../files/blockset/'. $_POST['pt_rule'].'/block.php';
    $blockstr=file_get_contents($blockfile);
    $blocklistfile='../files/blockset/'. $_POST['pt_rule'].'/blocklist.php';
    $blockliststr=file_get_contents($blocklistfile);
    $pt->writeto('../templets/default/block.php',$blockstr);
    $pt->writeto('../templets/default/blocklist.php',$blockliststr);
    $setfile= '../data/config.inc.php';
    include $setfile;
    foreach($_POST as $key => $value){
        $pt_set[strtoupper($key)]=$value;
    }
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="\$pt_set['$key']='$value';\n";
    }
    $str.='?>';
    $pt->writeto($setfile,$str);
    $file='../data/config.php';
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="define('$key','$value');\n";
    }
    $str.='?>';
    $pt->writeto($file,$str);
    
    include "step6.inc.php";
    break;
    case 7;
    //写入数据
    
	include '../data/adminuser.php';
	$adminnamenew = $_POST['username'];
	$adminpwdnew = $_POST['password'];
    $str='<?php'."\n";    
    $str.="\$adminname='".$adminnamenew."';\n";
    $str.="\$adminpwd='".md5($adminpwdnew)."';\n";
    $str.="\$logtime='$logtime';\n";
    $str.="\$logip='$logip';\n";    
    $str.='?>';
    $pt->writeto('../data/adminuser.php',$str);	
    $pt->writeto('../data/install.lock','');
	
	$newname='install'.md5($_SERVER['REQUEST_TIME']);
	$rootdir=str_replace('\\','/',str_replace('install','',dirname(__FILE__)));	
	$newroot='../'.$newname.'/';
	include "step7.inc.php";
	rename($rootdir.'install',$rootdir.$newname);
    
    break;
    
}


?>