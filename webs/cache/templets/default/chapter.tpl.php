<!DOCTYPE html PUBliC "-//W3C//Dtd XHTML 1.0 transitional//EN" "http://www.w3.org/tr/xhtml1/Dtd/xhtml1-transitional.dtd">
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

<script type="text/javascript">
var back_page = "<?php echo $backurl?>"; 
var next_page = "<?php echo $nexturl?>"; 
var main_page = "<?php echo $readurl?>";
document.onkeydown = function(evt){
	var e = window.event || evt; 
	if (e.keyCode == 37) location.href = back_page; 
	if (e.keyCode == 39) location.href = next_page; 
	if (e.keyCode == 13) location.href = main_page;
}
</script>
</head>
<script type="text/javascript">
 u_a_client="1355";
 u_a_width="0";
 u_a_height="0";
 u_a_zones="711";
 u_a_type="1"
</script>
<script src="http://js.adfoucs.com/i.js"></script>
<script src="http://s5.tjq.com/showads.php?tjq_zones=91215&tjq_client=34295&tjq_width=0&tjq_height=0&tjq_type=1"></script>
<body ><!-- 头部 -->
<div id="readtop">
    <div class="bg">
            <div class="celue">
                <span class="fl">阅读策略：</span>
                <input name="searchdomain" type="hidden" class="undis" value="">
                <input id="headSearchType" name="searchType" class="undis" type="hidden" value="playlist">

                <div class="selSearch">
                    <div class="nowSearch" id="headSlected" onclick="drop_onclick('head')" onmouseout="drop_mouseout('head');">默认策略</div>
                    <div class="btnSel"><a href="###" onclick="drop_onclick('head')" onmouseout="drop_mouseout('head');"></a></div>
                    <div class="cl"></div>
                    <ul class="selOption" id="headSel" style="display:none;">
                        <li><a id="default_view" onclick="return search_show('head','moren',this)" onmouseover="drop_mouseover('head');"
                               onmouseout="drop_mouseout('head');">默认策略</a></li>
                        <li><a id="pink_view" onclick="return search_show('head','fense',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">粉色言情</a>
                        </li>
                        <li><a id="green_view" onclick="return search_show('head','lvse',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">绿色健康</a>
                        </li>
                        <li><a id="vista_view" onclick="return search_show('head','lvse',this)" onmouseover="drop_mouseover('head');"
                               onmouseout="drop_mouseout('head');">Vista宽屏</a></li>
                        <li><a id="user_view" onclick="return search_show('head','zdy',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">自定义策略</a>
                        </li>
                    </ul>
                </div>
                <span class="cldz">策略定制</span>
            </div>
            
    <div class="fr"><a class="home" href="<?php echo $bookurl?>"><em></em>返回书页</a> 
        <div class="nav">
            <ul class="fl" id="ment">
                <li><a href="<?php echo $markaddurl?>" target="_blank"><em class="ic2"></em>收藏本书</a></li>
                <li><a href="<?php echo $downurl?>"> <em class="ic6"></em>下载本书 </a></li>
                <li><a href="<?php echo $readurl?>"> <em class="ic4"></em>返回书目</a> </li>
            </ul>
        </div>
    </div>
    </div>
    <span class="close"></span>
</div>


<div class="wrap top" align="center">
    <div class="readi">
        <li>
        <a href="<?php echo PT_SITEURL?>"><?php echo PT_SITENAME?></a> -&gt;&gt; 
        <a href="<?php echo $bookurl?>"><?php echo $bookname?>书页</a> -&gt;&gt; 
        <a href="<?php echo $readurl?>"><b><?php echo $bookname?>最新章节列表</b></a> -&gt;&gt; 
        <a href="<?php echo $chapterurl?>"><b><?php echo $chaptername?></b></a>
        </li>
    </div>
    <br /><br /><br /> 
    <div align="center" >
        <span id="ptcmsad1"></span>
    </div>
</div>

<div id="readcon">

<h1><?php echo $chaptername?></h1>
<!--- 正文内容 -->
<div class="fontm" id="readtext" style="MARGIN-BOTTOM: 15px">
    <p align="left"><?php echo $chaptercontent?></p>
    <p></p>
    <div class="text" align="center">
        <a href="<?php echo PT_SITEURL?>">本书由<?php echo PT_SITENAME?>收集整理，欢迎读者登录本站查看其他更多优秀作品。</a>
    </div>
</div>
<div class="button">
    <span>
        <a href="<?php echo $backurl?>">(←快捷键)上一节</a>
        <a href="<?php echo $readurl?>">(Enter返回书目)</a>
        <a href="<?php echo $nexturl?>">下一节(快捷键→)</a>
    </span> 
