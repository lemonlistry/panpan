<!DOCTYPE html PUBliC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title><?php echo $title?></title>
<meta name="baidu-site-verification" content="IF41Qa495NAIpXFK" />
<meta http-equiv="content-type" content="text/html;charset=gb2312" />
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<meta name="author" content="<?php echo PT_SITENAME?>,<?php echo PT_SITEURL?>"/> 
<meta name="copyright" content="本站小说都是由网友转载于网络，与本站立场无关,若转载小说侵犯了您的权益，请联系"/>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/basic.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/header.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/index.css" type="text/css" rel="stylesheet"/>

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
	<div class="sidearea mr8">
		<div class="bang_qt" id="qt">
			<div class="title"></div>
			<div class="bortable">
				<div class="qt">
					<div id="qt_Content0">
                        <ul>                            
                            <?php echo $pt_templets_block['1']?>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
		<div class="spline"></div>		
	</div>
	<div class="mainarea">
		<div class="bntag" id="view1">
			<div class="title">
				<div class="ment">
					<dt class="active"><a>重磅推荐</a> </dt>
				</div>
			</div>
			<div class="con">
				<div id="view1_Content0">
                    <?php echo $pt_templets_block['2']?>
                    <div class="dxline"></div>
                    <?php echo $pt_templets_block['3']?>                                        
                    <div class="daline"></div> 
                    <div>
<?php
for($i=1;$i<=1;$i++){
?>
<span style="font-size: 14px;line-height:25px;"><a href="<?php echo PT_SITEURL?>ann.php?id=<?php echo $ptann[$i]['id']?>" target="_blank" ><b style="color: #fe8a01;"><?php echo $ptann[$i]['annname']?></b></a></span>
<?php
}
?>
<br />
                    <p style="height: 44px;line-height:22px;overflow: hidden;"><?php $id=count($ptann)-1+1;echo $ptann[$id]['anncontent']?></p>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="spline"></div>
<!--第二屏-->
<div class="wrap">
    <div class="sidearea mr8" style="FLOAT: left">			
        <div class="ph">
            <div class="title">
                <h3>新书潜力榜</h3>
            </div>
            <div class="con">
            <ul style="OVERFLOW: hidden; HEIGHT: 359px">
                <?php echo $pt_block_list['7']?>
            </ul>
            </div>
        </div>
        <div class="spline"></div>						
        <div class="ph" id="newbookweek">
            <div class="title">
                <h3>全本阅读榜</h3>
            </div>
            <div class="con">
                <ul style="OVERFLOW: hidden; HEIGHT: 359px"> 
                    <?php echo $pt_block_list['9']?>
                </ul>
            </div>
        </div>
    </div>
    <div class="sidearea" style="FLOAT: right">
        <div class="ph" id="newbookweek">
            <div class="title">
                <h3>月点击榜</h3>
            </div>
            <div class="con">
                <ul style="OVERFLOW: hidden; HEIGHT: 359px">
                    <?php echo $pt_block_list['2']?>
                </ul>
            </div>
        </div>		
        <div class="spline"></div>
        <div class="ph" id="newbookweek">
            <div class="title">
                <h3>月推荐榜</h3>
            </div>
        <div class="con">
            <ul style="OVERFLOW: hidden; HEIGHT: 359px">
                <?php echo $pt_block_list['5']?>
            </ul>
        </div>
        </div>
    </div>
    <!-- 精品推荐 -->
    <div class="midarea mr8">
        <div class="btable">
            <div class="title">
                <h2>精品推荐</h2>
                <em> </em>
            </div>
            <div class="jptj">
                <div class="list fl">
                    <?php echo $pt_templets_block['4']?>
                </div>
                <div class="list fr">
                    <?php echo $pt_templets_block['5']?>
                </div>
                <div class="list fl">
                    <?php echo $pt_templets_block['6']?>
                </div>
                <div class="list fr">
                    <?php echo $pt_templets_block['7']?>
                </div>
                <div class="list fl">
                    <?php echo $pt_templets_block['8']?>
                </div>
                <div class="list fr">
                    <?php echo $pt_templets_block['9']?>
                </div>
            </div>
        </div>
    </div>

