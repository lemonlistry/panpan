<!DOCTYPE html PUBliC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title><?php echo $title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<meta name="author" content="<?php echo PT_SITENAME?>,<?php echo PT_SITEURL?>"/> 
<meta name="copyright" content="本站小说都是由网友转载于网络，与本站立场无关,若转载小说侵犯了您的权益，请联系"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/basic.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/header.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/book.css" type="text/css" rel="stylesheet"/>

</head>
<body>
<!-- 头部 -->
<div id="header">
	<div id="logo">
		<a href="<?php echo PT_SITEURL?>"></a>
		<p>— 海量小说阅读下载 —</p>
	</div>
	<div class="loginbar">
		<div class="fl">
		<a href="#" onclick="SetHome(this)">+ 设为首页</a>　
		<a href="#" onclick="addfavor('<?php echo PT_SITEURL?>','<?php echo PT_SITENAME?>')">+ 收藏本站</a>
		</div><!-- 右侧链接 结束 --><!-- 登陆框 -->
		<iframe src="<?php echo PT_SITEURL?>login.php" scrolling="no" frameborder="0" width="780" height="24"></iframe>
	</div>
	<div class="nav">
		<div class="banner"><script src="http://www.59book.net/files/friend/topbanner.js" type="text/javascript" language="javascript"></script></div>
		<ul>
<?php
for($i=1;$i<=9;$i++){
?>
<?php
if($i<9){
?>
<li><a  href="<?php echo $pt_templets_nav[$i]['url']?>"><?php echo $pt_templets_nav[$i]['name']?></a> </li>
<?php }else{ ?>
            <li>
                <div class="hot"><img src="http://static.zongheng.com/v2_0/images/hot.gif" alt="VIP充值"/></div>
                <a  href="<?php echo $pt_templets_nav[$i]['url']?>" class="fred fb"><?php echo $pt_templets_nav[$i]['name']?></a> 
            </li>
<?php } ?>
<?php
}
?>
 
		</ul>
	</div>
	<div class="nav2">
        <a href="#" class="vip" title="VIP作品" id="vip_book">VIP作品</a>
<?php
for($i=1;$i<=$sortnum ;$i++){
?>
<a  href="<?php echo $pt_templets_sortnav[$i]['url']?>"><?php echo $pt_templets_sortnav[$i]['name']?></a>
<?php
if(($i<$sortnum)){
?>
<span>┊</span>
<?php } ?>
<?php
}
?>
</div>
	<div class="searchbar">
		<div class="key">关键词：<?php echo baidu(6)?></div>
		<div class="search">
        
		<form action="<?php echo PT_SITEURL?><?php echo PT_FILENAME_SEARCH?>" method="get" target="_blank">
        <input type="text" name="key" onmousedown="this.value='';this.onmousedown=null;" class="text" value="请输入您要搜索的内容"/>
        <select name="type" class="selSearch">
            <option value="bookname" class="selOption">书名</option>
            <option value="author" class="selOption">作者</option>
        </select>
        
        <input type="submit" class="submit search_button fl" value=""/>
		</form>
        <div class="cl"></div>
    </div>
	</div>
	<div id="userinfo">
		<div class="topuser"></div>
	</div>
</div>
<!--第一屏-->
<div class="spline"></div>

<div class="wrap">
	<div class="rankbox">
    	<div id="rankleft">
            <div class="ranknav">
            <h3>排行榜索引</h3>
<?php
for($i=1;$i<=12;$i++){
?>
<a
<?php
if($i==$topid){
?>
class="set"
<?php } ?>
 href="<?php echo $pt_top[$i]['url']?>"><?php echo $pt_top[$i]['name']?></a>
<?php
}
?>
                <a href="#"></a>
                <a href="<?php echo $topoverurl?>">全本排行</a>
            </div>
            <div class="jbbg"></div>
    	</div>
	
    	<div id="rankright">
        	<h3>推荐小说</h3>
        	<ul>
                <?php echo $pt_block_list['1']?>
                <?php echo $pt_block_list['4']?>
                <?php echo $pt_block_list['7']?>
                <?php echo $pt_block_list['8']?>
                <?php echo $pt_block_list['9']?>
                <?php echo $pt_block_list['10']?>
        	</ul>
    	</div>
        <div id="rank">
            <div id="update" class="btable update" style="background:#fff;width:758px;height:2970px">
                <div class="title">
                    <div class="ment">        
                        <dt class="active">
                            <a class="store"><?php echo $topname?>  → 小说列表</a>
                        </dt>      
                    </div>
                </div>
                <div class="con">
                    <ul class="column">
                        <li class="ro1">所属类别 </li>
                        <li class="ro2">目录/书名/章节</li>
                        <li class="ro3">作者 </li>
                        <li class="ro4">更新时间 </li>
                    </ul>
                    <div id="update_Content0">
<?php
for($i=1;$i<=100;$i++){
?>
<ul>
                        <li class="ro1"><a href="<?php echo $pt_list[$i]['sorturl']?>" target="_blank">[<?php echo $pt_list[$i]['sortname']?>]</a> </li>
                        <li class="ro2">
                            <a class="f141" href="<?php echo $pt_list[$i]['readurl']?>" target="_blank">[目录]</a>&nbsp;&nbsp;
                            <a class="f14"  href="<?php echo $pt_list[$i]['bookurl']?>" target="_blank"><?php echo $pt_list[$i]['bookname']?></a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo $pt_list[$i]['chapterurl']?>" target="_blank" title="<?php echo $pt_list[$i]['bookname']?> /<?php echo $pt_list[$i]['chaptername']?>"><?php echo $pt_list[$i]['chaptername']?></a>
                        </li>
                        <li class="ro3"><a href="<?php echo $pt_list[$i]['authorurl']?>" target="_blank"><?php echo $pt_list[$i]['author']?></a></li>
                        <li class="ro4"><?php echo $pt_list[$i]['update']?></li>
                    </ul>
<?php
}
?>
                    </div>
                </div>
            </div>
        </div>
	</div>	
</div>

<div class="spline"></div>

<div id="foot">
    <div class="footlink">
        <a href="#">关于我们</a><span>|</span>
        <a href="#">网站地图</a><span>|</span>
        <a href="#">联系我们</a><span>|</span>
        <a href="#">广告服务</a><span>|</span>
        <a href="#">友情链接</a><span>|</span>
        <a href="#">帮助中心</a><span>|</span>
        <a href="#">免责声明</a>
    </div>
    <div class="f66">
        Copyright &copy; 2011-2012 <a class="f66" href="<?php echo PT_SITEURL?>"><?php echo PT_SHORTURL?></a> All Rights Reserved .版权所有<?php echo PT_SITENAME?>。<br />
        如果版权人认为在本站放置您的作品有损您的利益，请发邮件至<?php echo PT_ZZEMAIL?>，本站确认后将会立即删除。<br />
        本站所收录作品、社区话题、书库评论均属其个人行为，不代表本站立场。<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo PT_BEIAN?></a><br />
        站长：<?php echo PT_ZZNAME?> 联系QQ：<?php echo PT_ZZQQ?> 。Power By <a href="http://www.ptcms.com">PTcms</a> 。Design by <a href="http://www.pakey.net">Pakey</a> 。
		<div id="tongji"><script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
    </div>
</div>
<script src="<?php echo PT_SITEURL?>templets/default/js/header.js" type="text/javascript" language="javascript"></script>

</body>
</html>