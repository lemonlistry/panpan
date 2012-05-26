<?php
$tpl_file_set = PT_DIR . PT_TPLDIR . PT_TPL . '/templets.set.php';
if (!file_exists($tpl_file_set)) {
	exit($tpl_file_set.'模板设置文件templets.set.php不存在!(' . PT_TPLDIR . PT_TPL . '/templets.set.php)');
}
include $tpl_file_set;
include PT_DIR . PT_RULESDIR. PT_RULE .'/rules.sort.php';
$sortnum=count($pt_templets_sortnav);
$navstr = "<?php\n";
$navstr .="\$sortnum='$sortnum';\n";
$navcount = count($pt_templets_nav);
//nav第一行大分类
for ($i = 1; $i <= $navcount; $i++) {
	if (stristr($pt_templets_nav[$i]['url'], 'http://')) {
		
	} else {
		$pt_templets_nav[$i]['url'] = PT_SITEURL . $pt_templets_nav[$i]['url'];
	}
	$navstr .= '$' . "pt_templets_nav[$i]['name']='" . $pt_templets_nav[$i]['name'] . "';\n";
	$navstr .= '$' . "pt_templets_nav[$i]['url']='" . $pt_templets_nav[$i]['url'] . "';\n";
}
$navstr .= "\n\n";
//nav第二行小分类
$sortnavcount = count($pt_templets_sortnav);
for ($i = 1; $i <= $sortnavcount; $i++) {
	$navstr .= '$' . "pt_templets_sortnav[$i]['name']='" . $pt_templets_sortnav[$i]['name'] . "';\n";
	$navstr .= '$' . "pt_templets_sortnav[$i]['url']='" . $pt->getsorturl($pt_templets_sortnav[$i]['id']) . "';\n";
}
$navstr .= "?>";
$pt->writeto($tpl_file_nav, $navstr);
?>