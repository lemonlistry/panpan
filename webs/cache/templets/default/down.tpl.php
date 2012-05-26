<!DOCTYPE html PUBliC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title><?php echo $title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<meta name="author" content="<?php echo PT_SITENAME?>,<?php echo PT_SITEURL?>"/> 
<meta name="copyright" content="本站小说都是由网友转载于网络，与本站立场无关,若转载小说侵犯了您的权益，请联系"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/down.css" type="text/css" rel="stylesheet"/>
</head>
<body onkeydown="if(event.keyCode==27) return false;">
<center>
<table width="519" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="3">
			<img id="down_01" src="<?php echo PT_SITEURL?>templets/default/images/down_01.jpg" width="259" height="49" alt="" /></td>
		<td colspan="2">
			<img id="down_02" src="<?php echo PT_SITEURL?>templets/default/images/down_02.jpg" width="260" height="49" alt="" /></td>
	</tr>
	<tr>
		<td colspan="2">
			<img id="down_03" src="<?php echo PT_SITEURL?>templets/default/images/down_03.jpg" width="28" height="79" alt="" /></td>
		<td colspan="2" align="left">
			<font color="#ff0000">说明：</font><br /><?php echo $msgstr?></td>
		<td>
			<img id="down_05" src="<?php echo PT_SITEURL?>templets/default/images/down_05.jpg" width="23" height="79" alt="" /></td>
	</tr>
	<tr>
		<td>
			<img id="down_06" src="<?php echo PT_SITEURL?>templets/default/images/down_06.jpg" width="19" height="379" alt="" /></td>
		<td colspan="3" align="center" valign="top">
			<table width="98%" border="0" cellpadding="2" cellspacing="2" bgcolor="#f4f4f4">
                <tr>
					<td width="60%" align="left">&nbsp;&nbsp;<img src="<?php echo PT_SITEURL?>templets/default/images/down_gs.gif" width="13" height="13" /> 小说名称：<font color="#ff0000"><?php echo $bookname?></font>&nbsp;&nbsp;&nbsp;文件格式：<font color="#ff0000"><?php echo $type?></font></td>
					<td width="40%" align="right">&nbsp;&nbsp;&nbsp;</td>
                </tr>
			</table>
			<div style="overflow:auto;width:460px;height:350px;">
				<table width="90%" border="0" cellpadding="2" cellspacing="2" bgcolor="#f7fbff">
					<tr>
						<td width="25%" align="center">分 册</td>
						<td width="15%" align="center">大 小</td>
						<td width="20%" align="center">时 间</td>
						<td width="40%" align="center">下载地址</td>
					</tr>
				</table>
				<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2">
<?php
for($i=1;$i<=$downlistnum;$i++){
?>
<tr>
						<td width="25%" align="center" bgcolor="#f8f7f7"><?php echo $downlist[$i]['name']?></td>
						<td width="15%" align="center" bgcolor="#f8f7f7"><?php echo $downlist[$i]['size']?></td>
						<td width="20%" align="center" bgcolor="#f8f7f7"><?php echo $downlist[$i]['date']?></td>
						<td width="40%" align="center" bgcolor="#f8f7f7"><a href="<?php echo $downlist[$i]['url']?>" target="_blank"><b>点击下载</b></a></td>
				    </tr>
<?php
}
?>
</table>
			</div>
		</td>
		<td><img id="down_08" src="<?php echo PT_SITEURL?>templets/default/images/down_08.jpg" width="23" height="379" alt="" /></td>
	</tr>
	<tr>
		<td>
			<img id="down_09" src="<?php echo PT_SITEURL?>templets/default/images/down_09.jpg" width="19" height="21" alt="" />
		</td>
		<td colspan="3" background="<?php echo PT_SITEURL?>templets/default/images/down_10.jpg">&nbsp;</td>
		<td>
			<img id="down_11" src="<?php echo PT_SITEURL?>templets/default/images/down_11.jpg" width="23" height="21" alt="" />
		</td>
	</tr>
	<tr>
		<td>
			<img src="<?php echo PT_SITEURL?>templets/default/images/spacer.gif" width="19" height="1" alt="" /></td>
		<td>
			<img src="<?php echo PT_SITEURL?>templets/default/images/spacer.gif" width="9" height="1" alt="" /></td>
		<td>
			<img src="<?php echo PT_SITEURL?>templets/default/images/spacer.gif" width="231" height="1" alt="" /></td>
		<td>
			<img src="<?php echo PT_SITEURL?>templets/default/images/spacer.gif" width="237" height="1" alt="" /></td>
		<td>
			<img src="<?php echo PT_SITEURL?>templets/default/images/spacer.gif" width="23" height="1" alt="" /></td>
	</tr>
</table>
</center>
</body>
</html>