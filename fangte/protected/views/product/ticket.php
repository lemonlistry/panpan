
<div class="mid">
	<!--左边-->
     <?php include dirname('index.php') . '/protected/views/left.php';?>
  <div class="mid_right_nr">
  	<div class="mbx">
  		<span>您所在的位置：<a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界">首页</a> > 门票预订</span>
  	</div>
  	<div class="title">
    	<h1>所有景区门票预订</h1>
    </div>
    <div class="nr">
        <?php foreach($list as $val){?>
        <h2>景区:<?php echo $val[0]?></h2>
	<table width='100%' bgcolor='0' cellpadding='0' cellspacing="1" style='background:#CCC; text-align:center;'>
            <tr style='height:25px; background:#FFF;' align='center'>
                <td style='background:#FFF;' width='60%'>景区门票</td>
                <td style='background:#FFF;' width='15%'>挂牌价</td>
                <td style='background:#FFF;' width='15%'>折扣价</td>
                <td style='background:#FFF;' width='10%'>预订</td>
            </tr>
            <?php foreach($val[1] as $value){?>
            <tr style='height:25px; background:#FFF;' align='center' >
            <td height='33' ><?php echo $value['ticket_name'];?></td>
            <td height='33' ><del style=" font-size:16px;">￥<?php echo $value['ticket_market_price'];?></del></td>
            <td height='33' ><strong style=" font-size:16px;">￥<?php echo $value['ticket_shop_price'];?></strong></td>
            <td style='background:#FFF;'><a href="<?php echo $this->createUrl('product/booking/id/'.$value['ticket_id']);?>" target="_blank" ><img src='<?php echo Yii::app()->request->baseUrl?>/images/yd2.jpg'></a></td>
            </tr>
            <?php }?>
        </table>
        <br/>
        <?php }?>
    </div>
    <div class="nr_bottom"></div>
  </div>
</div>
<div class="clear"></div>
