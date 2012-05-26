<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="Author" content="58haojie Team">
<meta name="Copyright" content="58haojie">
<link rel="icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="http://www.58haojie.com/favicon.ico" type="image/x-icon">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body class="menu"><div id="tipWindow" class="tipWindow"><span class="icon">&nbsp;</span><span class="messageText"></span></div><div id="messageWindow" class="messageWindow jqmID2"><div class="windowTop"><div class="windowTitle">提示信息&nbsp;</div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="messageContent"><span class="icon">&nbsp;</span><span class="messageText"></span></div><input class="formButton messageButton windowClose" value="确  定" hidefocus="true" type="button"></div><div class="windowBottom"></div></div><div id="contentWindow" class="contentWindow jqmID1"><div class="windowTop"><div class="windowTitle"></div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="windowContent"></div></div><div class="windowBottom"></div></div>
	<div class="menuContent">
		<dl>
			<dt>
				<span>新闻类型管理</span>
			</dt>
			<dd>
                            <a href="<?= $this->createUrl('news/class')?>" target="mainFrame">类型列表</a>
			</dd>
			<dd>
				<a href="<?= $this->createUrl('news/addclass')?>" target="mainFrame">添加类型</a>
			</dd>
		</dl>
		  <dl>
                                                <dt>
                                                    <span>方特娱乐设施管理</span>

                                                </dt>
                                                <dd>
                                                    <a href="<?= $this->createUrl('product/list'); ?>" target="mainFrame">娱乐设施列表</a>
                                                </dd>
                                                <dd>
                                                    <a href="<?= $this->createUrl('product/add'); ?>" target="mainFrame">添加娱乐设施</a>
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt>
                                                    <span>其他景点管理</span>

                                                </dt>
                                                <dd>
                                                    <a href="<?= $this->createUrl('product/other'); ?>" target="mainFrame">景点列表</a>
                                                </dd>
                                                <dd>
                                                    <a href="<?= $this->createUrl('product/addother'); ?>" target="mainFrame">添加景点</a>
                                                </dd>
                                            </dl>
            <dl>
			<dt>
				<span>门票类型</span>
			</dt>
			<dd>
                            <a href="<?= $this->createUrl('ticket/class')?>" target="mainFrame">门票类型列表</a>
			</dd>
			<dd>
				<a href="<?= $this->createUrl('ticket/addclass')?>" target="mainFrame">添加门票类型</a>
			</dd>
		</dl>
		
		<dl>
			<dt>
				<span>门票</span>
			</dt>
			<dd>
				<a href="<?= $this->createUrl('ticket/list')?>" target="mainFrame">门票列表</a>
			</dd>
                        <dd>
				<a href="<?= $this->createUrl('ticket/addticket')?>" target="mainFrame">添加门票</a>
			</dd>
		</dl>
		<dl>
			<dt>
				<span>新闻管理</span>
			</dt>
			<dd>
				<a href="<?=$this->createUrl('news/list')?>" target="mainFrame">新闻列表</a>
			</dd>		
			<dd>
				<a href="<?=$this->createUrl('news/add')?>" target="mainFrame">添加新闻</a>
			</dd>
		</dl>
            <dl>
			<dt>
				<span>留言管理</span>
			</dt>
			<dd>
                            <a href="<?= $this->createUrl('message/index')?>" target="mainFrame">留言列表</a>
			</dd>
		</dl>
	</div>

</body></html>