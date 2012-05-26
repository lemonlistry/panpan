
<!--订票-->
<div class="mid">
	<!--左边-->
      <?php include dirname('index.php') . '/protected/views/left.php';?>
  <div class="mid_right_nr">
  	<div class="mbx">
  		<span>您所在的位置：<a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界">首页</a> > <a href='<?php echo $this->createUrl('product/other')?>'>周边景点</a></span>
  	</div>
  	<div class="title_news">
    	<h1><?php echo $info['other_name']?></h1>
    </div>
    <div class="wzxx"><span>添加：<?php echo date('Y-m-d',$info['other_addtime']);?></span><span>修改：<?php echo date('Y-m-d',$info['other_updatetime']);?></span><span>隶属：<a href='<?php echo $this->createUrl('product/other')?>'>周边景点</a></span><span>点击数：<?php echo $info['other_click'];?></span></div>
    <div class="nr">
	<?php echo $info['other_content'];?>
<table border="0" cellspacing="1" cellpadding="0" style="text-align: center; background-color: #fff; margin-top: 10px; width: 100%">
    <tbody>
        <tr>
            <th width="30%">门票类型</th>
            <th width="15%">门票挂牌价</th>
            <th width="15%">折扣价</th>
            <th>支付方式</th>
            <th width="16%">预定</th>
        </tr>
        <?php foreach($tick_list as $val){?>
    	    <tr>
    	      <td><?php echo $val['ticket_name']?></td>
    	      <td>￥<?php echo $val['ticket_market_price']?></td>
    	      <td style="color: red">￥<?php echo $val['ticket_shop_price']?></td>
               <td><?php echo $val['ticket_paystate']?></td>
    	      <td><a href="<?php echo $this->createUrl('product/booking/id/'.$val['ticket_id'])?>" title="<?php echo $val['ticket_name']?>"><img src="<?php echo Yii::app()->request->baseUrl?>/images/yuding.jpg" /></a></td>
          </tr>
          <?php }?>
    </tbody>
</table>
   <table width="100%" border="0" style=" margin-top:20px;">
        	<tr height="25px;">
                    <td width="50%" align="center" valign="middle">上一个：<?php if(empty ($before)){echo "暂无";}else{echo "<a href='{$this->createUrl('product/otherinfo/id/'.$before['other_id'])}'>{$before['other_name']}</a>";}?></td>
        	<td width="50%" align="center" valign="middle">下一个：<?php if(empty ($next)){echo "暂无";}else{echo "<a href='{$this->createUrl('product/otherinfo/id/'.$next['other_id'])}'>{$next['other_name']}</a>";}?></td>
        </tr>
      </table>
    </div>
    <div class="nr_bottom"></div>
  </div>
</div>
<div class="clear"></div>
