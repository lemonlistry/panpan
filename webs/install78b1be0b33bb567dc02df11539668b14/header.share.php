<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $stepname[$step];?> - PT小说小偷安装程序</title>
<link href="<?php echo $newroot;?>style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>
<script language="JavaScript" src="js/install.js" charset="<?php echo $charset;?>"></script>
</head>
<body>
<div id="main">
<div id="ads">- PT小说小偷网站管理系统</div>
<div id="top"><a href="http://www.ptcms.com/" target="_blank">官方网站</a> | <a href="http://bbs.ptcms.com/" target="_blank">官方论坛</a></div>
	<div id="step-title">安装步骤</div>
  <div id="left">
    <ul>
    <?php 
    for ($i=1;$i<=7;$i++){
        if ($i==$step){
            echo '<li id="now">'.$stepname[$i].'</li>'."\n";
        }else{
            echo '<li>'.$stepname[$i].'</li>'."\n";
        }
    }
	?>
    </ul>
  </div>
  <div id="right">
    <h3><span><?php echo $step;?></span><?php echo $stepname[$step];?></h3>