</div>        
<!-- 精品推荐 结束 -->
<div class="spline"></div>

<div class="wrap">
    <div id="ubarea">
        <div class="huan"></div>
        <div class="huan" style="TOP: 500px"></div>
        <div class="bortable">
            <div class="bbs">
                <h3>字数排行</h3>
                <ul style="OVERFLOW: hidden; HEIGHT: 360px">
                    <?php echo $pt_block_list['8']?>
                </ul>  
            </div>
        </div>
        <div class="spline"></div>
        <div class="bortable">
            <div class="bbs">
                <h3>收藏排行</h3>
                <ul style="OVERFLOW: hidden; HEIGHT: 360px">
                    <?php echo $pt_block_list['10']?>
                </ul>
            </div>
        </div>
    <div class="spline"></div>
    </div>
    <div id="sgarea">
        <div class="btable update" id="update">
            <div class="title3b">
                <h2>更新列表</h2>
                <div class="ment fr">
                    <dt class="active"><a href="sort.php">最新小说更新</a> </dt>
                </div>
            </div>
            <div class="con">
                <ul class="column">
                    <li class="ro1">类别 </li>
                    <li class="ro2">目录/书名/章节</li>
                    <li class="ro3">作者 </li>
                    <li class="ro4">更新时间 </li>
                </ul>
            <div id="update_Content0">
<?php
for($i=1;$i<=25;$i++){
?>
<ul>
                    	<li class="ro1"><a href="<?php echo $pt_update_list[$i]['sorturl']?>" target="_blank"><?php echo $pt_update_list[$i]['sortname']?></a> </li>
                    	<li class="ro2">
                            <a class="f141" href="<?php echo $pt_update_list[$i]['readurl']?>" target="_blank">[目录]</a>&#160;&#160;
                            <a class="f14"  href="<?php echo $pt_update_list[$i]['bookurl']?>" target="_blank"><?php echo $pt_update_list[$i]['bookname']?></a>&#160;&#160;&#160;
                            <a href="<?php echo $pt_update_list[$i]['chapterurl']?>" target="_blank" title="<?php echo $pt_update_list[$i]['bookname']?> /<?php echo $pt_update_list[$i]['chaptername']?>"><?php echo $pt_update_list[$i]['chaptername']?></a>
                        </li>
                    	<li class="ro3"><a href="<?php echo $pt_update_list[$i]['authorurl']?>" target="_blank"><?php echo $pt_update_list[$i]['author']?></a></li>
                    	<li class="ro4"><?php echo $pt_update_list[$i]['update']?></li>
                     </ul>
<?php
}
?>
                <div class="more"><a  href="<?php echo PT_FILENAME_SORT?>" target="_blank">查看更多作品更新请点击 >></a></div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="spline"></div>
<!-- 友情链接 -->

<div class="wrap" id="link">
    <table  width="100%" border="0" cellpadding="0" cellspacing="0">
      <table>
      <tr>
        <td class="left" valign="top">
            <h2>合作伙伴</h2></td>
            <td class="right">
                <h3>友情链接（欢迎同类网站与本站进行链接交换，联系站长:<?php echo PT_ZZNAME?>&#160;&#160;&#160;Q Q：<?php echo PT_ZZQQ?>）</h3>
                <ul>
<?php
for($i=1;$i<=24;$i++){
?>
<li><a href="<?php echo $flink[$i]['siteurl']?>" target="_blank" title="<?php echo $flink[$i]['sitetitle']?>"><?php echo $flink[$i]['sitename']?></a></li>
<?php
}
?>
                    
                </ul>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<a href="http://www.28k.com">28k小说网</a>
<a href="http://www.aisapk.com/">小说阅读网</a>
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