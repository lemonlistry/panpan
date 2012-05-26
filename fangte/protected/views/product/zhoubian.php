
<div class="mid">
	<!--左边-->
   <?php include dirname('index.php') . '/protected/views/left.php';?>
  <div class="mid_right_nr">
  	<div class="mbx">
  		<span>您所在的位置：<a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界">首页</a>  >周边景点</span>
  	</div>
  	<div class="title">
    	<h1>株洲方特欢乐世界周边景点</h1>
    </div>
    <div class="nr_products">
     <ul>
  <?php foreach($post as $val){?>
                                <li><a href="<?php echo $this->createUrl('product/otherinfo/id/'.$val['other_id']);?>" title="<?php echo $val['other_name'];?>">
                                    <img src="<?php echo Yii::app()->request->baseUrl.$val['other_image'];?>" alt="<?php echo $val['other_name'];?>" width="166" height="114" /></a>
                	<strong><a href="<?php echo $this->createUrl('product/otherinfo/id/'.$val['other_id']);?>" title="<?php echo $val['other_name'];?>">
                                            <?php echo $val['other_name'];?></a></strong>
                                    <span><?php echo mb_substr($val['other_remark'], 0,35,'utf-8');?><a href="<?php echo $this->createUrl('product/otherinfo/id/'.$val['other_id']);?>" title="<?php echo $val['other_name'];?>">【详情】</a></span>
                </li>
                          <?php }?>
    </ul>
     
    
    </div>
     <div align="center"><?php $this->widget('CLinkPager',array(
                                'pages'=>$pages,
                                'nextPageLabel'=>'下一页',
                                'prevPageLabel'=>'上一页',
                                 'lastPageLabel'=>'尾頁',
                                'firstPageLabel'=>'首頁',
                            ));?></div>
    <div class="nr_bottom"></div>
  </div>
</div>
<div class="clear"></div>
