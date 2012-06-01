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
<link href="<?php echo PT_SITEURL?>templets/default/css/rbasic.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo PT_SITEURL?>templets/default/css/read.css" type="text/css" rel="stylesheet"/>
</head>
<script type="text/javascript">
 u_a_client="1355";
 u_a_width="0";
 u_a_height="0";
 u_a_zones="711";
 u_a_type="1"
</script>
<script src="http://js.adfoucs.com/i.js"></script>
<script src="http://s9.tjq.com/showads.php?tjq_zones=91139&tjq_client=34295&tjq_width=0&tjq_height=0&tjq_type=1"></script>
<body >
<div class="wrap" align="center">
    <div class="readi">
        <li>
            <a href="<?php echo PT_SITEURL?>"><?php echo PT_SITENAME?></a> ->> 
            <a href="<?php echo $bookurl?>"><?php echo $bookname?>书页</a> ->> 
            <a href="<?php echo $readurl?>"><b><?php echo $bookname?>最新章节列表</b></a>
        </li>
    </div>
    <br /><br /><br /> 
    <div align="center" >
        <span id="ptcmsad1"></span>
    </div>
    <br />
    <div class="title"><?php echo $bookname?></div>
    <div class="writer">作者:<a href="<?php echo $authorurl?>"><?php echo $author?></a>&#160;&#160;&#160;&#160;更新时间：<?php echo $update?></div>
    <div class="spline"></div>
    <div class="booktext">
        <div id="ClassTitle"><b><?php echo $bookname?>最新章节</b>/<b><?php echo $bookname?>全集</b>/<b><?php echo $bookname?>电子书下载</b></div>
            <ul>
                <li><p style="TEXT-AliGN: center"><a href="<?php echo $txtdownurl?>" target="_blank"><?php echo $bookname?>ＴＸＴ下载</a></p></li>
                <li><p style="TEXT-AliGN: center"><a href="<?php echo $jardownurl?>" target="_blank"><?php echo $bookname?>ＪＡＲ下载</a></p></li>
                <li><p style="TEXT-AliGN: center"><a href="<?php echo $chmdownurl?>" target="_blank"><?php echo $bookname?>ＣＨＭ下载</a></p></li>
                <li><p style="TEXT-AliGN: center"><a href="<?php echo $umddownurl?>" target="_blank"><?php echo $bookname?>ＵＭＤ下载</a></p></li>
            </ul> 
        <div id="ListEnd"></div>
<?php
for($i=1;$i<=$readlistnum;$i++){
?>
<?php
if(($readlist[$i]['type']=='fenjuan')){
?>
<div id="ClassTitle"><b><?php echo $readlist[$i]['name']?></b></div>
<?php } ?>

<?php
if(($readlist[$i]['type']=='start')){
?>
<ul>
<?php } ?>

<?php
if(($readlist[$i]['type']=='end')){
?>
<?php echo readlistend($linenum,4,'<li></li>')?>
<?php
 $linenum=0; 
?>
</ul><div id="ListEnd"></div>
<?php } ?>

<?php
if(($readlist[$i]['type']=='chapter')){
?>
<?php
 $linenum++ 
?>
<li><a href="<?php echo $readlist[$i]['url']?>"><?php echo $readlist[$i]['name']?></a></li>
<?php } ?>
<?php
}
?>
        <div id="ClassTitle"><b>Tags: <a><?php echo $bookname?></a> <a><?php echo $bookname?>最新章节</a> <a><?php echo $bookname?>电子书下载</a><?php echo $author?></b></div>
            <ul>
                <li><a href="<?php echo $markaddurl?>" target="_blank">加入书架 - 方便下次阅读</a></li>
                <li><a href="#" target="_blank">推荐本书 -   好书大家共享</a></li>
                <li><a href="<?php echo $markurl?>" target="_blank">打开书架 - 我的会员特权</a></li>
                <li><a href="<?php echo $downurl?>" target="_blank">下载本书 - 随时随地看</a></li>  
            </ul>
        <div id="ListEnd"></div>
        <br />
        <div align="center">小说<b><a href="<?php echo $bookurl?>"><?php echo $bookname?></a></b>最新章节来自<?php echo PT_SITENAME?>，若您发现章节更新太慢或有错，请告知管理员，您将会获得奖励</div>
        <br />
        <div align="center"><b><?php echo $bookname?></b>是一部优秀的小说。会员转载到本站只是为了宣传和让更多读者欣赏，如果作者<?php echo $author?>不同意请告之。</div>
        <br />
        <div align="center">为了让<b><?php echo $author?></b>大大能提供更好的作品，请广大读者有钱的买VIP；没钱的就多多宣传本书，也算是对<b><?php echo $author?></b>大大的一种支持！</div>
        <br />
        <div align="center"><script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div>
    </div>
</div>
<span id="span_ad1">
        <table border="0" style="width:770px;height:260px">
            <tbody>
                <tr >  
                    <td style="width:336px;padding:10px 0 10px">
                        <fieldset style="BORDER-RIGHT: #a6ccf9 1px dashed; BORDER-TOP: #a6ccf9 1px dashed; BORDER-LEFT: #a6ccf9 1px dashed; BORDER-BOTTOM: #a6ccf9 1px dashed">
                        <legend style="BACKGROUND-COLOR: #e7f4fe">
                            <font style="font-WEIGHT: normal; font-SIZE: 12px; LINE-HEIGHT: 160%; font-STYLE: normal; font-VARIANT: normal; TEXT-DECORATION: none"color="blue">赞助商广告位①</font>
                        </legend>
                        <script src="http://www.59book.net/files/friend/3left.js" type="text/javascript" language="javascript"></script>
                    </td>
                    <td style="width:336px;padding:10px 0 10px">
                        <fieldset style="BORDER-RIGHT: #a6ccf9 1px dashed; BORDER-TOP: #a6ccf9 1px dashed; BORDER-LEFT: #a6ccf9 1px dashed; BORDER-BOTTOM: #a6ccf9 1px dashed">
                        <legend style="BACKGROUND-COLOR: #e7f4fe">
                            <font style="font-WEIGHT: normal; font-SIZE: 12px; LINE-HEIGHT: 160%; font-STYLE: normal; font-VARIANT: normal; TEXT-DECORATION: none"color="blue">赞助商广告位②</font>
                        </legend>
                        <script src="http://www.59book.net/files/friend/3center.js" type="text/javascript" language="javascript"></script>
                    </td>
                    <td style="width:336px;padding:10px 0 10px">
                        <fieldset style="BORDER-RIGHT: #a6ccf9 1px dashed; BORDER-TOP: #a6ccf9 1px dashed; BORDER-LEFT: #a6ccf9 1px dashed; BORDER-BOTTOM: #a6ccf9 1px dashed">
                        <legend style="BACKGROUND-COLOR: #e7f4fe">
                            <font style="font-WEIGHT: normal; font-SIZE: 12px; LINE-HEIGHT: 160%; font-STYLE: normal; font-VARIANT: normal; TEXT-DECORATION: none"color="blue">赞助商广告位③</font>
                        </legend>
                        <script src="http://www.59book.net/files/friend/3right.js" type="text/javascript" language="javascript"></script>
                    </td>
                </tr>
            </tbody>
        </table>
</span>
<script language="JavaScript">
document.getElementById("ptcmsad1").innerHTML = document.getElementById("span_ad1").innerHTML; document.getElementById("span_ad1").innerHTML='';
</script>
</body>
</html>