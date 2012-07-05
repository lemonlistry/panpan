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
      <h1><span class="icon">&nbsp;</span><?php switch ($status){
          case '1':
              echo '预约成功单列表';
              break;
          case '2':
              echo '交易完成订单列表';
              break;
          case '3':
              echo '预约取消订单列表';
              break;
          default:
              echo '预约成功单列表';
              break;
      }?>&nbsp;总记录数: <?= $pages->_itemCount ?> (共<?= ceil($pages->_itemCount/20)?>页)</h1>
  </div>
    <table id="listTable" class="listTable">
      <tbody>
        <tr>
         
          </th>
           <th>订单编号</th>
           <th>预订景点</th>
           <th>预订门票</th>
           <th>预定人手机</th>
           <th>预定人姓名</th>
           <th>出游时间</th>
           <th>预定数量</th>
           <th>添加时间</th>
          <th> <span>操作</span> </th>
        </tr>
          <?php foreach($post as $v){?>
        <tr>
        
          <td> <?php echo $v['order_sn']?> </td>
          <td> <?php echo $v['class_name']?> </td>
           <td> <?php echo $v['ticket_name']?> </td>
            <td> <?php echo $v['order_mobile']?> </td>
             <td> <?php echo $v['order_username']?> </td>
              <td> <?php echo date('Y-m-d',$v['order_time'])?> </td>
<td> <?php echo $v['order_number'];?> </td>
          <td><span title="<?= date('Y-m-d H:i:s',$v['order_addtime'])?>"><?= date('Y-m-d',$v['order_addtime'])?></span></td>
  <td><?php if($v['order_state']=='0') {?>
  <a href="<?= $this->createUrl('order/edit?id='.$v['order_id'].'&state=1')?>" title="交易成功">[交易成功]</a> | <a href="<?= $this->createUrl('order/edit?id='.$v['order_id'].'&state=2')?>" title="取消预约">[取消预约]</a> | <a href="<?php echo $this->createUrl('order/del?id='.$v['order_id'].'&status=0');?>">[删除订单]</a>
  <?php }elseif($v['order_state']=='1'){echo '交易成功';}else{ ?> <a href="<?php echo $this->createUrl('order/del?id='.$v['order_id'].'&status=2');?>">[删除订单]</a><?php }?></td>
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
