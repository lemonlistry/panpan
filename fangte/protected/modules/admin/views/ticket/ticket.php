<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">

</head>


<body class="list"><div id="tipWindow" class="tipWindow"><span class="icon">&nbsp;</span><span class="messageText"></span></div><div id="messageWindow" class="messageWindow jqmID2"><div class="windowTop"><div class="windowTitle">提示信息&nbsp;</div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="messageContent"><span class="icon">&nbsp;</span><span class="messageText"></span></div><input class="formButton messageButton windowClose" value="确  定" hidefocus="true" type="button"></div><div class="windowBottom"></div></div><div id="contentWindow" class="contentWindow jqmID1"><div class="windowTop"><div class="windowTitle"></div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="windowContent"></div></div><div class="windowBottom"></div></div>
	<div class="body">
	<div class="listBar">
		<h1><span class="icon">&nbsp;</span>门票列表&nbsp;<span class="pageInfo">总记录数:  <?= $pages->_itemCount ?>(共<?= ceil($pages->_itemCount/10)?>页)</span></h1>
	</div>
			<div class="operateBar">
			&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="addButton" onclick="location.href='<?= $this->createUrl('ticket/addticket')?>'" value="添加门票" type="button">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
			<table id="listTable" class="listTable">
				<tbody><tr>
					<th>
					<span style="padding-left: 100px">景点名称</span>					</th>
                                        <th>
					<span style="padding-left: 100px">门票名称</span>					</th>
                                        <th>
					<span style="padding-left: 100px">门票市场价</span>					</th>
                                        <th>
					<span style="padding-left: 100px">门票预约价</span>					</th>
                                         <th>
					<span style="padding-left: 100px">支付方式</span>					</th>
					<th>操作	</th>
                                    </tr>
                                    <?php foreach($post as $v){?>
					<tr>
						<td style="padding-left: 100px"><?= $v['class_name']?></td>
                                                <td style="padding-left: 100px"><?= $v['ticket_name']?></td>
                                                <td style="padding-left: 100px"><?= $v['ticket_market_price']?></td>
                                                <td style="padding-left: 100px"><?= $v['ticket_shop_price']?></td>
                                                <td style="padding-left: 100px"><?= $v['ticket_paystate']?></td>
							<td>
                                                            <a href="<?= $this->createUrl('ticket/addticket/id/'.$v['ticket_id'])?>">[编辑]</a>|<a href="<?= $this->createUrl('ticket/delticket/id/'.$v['ticket_id'])?>">[删除]</a></td>
					</tr>
                                    <?php }?>
			</tbody></table>
			<div class="bodyBottom">
			<div class="pagerBar">
                            <span id="pager"> <?php $this->widget('CLinkPager',array(
                                'pages'=>$pages,
                                'nextPageLabel'=>'下一页',
                                'prevPageLabel'=>'上一页',
                                 'lastPageLabel'=>'尾頁',
                                'firstPageLabel'=>'首頁',
                            ));?></span>
			  </div>
		  </div>
	</div>

</body>
<?php 
    echo CHtml::scriptFile(Yii::app()->request->baseUrl.'/js/jquery.js');
    echo CHtml::scriptFile(Yii::app()->request->baseUrl.'/js/arealist.js');
?>
</html>