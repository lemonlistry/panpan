<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="baidu-site-verification" content="dJKc7ZtdSwrHVR5t" />
    <meta name="author" content="http://fangte.8090goto.com/" />
    <meta name="keywords" content="<?php echo CHtml::encode($this->keyword); ?>" />
    <meta name="description" content="<?php echo CHtml::encode($this->description); ?>" />
    <link rel="stylesheet" type="text/css" href="<?echo Yii::app()->request->baseUrl?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?echo Yii::app()->request->baseUrl?>/css/xiadan.css" />
	<link rel="stylesheet" type="text/css" href="<?echo Yii::app()->request->baseUrl?>/css/common.css" />
</head>
<body>
<script>
function addfavorite()
{
if (document.all)
   {
      window.external.addFavorite('http://fangte.8090goto.com','株洲方特欢乐世界');
   }
   else if (window.sidebar)
   {
      window.sidebar.addPanel('株洲方特欢乐世界', 'http://fangte.8090goto.com', "");
   }
}
function index()
{
var strHref=window.location.href;
this.style.behavior='url(#default#homepage)';
this.setHomePage('http://fangte.8090goto.com');
}

</script>
<div class="top">
	
	<div class="top_main">
    <div class="logo"><a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界"><img src="<?echo Yii::app()->request->baseUrl?>/images/logo.gif" width="
200" height="58" /></a></div>
    	<div class="top_main_1">
        <span class="top_main_1_3">0731-28827739</span>
        <span class="top_main_1_2"><a target=_top href="javascript:void(0)" onclick="addfavorite()">加入收藏</a></span>
         <span class="top_main_1_1"><a  href='javascript:void(0)' onclick="index()">设为首页</a></span>
        </div>
        <div class="top_main_2">
        	<ul>
            	
		<li> <a href="<?php echo $this->createUrl('site/index')?>" target="_self">首页</a>  </li>
		
		<li> <a href="<?php echo $this->createUrl('site/custom')?>" target="_self">简介</a>  </li>
		
		<li> <a href="<?php echo $this->createUrl('product/index')?>" target="_self">游乐设施</a>  </li>
		
		<li> <a href="<?php echo $this->createUrl('product/news')?>" target="_self">新闻</a>  </li>
		
		<li> <a href="<?php echo $this->createUrl('product/ticketlist')?>" target="_self">门票预订</a>  </li>
		
		<li> <a href="<?php echo $this->createUrl('product/message')?>" target="_self">留言中心</a>  </li>
		
		<li> <a href="<?php echo $this->createUrl('site/about')?>" target="_self">联系我们</a>  </li>
		
            </ul>
        </div>
        <div class="top_main_3">
          <!--<img src="img/shangxia.gif" width="550" height="200" border="0" usemap="#Map" />
          <map name="Map" id="Map">
            <area shape="rect" coords="276,434,632,455" href="/order.asp" target="_self" alt="株洲方特欢乐世界门票" />
            <area shape="rect" coords="1,4,89,36" href="/products_category.asp?id=5" target="_blank" alt="周边酒店" />
            <area shape="rect" coords="309,25,395,55" href="/products_view.asp?id=33" target="_blank" alt="水上乐园" />
            <area shape="rect" coords="458,142,546,174" href="/products_category.asp?id=3" target="_blank" alt="欢乐世界" />
          </map>-->
        </div>
    </div>
</div>
    
    <?php echo $content;?>
