
<div class="mid1">
	<div class="mid1_left">
    <a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界"><img src="<?php echo Yii::app()->request->baseUrl?>/images/tu2.gif" width="326" height="200" /></a></div>
    <div class="mid1_right">
		<div class="mid1_right_top">
        <h1>株洲方特欢乐世界</h1>
        <span><a href="<?php echo $this->createUrl('site/custom')?>">->详情</a></span>
        </div>
    <div class="mid1_right_content" style="text-indent:2em;">       	株洲方特欢乐世界位于株洲云龙示范区，地处长株潭城市群中心，占地60万平方米，总投资25亿元，是一个国际一流的第四代主题公园。以科幻和动漫为最大特色，可与当前西方最先进的主题公园相媲美。</p>株洲方特游乐园由飞越极限、星际航班、恐龙危机、生命之光、海螺湾、逃出恐龙岛、维苏威火山、聊斋、宇宙博览会、火流星、探险乐园等十几个主题项目区组成，包含主题项目、游玩项目、休闲景观项目以及配套服务共计200多项，绝大多数项目老少皆宜。</p>
这是一场盛况空前的欢乐盛宴，这是一个充满神奇的梦幻乐园，这是一个未来科幻的探险王国。要欢乐，去方特！欢迎加入方特梦幻之旅！株洲方特欢乐世界欢迎您...</div>
	</div>

</div>
<!--订票-->
<div class="mid2">
	<div class="mid2_nr">
    	
    	  <table width='800px' border="0" cellpadding="0" cellspacing="1" style='margin-left:70px;'>
    	    <tr>
    	      <td width="50%" height="18"><strong>门票类型</strong></td>
    	      <td width="15%"><strong>门票挂牌价</strong></td>
    	      <td width="15%"><strong>折扣价</strong></td>
	      <td width="15%"><strong>支付方式</strong></td>
    	      <td width="5%" align="center"><strong>预订</strong></td>
  	      </tr>
    	    <?php foreach($tick_list as $val){?>
    	    <tr style="color:#931573">
    	      <td height="30"><?php echo $val['ticket_name']?></td>
    	      <td><del>￥<?php echo $val['ticket_market_price']?></del></td>
    	      <td>￥<?php echo $val['ticket_shop_price']?></td>
	      <td>景点支付</td>
    	      <td><a href="<?php echo $this->createUrl('product/booking/id/'.$val['ticket_id'])?>" title="<?php echo $val['ticket_name']?>"><img src="<?php echo Yii::app()->request->baseUrl?>/images/yuding.jpg" /></a></td>
          </tr>
          <?php }?>
  	    </table>
    	
        
    </div>
</div>
<div class="mid">
	<!--左边-->
    <?php include dirname('index.php') . '/protected/views/left.php';?>
    <div class="mid_right">
    	<div class="mid_r_1_top">
        	<h2>游玩项目</h2>
            <span><a href="<?php echo $this->createUrl('product/index')?>" title="株洲方特欢乐世界游玩项目"> >> 更多</a></span>
        </div>
        <div class="mid_r_1_cont">
        	<ul>
                    <?php foreach($pay_list as $val){?>
                                <li>
                                <a href="<?php echo $this->createUrl('product/payinfo/id/'.$val['pay_id'])?>">
                                    <img src="<?php echo Yii::app()->request->baseUrl.$val['pay_image']?>" alt="<?php echo $val['pay_name'];?>" width="200" height="132"  /></a>
               	  <strong><a href="<?php echo $this->createUrl('product/payinfo/id/'.$val['pay_id'])?>" title="<?php echo $val['pay_name'];?>">
                                            <?php echo $val['pay_name'];?></a></strong>
                                    <span><?php echo mb_substr($val['pay_remark'], 0,40,'utf-8');?><a href="<?php echo $this->createUrl('product/payinfo/id/'.$val['pay_id'])?>" title="<?php echo $val['pay_name'];?>">【详情】</a></span>
                </li>  
                <?php }?>
            </ul>
        </div>
        
        <div class="mid_r_1_top">
       	  <h2>周边景点及酒店</h2>
            <span><a href="<?php echo $this->createUrl('product/other');?>" title="株洲方特欢乐世界周边景点"> >> 更多</a></span>
        </div>
        <div class="mid_r_2_cont">
        	<ul>
                    <?php foreach($other as $val){?>
                                <li><a href="<?php echo $this->createUrl('product/otherinfo/id/'.$val['other_id'])?>" title="<?php echo $val['other_name'];?>">
                                    <img src="<?php echo Yii::app()->request->baseUrl.$val['other_image'];?>" alt="<?php echo $val['other_name'];?>" width="166" height="114" /></a>
                	<span><a href="<?php echo $this->createUrl('product/otherinfo/id/'.$val['other_id'])?>" title="<?php echo $val['other_name'];?>">
                                            <?php echo $val['other_name'];?></a></span>
                </li>
                          <?php }?>
            </ul>
        </div>
        
        <div class="mid_r_3">
        	<div class="mid_r_3_left">
            	<div class="mid_r_3_left_top">
                	<h2><a href="<?php echo $this->createUrl('product/news');?>" title="株洲方特欢乐世界新闻">新闻公告</a></h2>
                </div>
                <div class="mid_r_3_left_cont">
                	<ul>
                            <?php foreach($new_list as $val){?>
                                <li><a href="<?php echo $this->createUrl('product/newsview/id/'.$val['news_id'])?>" title="<?php echo $val['news_name'];?>">
                                    <?php echo mb_substr($val['news_name'],0,'18','UTF-8');?></a><span><?php echo date('Y-m-d',$val['news_addtime']);?></span></li>
                                <?php }?>
                    </ul>
                </div>
            </div>
            <div class="mid_r_3_right">
            	<div class="mid_r_3_right_top">
                	<h2><a href="<?php echo $this->createUrl('product/news/cid/2');?>" title="株洲方特欢乐世界游记攻略">游记攻略</a></h2>
                </div>
                <div class="mid_r_3_right_cont">
                	<ul>
                    	 
                               <?php foreach($gonglue as $val){?>
                                <li><a href="<?php echo $this->createUrl('product/newsview/id/'.$val['news_id'])?>" title="<?php echo $val['news_name'];?>">
                                    <?php echo mb_substr($val['news_name'],0,'18','UTF-8');?></a><span><?php echo date('Y-m-d',$val['news_addtime']);?></span></li>
                                <?php }?>
                    </ul>
                </div>
            </div>
        </div>
        
   </div>
</div>
<div class="clear"></div>
