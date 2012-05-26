<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>8090旅游在线预订系统</title>
<meta name="Author" content="58haojie Team">
<meta name="Copyright" content="58haojie">
<link rel="icon" href="#" type="image/x-icon"> 
<link rel="shortcut icon" href="#" type="image/x-icon">
</head>
<frameset id="parentFrameset" rows="60,*" cols="*" frameborder="no" border="0" framespacing="0">
    <frame id="headerFrame" name="headerFrame" src="<?= $this->createUrl('default/top')?>" frameborder="no" noresize="noresize" scrolling="no">
	<frameset id="mainFrameset" name="mainFrameset" cols="150,6,*" frameborder="no" border="0" framespacing="0">
		<frame id="menuFrame" name="menuFrame" src="<?= $this->createUrl('default/menusupplie')?>" frameborder="no" noresize="noresize" scrolling="">
		<frame id="middleFrame" name="middleFrame" src="<?= $this->createUrl('default/right')?>" frameborder="no" noresize="noresize" scrolling="no">
                    <frame id="mainFrame" name="mainFrame" src="<?= $this->createUrl('order/index')?>" frameborder="no" noresize="noresize">
	</frameset>
</frameset>
<noframes>
	<body>
		noframes
	</body>
</noframes>
</html>