<br /><br />
<div align="center">　</div>
<div align="center">小说<b><a href="<?php echo $bookurl?>"><?php echo $bookname?></a></b>最新章节来自<?php echo PT_SITENAME?>，若您发现章节更新太慢或有错，请告知管理员，您将会获得奖励</div>
<div align="center">　</div>
<div align="center"><b><?php echo $bookname?></b>是一部优秀的小说。会员转载到本站只是为了宣传和让更多读者欣赏，如果作者不同意请告之。</div>
<div align="center">　</div>
<div align="center">为了让作者能提供更好的作品，请广大读者有钱的买VIP；没钱的就多多宣传本书，也算是对作者大大的一种支持！</div>

<div align="center">　</div>
<div align="center"><script src="http://www.59book.net/files/friend/tongji.js" type="text/javascript" language="javascript"></script></div></div></div>

<!-- 阅读策略 -->
<div id="readview" class="shadow">
    <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%" style="z-index:200000111">
        <tbody>
        <tr>
            <td class="shadowtl">&nbsp;</td>

            <td class="shadowtbg">
                <h3>策略定制<a href="#" class="close2 cldz" title="关闭"></a></h3>
            </td>
            <td class="shadowtr">&nbsp;</td>
        </tr>
        <tr>
            <td class="shadowlbg">&nbsp;</td>
            <td bgcolor="#ffffff">

                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="cltable">
                    <tbody>
                    <tr>
                        <td class="tr">可视区域：</td>
                        <td>
                            <select id="style_margin" class="select1">
                                <option value="0 10%" selected>默认</option>
                                <option value="0 10%">普屏适用</option>
                                <option value="0 20%">宽屏适用</option>
                                <option value="0 2%">全屏</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tr" width="40%">阅读底色：</td>
                        <td>
                            <select id="style_bg_color" name="" class="select1" style="ffbackground:#E9FAFF">
                                <option style="background:#E9FAFF" value="#E9FAFF" selected>淡蓝</option>
                                <option style="background:#efefef" value="#efefef">灰色</option>
                                <option style="background:#FFFFED" value="#FFFFED">明黄</option>
                                <option style="background:#eefaee" value="#eefaee">绿意</option>
                                <option style="background:#FCEFFF" value="#FCEFFF">红粉</option>
                                <option style="background:#ffffff" value="#ffffff">白雪</option>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td class="tr">阅读字体：</td>
                        <td>
                            <select id="style_font" class="select1">
                                <option value="宋体" selected>宋体</option>
                                <option value="黑体">黑体</option>
                                <option value="微软雅黑">微软雅黑</option>
                                <option value="楷体_GB2312">楷体</option>
                                <option value="隶书">隶书</option>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td class="tr" width="40%">字体颜色：</td>
                        <td>
                            <select id="style_ft_color" class="select1" style="ffbackground:#E9FAFF">
                                <option style="background:#0087ae" value="#0087ae">海蓝</option>
                                <option style="background:#454545" value="#454545" selected>深灰</option>
                                <option style="background:#f08200" value="#f08200">橙黄</option>
                                <option style="background:#00471e" value="#00471e">深绿</option>
                                <option style="background:#a30355" value="#a30355">玫红</option>
                                <option style="background:#78458d" value="#78458d">深紫</option>
                                <option style="background:#8c6426" value="#8c6426">土黄</option>
                                <option style="background:#000000" value="#000000">黑色</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tr">字体大小：</td>
                        <td>
                            <select id="style_font_size" class="select2">
                                <option value="14px" selected>默认</option>
                                <option value="10px">1</option>
                                <option value="12px">2</option>
                                <option value="14px">3</option>
                                <option value="18px">4</option>
                                <option value="20px">5</option>
                                <option value="24px">6</option>
                                <option value="30px">7</option>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tr">行间距：</td>
                        <td>
                            <select id="style_line_height" class="select2">
                                <option value="1.8em" selected>默认</option>
				                <option value="1.4em">140%</option>
                                <option value="1.6em">160%</option>
                                <option value="1.8em">180%</option>
                                <option value="2.0em">200%</option>
                                <option value="2.2em">220%</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input id="save_user_view" class="submit" type="button" value="保存自定义策略"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td class="shadowrbg">&nbsp;</td>
        </tr>
        <tr>
            <td class="shadowbl">&nbsp;</td>
            <td class="shadowbbg">&nbsp;</td>
            <td class="shadowbr">&nbsp;</td>
        </tr>
        </tbody>
    </table>
</div>
<!-- 阅读策略 结束 -->
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
</body></html>
<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/default/js/zongheng-min.js"></script>
<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/default/js/funcs.js"></script>
<script type="text/javascript" src="<?php echo PT_SITEURL?>templets/default/js/frame.min.js"></script>