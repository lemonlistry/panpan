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
           <th>留言人</th>
           <th>留言时间</th>
           <th>留言标题</th>
           <th>内容</th>
           <th>留言状态</th>
           <th>联系方式</th>
          <th> <span>操作</span> </th>
        </tr>
          <?php foreach($post as $v){?>
        <tr>
        
          <td> <?php echo $v['message_name']?> </td>
          <td> <?php echo date('Y-m-d',$v['message_addtime'])?> </td>
           <td> <?php echo $v['message_title']?> </td>
            <td> <?php echo $v['message_content']?> </td>
             <td> <?php if($v['message_state']=='0'){echo '未处理';}elseif($v['message_state']=='1'){echo '处理完全';}else{echo '处理失败';}?> </td>
          <td><?php echo $v['message_mobile']?></span></td>
          <td><?php if($v['message_state']=='0') {?><a href="<?= $this->createUrl('message/edit?id='.$v['message_id'].'&state=1')?>" title="处理完成">[处理完成]</a> | <a href="<?= $this->createUrl('message/edit?id='.$v['message_id'].'&state=2')?>" title="处理失败">[处理失败]</a><?php }elseif($v['message_state']=='1'){echo '处理完成';}else{echo '处理失败';}?></td>
        </tr>
          <?php }?>

      </tbody>
    </table>
    <div class="bodyBottom">
       
      <div class="pagerBar">
         <input class="deleteButton" value="删 除" id="delbutton" disabled="disabled" hidefocus="true" type="button">
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