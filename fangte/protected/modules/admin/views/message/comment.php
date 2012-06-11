<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body class="list">
<div class="body">
  <div class="listBar">
      <h1><span class="icon">&nbsp;</span>留言列表&nbsp;总记录数: <?= $pages->_itemCount ?> (共<?= ceil($pages->_itemCount/10)?>页)</h1>
  </div>
    <table id="listTable" class="listTable">
      <tbody>
        <tr>
         
          </th>
           <th>评论人</th>
	   <th>评论门票类型</th>
	   <th>评论门票</th>
           <th>评论时间</th>
           <th>内容</th>
           <th>评论状态</th>
          <th> <span>操作</span> </th>
        </tr>
          <?php foreach($post as $v){?>
        <tr>
        
          <td> <?php echo $v['comment_name']?> </td>
	  <td> <?php echo $v['comment_ticketclassname']?> </td>
	  <td> <?php echo $v['comment_tickname']?> </td>
          <td> <?php echo date('Y-m-d',$v['add_time'])?> </td>
           <td> <?php echo $v['comment_content']?> </td>
             <td> <?php if($v['state']=='0'){echo '待审核';}elseif($v['state']=='1'){echo '审核不通过';}else{echo '审核通过';}?> </td>
          <td><?php if($v['state']=='0') {?><a href="<?= $this->createUrl('message/editcomment?id='.$v['comment_id'].'&state=1')?>" title="不通过">[不通过]</a> | <a href="<?= $this->createUrl('message/editcomment?id='.$v['comment_id'].'&state=2')?>" title="通过">[通过]</a><?php }?></td>
        </tr>
          <?php }?>

      </tbody>
    </table>
    <div class="bodyBottom">
       
      <div class="pagerBar">
        <span id="pager">
            <?php $this->widget('CLinkPager',array(
                                'pages'=>$pages,
                                'nextPageLabel'=>'下一页',
                                'prevPageLabel'=>'上一页',
                                 'lastPageLabel'=>'尾頁',
                                'firstPageLabel'=>'首頁',
                            ));?>
        </span>
        
      </div>
    </div>
  
</div>
</body>
    <?php 
        echo CHtml::scriptFile(Yii::app()->request->baseUrl.'/js/jquery.js');
        echo CHtml::scriptFile(Yii::app()->request->baseUrl.'/js/artDialog/artDialog.js?skin=blue');
        echo CHtml::scriptFile(Yii::app()->request->baseUrl.'/js/order.js');
    ?>
</html>