<?php
   //$wenda = Yii::app()->db->createCommand("SELECT news_id,news_name,news_addtime FROM news WHERE news_class_id=4 order by news_addtime  desc limit 0,5")->queryAll();
    $date = date('Y-m-d',time());
    //echo "SELECT order_mobile,order_username,order_addtime,ticket_name from order_list inner join ticket on order_list.=ticket.tick_id where DATE_FORMAT(order_addtime,'%Y-%m-%d')='{$date}'";exit;
    $new_order = Yii::app()->db->createCommand("SELECT order_mobile,order_username,order_addtime,ticket_name from order_list inner join ticket on order_list.order_ticket_id=ticket.ticket_id where FROM_UNIXTIME(order_addtime,'%Y-%m-%d')='{$date}'")->queryAll();
    function getHours($time1,$time2)
    {
	$time1 = strtotime($time1);
	$time2 = strtotime($time2);
	$time = $time2-$time1;
	$remain = $time%86400;
	$hours = ceil($remain/3600)==0 ? '1': ceil($remain/3600);
	return $hours;
    }
?>

<div class="mid_left">
    	<div class="mid_left_title">
    	  <img src="<?php echo Yii::app()->request->baseUrl?>/images/left_1.jpg" width="203" height="92" />
        </div>
        <div class="mid_left_cont">
        <ul>
      
			<li><a href="<?php echo $this->createUrl('site/custom')?>" title="简介">简介</a></li>
			
			<li><a href="<?php echo $this->createUrl('site/notes')?>" title="游玩须知">游玩须知</a></li>
			
			<li><a href="<?php echo $this->createUrl('site/about')?>" title="联系方式">联系方式</a></li>
			
			<li><a href="<?php echo $this->createUrl('site/Route')?>" title="交通线路">交通线路</a></li>
			
        </ul>
        </div>
        
        <div class="mid_left_title">
   	    	<h3><a href="<?php echo $this->createUrl('product/index');?>" title="株洲方特欢乐世界游乐设施" style="color:#FFFFFF;"><img src="<?php echo Yii::app()->request->baseUrl?>/images/left_2.jpg" width="203" height="92" /></a></h3>
        </div>
        <div class="mid_left_cont">
        <ul>
        
			<li><a href="<?php echo $this->createUrl('product/index')?>" title="游玩项目">游玩项目</a></li>
			<li><a href="<?php echo $this->createUrl('product/other')?>" title="周边景点">周边景点</a></li>
			
        </ul>
        </div>
        
        <div class="mid_left_title">
   	    	<h3><a href="<?php echo $this->createUrl('product/news');?>" title="株洲方特欢乐世界新闻" style="color:#FFFFFF;"><img src="<?php echo Yii::app()->request->baseUrl?>/images/left_3.jpg" width="203" height="92" /></a></h3>
        </div>
	
        <div class="mid_left_cont">
        <ul>
        
			<li><a href="<?php echo $this->createUrl('product/news/cid/1')?>" title="新闻公告">新闻公告</a></li>
			
			<li><a href="<?php echo $this->createUrl('product/news/cid/2')?>" title="游记攻略">游记攻略</a></li>
                        
                        <li><a href="<?php echo $this->createUrl('product/news/cid/3')?>" title="跟团线路">跟团线路</a></li>
        </ul>
        </div>
	<div class="mid_left_title">
   	    	<h3><a href="http://www.8090goto.com/?view=147" title="预付款" style="color:#FFFFFF;" target='_blank'><img src="<?php echo Yii::app()->request->baseUrl?>/images/yufukuan.gif" width="203" height="92" /></a></h3>
        </div>
	
        <div class="mid_left_wd_title">
        	<h3>今日最新门票预订信息</h3>
        </div>
	<div align="center" id="demo" class="demo_mid_left_wd_title">
	<div id="demo1" class="demo_mid_left_wd_title_p">
	    <?php if(count($new_order)>0): $count = count($new_order);?>
	    <?php foreach($new_order as $key=>$val):?>
		<p><span style="color: #00CCFF;padding-left: 2px;">
		<?php echo mb_substr($val['order_username'], 0,3).'...';?></span>
		<span style="margin-left:5px;"><?php echo mb_substr($val['order_mobile'], 0,7).'****';?></span>
		<span style="margin-left:12px;"><?php echo getHours($val['order_addtime'],time());?>小时前</span></p>
		<span><?php echo substr($val['ticket_name'],0,42).'...';?></span>
		<hr  noshade="noshade" style="border:1px dotted;margin-top:5px;"/>
		<?php echo $key+1!=$count ? '<br/>' : '';?>
	    <?php endforeach;?>
		<?php else:?>
		<span>今日还未有订单哦,亲您可以成为今日第一哦...</span>
		<?php endif;?>
	</div>
	<div id="demo2"></div>
    </div>
    </div>

<?php if(count($new_order)>4):?>
<script language="javascript" type="text/javascript">
<!--
var demo = document.getElementById("demo");
var demo1 = document.getElementById("demo1");
var demo2 = document.getElementById("demo2");
var speed=200;    //滚动速度值，值越大速度越慢
var nnn=200/demo1.offsetHeight;
for(i=0;i<nnn;i++){demo1.innerHTML+="<br />"+ demo1.innerHTML}
demo2.innerHTML = demo1.innerHTML    //克隆demo2为demo1
function Marquee(){
    if(demo2.offsetTop-demo.scrollTop<=0)    //当滚动至demo1与demo2交界时
        demo.scrollTop-=demo1.offsetHeight    //demo跳到最顶端
    else{
        demo.scrollTop++     //如果是横向的 将 所有的 height top 改成 width left
    }
}
var MyMar = setInterval(Marquee,speed);        //设置定时器
demo.onmouseover = function(){clearInterval(MyMar)}    //鼠标经过时清除定时器达到滚动停止的目的
demo.onmouseout = function(){MyMar = setInterval(Marquee,speed)}    //鼠标移开时重设定时器
-->
</script>
<?php endif;?>