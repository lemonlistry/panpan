
<!--订票-->
<div class="mid">
	<!--左边-->
    <?php include dirname('index.php') . '/protected/views/left.php';?>
  <div class="mid_right_nr">
  	<div class="mbx">
  		<span>您所在的位置：<a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界">首页</a> > 株洲方特欢乐世界新闻中心</span>
  	</div>
  	<div class="title">
    	<h1>株洲方特欢乐世界新闻中心</h1>
    </div>
    <div class="title_2">
    	   
        <a href="<?php echo $this->createUrl('product/news/cid/1')?>" title="新闻公告"><h2>新闻公告</h2></a>
	   
	<a href="<?php echo $this->createUrl('product/news/cid/2')?>" title="游记攻略"><h2>游记攻略</h2></a>
	   
	<a href="<?php echo $this->createUrl('product/news/cid/3')?>" title="跟团线路"><h2>跟团线路</h2></a>
	
    </div>
    <div class="nr_news">
     <ul>
    	<?php foreach($post as $val){?>
		<li><span style=" float:right; width:80px;"><?php echo date('Y-m-d',$val['news_addtime']);?></span>
                    <span style=" float:left; width:600px;"><a href="<?php echo $this->createUrl('product/newsview/id/'.$val['news_id']);?>" title="<?php echo $val['news_name'];?>"><?php echo $val['news_name'];?></a></span></li>
	<?php }?>
    </ul>
        <div class="page" align="center"><?php $this->widget('CLinkPager',array(
                                'pages'=>$pages,
                                'nextPageLabel'=>'下一页',
                                'prevPageLabel'=>'上一页',
                                 'lastPageLabel'=>'尾頁',
                                'firstPageLabel'=>'首頁',
                            ));?></div>
    
    </div>
    <div class="nr_bottom"></div>
  </div>
</div>
<div class="clear"></div>
