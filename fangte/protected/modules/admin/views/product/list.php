<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">

</head>


<body class="list">
	<div class="body">
	<div class="listBar">
		<h1><span class="icon">&nbsp;</span>方特娱乐设施列表&nbsp;<span class="pageInfo">总记录数:  <?= $pages->_itemCount ?>(共<?= ceil($pages->_itemCount/10)?>页)</span></h1>
	</div>
			<div class="operateBar">
			&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="addButton" onclick="location.href='<?= $this->createUrl('product/add')?>'" value="添加设施" type="button">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
			<table id="listTable" class="listTable">
				<tbody><tr>
					<th>
					<span style="padding-left: 100px">项目名称</span>					</th>
                                        <th>
					<span style="padding-left: 100px">添加时间</span>					</th>
                                        <th>
					<span style="padding-left: 100px">修改时间</span>					</th>
                                        <th>
					<span style="padding-left: 100px">点击次数</span>					</th>
					<th>操作	</th>
                                    </tr>
                                    <?php foreach($post as $v){?>
					<tr>
						<td style="padding-left: 100px"><?php echo $v['pay_name']?></td>
                                                <td style="padding-left: 100px"><?php echo date('Y-m-d',$v['pay_addtime']);?></td>
                                                <td style="padding-left: 100px"><?php echo date('Y-m-d',$v['pay_updatetime']);?></td>
                                                <td style="padding-left: 100px"><?php echo $v['pay_click']?></td>
							<td>
                                                            <a href="<?= $this->createUrl('product/add/id/'.$v['pay_id'])?>">[编辑]</a>|<a href="<?= $this->createUrl('product/delpay/id/'.$v['pay_id'])?>">[删除]</a></td>
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