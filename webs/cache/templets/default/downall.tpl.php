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
<script language='javascript'>
    function copyToClipBoard(){
        var clipBoardContent=''; 
        var thisurl=window.location;
        clipBoardContent+='这本小说很不错，《<?php echo $bookname?>》，你也来看看吧\r\n地址:';
        clipBoardContent+=window.location;
        window.clipboardData.setData("Text",clipBoardContent);
        alert("你已复制链接及标题,您可以通过QQ、邮件、论坛等方式发送给您的好友!共同分享阅读的快乐！");
    }
</script> 
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
<div class="listmain">
    <div class="main">
        <div class="spline"></div>
        <div class="loca">
            <div>
          		<span class="rhome"><b style="color:#000000">本书地址：</b><?php echo $downurl?> 
           		<a onclick="copyToClipBoard()" style="cursor:pointer">复制</a></span>
                <strong>您的位置：</strong>
                <a href="<?php echo PT_SITEURL?>"><?php echo PT_SITENAME?></a> →
                <a href="<?php echo $sortcurl?>"><?php echo $sortcname?></a> →
          		<a href="<?php echo $sortnurl?>"><?php echo $sortnname?></a> →
                <span><?php echo $bookname?><small style="color:#000000"> ( 书号<?php echo $bookid?> )</small></span>
            </div>
        </div>
        <div class="spline"></div>
<!-- 第一屏 -->
        <div class="wrap">
<!-- 右侧榜单 -->
            <div class="sidearea" style="float:right">
                <div class="sother flside">
                    <div id="bjtbtj">
                        <div class="qbqt">
                            <ul>
                                <?php echo $pt_block_list['12']?>
                            </ul>
                        </div>
                    </div>		
                </div>
                <div class="spline"></div>                    		
                <div class="ph" id="favoritesbook">
                    <div class="title">
                        <h3>新书入库</h3>
                    </div>
                    <div class="con">
                        <ul style="OVERFLOW: hidden; HEIGHT: 239px">
                            <?php echo $pt_block_list['7']?>
                        </ul>
                    </div>
                </div>    
                <div class="spline"></div>
            </div>
              
            <div class="mainarea">
                <div class="bortable">
                    <div class="work">
                        <div class="wright">
                            <h1><?php echo $bookname?>
                                <em><strong>作者：</strong><a href="<?php echo $authorurl?>" title="查看作者<?php echo $author?>的所有作品"><?php echo $author?></a></em>
<?php
if($isover=='1'){
?>
<div id="lzico"></div>
<?php }else{ ?>
<div id="wjico"></div>
<?php } ?>
                            </h1>
                            <div class="winfo">
                                <span><strong>总点击：</strong><?php echo $allclick?></span>
                                <span><strong>总推荐：</strong><?php echo $allvote?></span>
                                <span><strong>总字数：</strong><?php echo $fontsize?></span>
                                <span><strong>更新：</strong><?php echo $update?></span>
                            </div>
                            <div class="sc"><span style="float:right"><a href="#tp"><font color="red">最新十章节</font></a></span><strong>最新章节：</strong><a href="<?php echo $chapterurl?>" title="<?php echo $chaptername?> 更新时间<?php echo $update?>"><?php echo $chaptername?></a></div>		
                            <p><?php echo $bookinfo?></p>     
                      		<div align="center" style="margin-top:10px"><script src="http://www.59book.net/files/friend/bookinfo.js" type="text/javascript" language="javascript"></script></div>
                       	    <div class="wbutton">
                                <a href="<?php echo $readurl?>" target="_blank"><img src="<?php echo PT_SITEURL?>images/btn02.jpg"/></a>
                          		<a href="<?php echo $markaddurl?>" target="_blank"><img src="<?php echo PT_SITEURL?>images/btn03.jpg" /></a>
                          		<a href="<?php echo $voteurl?>" target="_blank"><img src="<?php echo PT_SITEURL?>images/btn04.jpg" /></a>
                           		<a href="<?php echo $downurl?>" target="_blank"><img src="<?php echo PT_SITEURL?>images/btn033.jpg" /></a>
                            </div>
                        </div>
<!-- 作品信息左边 -->
                        <div class="bortable wleft">
                            <img src="<?php echo $bookimg?>" alt="<?php echo $bookname?>" width="210"/>
                            <div class="bortable cl">
                                <div class="plnum"><a  href="<?php echo $bookimg?>" target="_blank" >查看封面原图</a></div>
                            </div>
                            <div class="zztj">
								<h3>电子书高速下载通道： </h3>
                                <div id="box4">               
									<ul>
										<li id="bt_1"><a href="<?php echo $txtdownurl?>" target="_blank">&nbsp;&nbsp;TXT&nbsp;下载</a></li> 
										<li id="bt_1"><a href="<?php echo $chmdownurl?>" target="_blank">&nbsp;&nbsp;CHM&nbsp;下载</a></li> 
										<li class="bt_2"><a href="<?php echo $jardownurl?>" target="_blank">&nbsp;&nbsp;JAR&nbsp;下载</a></li> 		 
										<li class="bt_2"><a href="<?php echo $umddownurl?>" target="_blank">&nbsp;&nbsp;UMD&nbsp;下载</a></li> 		  
									</ul>
                                </div>                        	        
                            </div>
                        </div>
                    </div>
                    <div class="plc" id="tp">   
                        <div class="title" id="tag_info">
                    		<dt class="active" ><a href="<?php echo $downurl?>"><?php echo $bookname?>下载</a></dt>        
                    	</div>
                        <div id="tp_Content0">
                            <div class="authortp">
								<li><a href="<?php echo $txtdownurl?>" target="_blank"><?php echo $bookname?> TXT下载</a> </li>
                                <li><a href="<?php echo $jardownurl?>" target="_blank"><?php echo $bookname?> JAR下载</a> </li>
                                <li><a href="<?php echo $jardownurl?>" target="_blank"><?php echo $bookname?> JAD下载</a> </li>   
                                <li><a href="<?php echo $chmdownurl?>" target="_blank"><?php echo $bookname?> CHM下载</a> </li>
                                <li><a href="<?php echo $umddownurl?>" target="_blank"><?php echo $bookname?> UMD下载</a> </li>        
                            </div>
                        </div>                        
                    </div>
                </div>
				<div class="cl"></div>
			</div>
		</div>
		<div class="spline"></div>
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