<div class="foot">

	
<a href="http://fangte.8090goto.com/" target="_blank" title="株洲方特欢乐世界">株洲方特欢乐世界</a>
<!--<a href="http://www.wenquan8090.com/" target="_blank" title="灰汤温泉">灰汤温泉</a>-->
<!--<a href="http://www.7998travels.com" target="_blank" title="沙发客">沙发客</a>-->
<!--<a href="http://www.zjjslgy.com" target="_blank" title="张家界旅游">张家界旅游</a>-->
<a href="http://www.xiaochouyu888.com" target=_blank title='三亚家庭旅馆'>三亚家庭旅馆</a>
<!--<a href="http://www.lysj66.com/" target="_blank" title="旅游世界网">旅游世界网</a>-->
<a href="http://shanghai.liebiao.com/lvyou/" target=_blank title='上海旅游景点'>上海旅游景点</a>
<a href='http://www.0371fangte.com'  target=_blank title='郑州方特欢乐世界'>郑州方特欢乐世界</a>
<a href='http://www.blue-rain.cn' target='_blank' title='三亚湾家庭旅馆'>三亚湾家庭旅馆</a>
</div>
<div class="bqxx">
&copy; Copyright 2010-2012 株洲方特欢乐世界 All rights reserved 版权所有，网站预订系统由8090旅游团购网提供技术支持<br/>
预定电话：0731-28827739 预定手机：13873387887客服经理 QQ：783337189 邮件：783337189@qq.com 地址：湖南省株洲市芦淞区中心广场家润多<br/>
<a href='http://www.miitbeian.gov.cn' target='_blank'>湘ICP备12002401号-1</a> 访问统计：<script src="http://s94.cnzz.com/stat.php?id=4118223&web_id=4118223&show=pic" language="JavaScript"></script>程序开发：<a href="http://www.8090goto.com/">8090旅游团购</a><br/>
</div>
<!-- Baidu Button END -->
<SCRIPT type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></SCRIPT>
<SCRIPT type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/js/kefu.js"></SCRIPT>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/data.js" language="javascript" type="text/javascript"></script>
 <script src="<?php echo Yii::app()->request->baseUrl?>/js/comement.js" language="javascript" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).ready(function () {
            $('.date-pick').datePicker({ clickInput: true });
        });
    </script>
<DIV id=floatTools class=float0831 style="float: left">
  <DIV class=floatL><A style="DISPLAY: none" id=aFloatTools_Show class=btnOpen 
title=查看在线客服 
onclick="javascript:$('#divFloatToolsView').animate({width: 'show', opacity: 'show'}, 'normal',function(){ $('#divFloatToolsView').show();kf_setCookie('RightFloatShown', 0, '', '/', 'www.istudy.com.cn'); });$('#aFloatTools_Show').attr('style','display:none');$('#aFloatTools_Hide').attr('style','display:block');" 
href="javascript:void(0);">展开</A> <A id=aFloatTools_Hide class=btnCtn 
title=关闭在线客服 
onclick="javascript:$('#divFloatToolsView').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#divFloatToolsView').hide();kf_setCookie('RightFloatShown', 1, '', '/', 'www.istudy.com.cn'); });$('#aFloatTools_Show').attr('style','display:block');$('#aFloatTools_Hide').attr('style','display:none');" 
href="javascript:void(0);">收缩</A> </DIV>
  <DIV id=divFloatToolsView class=floatR>
    <DIV class=tp></DIV>
    <DIV class=cn>
      <UL>
        <LI class=top>
          <H3 class=titZx>QQ咨询</H3>
        </LI>
        <LI><SPAN class=icoZx>在线咨询</SPAN> </LI>
        <LI><a target=blank href='tencent://message/?uin=295879762'><img border="0" src='http://wpa.qq.com/pa?p=1:295879762:41' alt="点击这里给我发消息" /></a></LI>
        <LI><a target=blank href='tencent://message/?uin=2205753207'><img border="0" src='http://wpa.qq.com/pa?p=1:2205753207:41' alt="点击这里给我发消息" /></a></LI>
      </UL>
      <UL>
      <br/>
        <SPAN>电话咨询:</SPAN> <br/>0731-28827739<br/><br/>
        <SPAN>温馨提示:</SPAN><br/> 请在出游前一天预订门票
      </UL>
    </DIV>
  </DIV>
</DIV>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=2&amp;pos=left&amp;uid=740091" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
</body>
  
</html>
