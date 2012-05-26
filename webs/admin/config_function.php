<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile= '../data/config.inc.php';
include $setfile;
if (isset($_POST["save"])){
    unset($_POST['save']);
    foreach($_POST as $key => $value){
        $pt_set[strtoupper($key)]=$value;
    }
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="\$pt_set['$key']='$value';\n";
    }
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    $file='../data/config.php';
    $str='<?php'."\n";
    foreach($pt_set as $key => $value){
        $str.="define('$key','$value');\n";
    }
    $str.='?>';
    $result=$pt->writeto($file,$str);
    if ($result){
        $msg="1|恭喜您，修改参数成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }
	$url='config_function.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>控制台 - PT小偷</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<style type="text/css">
td.hover, tr.hover
{
	background-color: #F2F9FD;
}
th.hover, thead td.hover, tfoot td.hover
{
	background-color: ivory;
}
</style>
</head>
<body>
<div id="currentPosition">
	<p>您当前位置： 系统设置 &raquo; 功能设置</p>
</div>
<div id="rightTop">
	<ul class="subnav">
		<li><span>功能开关</span></li>
	</ul>
</div>
<div class="info" >
    <form method="post" >  
        <table class="infoTable" id="rightTop_Content1">
          <tr>
			<th class="paddingT15">是否打开网站:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_open" value="true" <?php if ($pt_set['PT_OPEN']=='true'){echo 'checked="checked"';}?> />打开</label>
                <label><input type="radio" name="pt_open" value="false" <?php if ($pt_set['PT_OPEN']=='false'){echo 'checked="checked"';}?> />关闭</label>
                 <span class="gray">是否对外开放网站，如果选择关闭，请在下面填写关闭原因（支持html）</span>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="time_zone"> 网站关闭理由：</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="pt_closewhy"  style="width:550px;height:45px;" ><?php echo $pt_set['PT_CLOSEWHY'];?></textarea><br /><br />
            </td>
          </tr>
          <tr>
			<th class="paddingT15">书号自定义变更:</th> 
            <td class="paddingT15 wordSpacing5">
                <input name="pt_plusbid" type="text" value="<?php echo $pt_set['PT_PLUSBID']?>"  class="infoTableInput" />
                <span class="gray">书号简单自定义变更，避免千篇一律，只能是正整数！</span>
    		</td>
          </tr>
          <tr>
			<th class="paddingT15">章节号自定义变更:</th> 
            <td class="paddingT15 wordSpacing5">
                <input name="pt_plustid" type="text" value="<?php echo $pt_set['PT_PLUSTID']?>"  class="infoTableInput" />
                <span class="gray">章节号简单自定义变更，避免千篇一律，只能是正整数！</span>
    		</td>
          </tr>
          <tr> 
			<th class="paddingT15">获取内容函数:</th> 
			<td class="paddingT15 wordSpacing5">
                <select name="pt_gettype" style="width: 260px;">
                    <option value="file_get_contents" <?php if ($pt_set['PT_GETTYPE']=='file_get_contents'){echo 'selected="selected"';}?>>file_get_contents函数<?php if(!function_exists("file_get_contents")){echo " 不支持";}?></option>
                    <option value="curl" <?php if ($pt_set['PT_GETTYPE']=='curl'){echo 'selected="selected"';}?>>curl函数<?php if(!function_exists("curl_init")){echo " 不支持";}?></option>
					<option value="fsockopen" <?php if ($pt_set['PT_GETTYPE']=='fsockopen'){echo 'selected="selected"';}?>>fsockopen函数<?php if(!function_exists("fsockopen")){echo " 不支持";}?></option>
                </select>
                <span class="gray">一般国内空间选择file_get_contents，国外空间选择curl。</span>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> 循环获取次数：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_getnum" type="text" value="<?php echo $pt_set['PT_GETNUM']?>"  class="infoTableInput" />
                <span class="gray">若采集不到数据请适当调大此数据！但请不要太大以免程序死循环，默认为1。</span>
    		</td>
          </tr>
		  <tr>
            <th class="paddingT15"><label for="time_zone"> 伪造蜘蛛访问：</label></th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="pt_useragent"  style="width:550px;height:45px;" ><?php echo $pt_set['PT_USERAGENT'];?></textarea><br /><br />
				<span class="gray">开启代理此功能无效</span>
            </td>
          </tr>
          <tr> 
			<th class="paddingT15">是否开启防盗链:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_defend" value="true" <?php if ($pt_set['PT_DEFEND']=='true'){echo 'checked="checked"';}?> />开启防盗链</label>
                <label><input type="radio" name="pt_defend" value="false" <?php if ($pt_set['PT_DEFEND']=='false' or !isset($pt_set['PT_DEFEND'])){echo 'checked="checked"';}?> />关闭防盗链</label>
				<span class="gray">图片显示、章节调用、电子书下载在使用本站地址时有效。</span>
            </td> 
		  </tr>
          <tr>
            <th class="paddingT15"><label for="price_format"> 防盗链允许域名：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_defendurl" type="text" value="<?php echo $pt_set['PT_DEFENDURL']?>"  class="infoTableInput" />
				<span class="gray">允许多个域名请以“|”分隔。</span>
    		</td>
          </tr>
          <tr> 
			<th class="paddingT15">是否开启伪静态:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_reurl" value="true" <?php if ($pt_set['PT_REURL']=='true'){echo 'checked="checked"';}?> />开启伪静态</label>
                <label><input type="radio" name="pt_reurl" value="false" <?php if ($pt_set['PT_REURL']=='false'){echo 'checked="checked"';}?> />关闭伪静态</label>
            </td> 
		  </tr>
          <tr>
			<th class="paddingT15">是否隐藏图片地址:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_imgurl" value="true" <?php if ($pt_set['PT_IMGURL']=='true'){echo 'checked="checked"';}?> />隐藏地址</label>
                <label><input type="radio" name="pt_imgurl" value="false" <?php if ($pt_set['PT_IMGURL']=='false'){echo 'checked="checked"';}?> />真实地址</label>
            </td> 
		  </tr>
		  <tr> 
			<th class="paddingT15">图片内容获取方式:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_imggettype" value="1" <?php if ($pt_set['PT_IMGGETTYPE']=='1' or !isset($pt_set['PT_IMGGETTYPE'])){echo 'checked="checked"';}?> />header转向</label>
                <label><input type="radio" name="pt_imggettype" value="2" <?php if ($pt_set['PT_IMGGETTYPE']=='2'){echo 'checked="checked"';}?> />referer获取</label>
				<label><input type="radio" name="pt_imggettype" value="3" <?php if ($pt_set['PT_IMGGETTYPE']=='3'){echo 'checked="checked"';}?> />readfile获取</label>
				<span class="gray">第一种最省资源，后两种可以破解防盗链。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">封面图片缓存:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_bookimg" value="true" <?php if ($pt_set['PT_CACHE_BOOKIMG']=='true'){echo 'checked="checked"';}?> />开启缓存</label>
                <label><input type="radio" name="pt_cache_bookimg" value="false" <?php if ($pt_set['PT_CACHE_BOOKIMG']=='false'){echo 'checked="checked"';}?> />关闭缓存</label>
                <span class="gray">注意：此功能耗费一定空间。</span>
            </td> 
		  </tr>
		  <tr> 
			<th class="paddingT15">封面图片地址:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_bookimgurl" value="true" <?php if ($pt_set['PT_CACHE_BOOKIMGURL']=='true'){echo 'checked="checked"';}?> />使用本站地址</label>
                <label><input type="radio" name="pt_cache_bookimgurl" value="false" <?php if ($pt_set['PT_CACHE_BOOKIMGURL']=='false'){echo 'checked="checked"';}?> />使用隐藏的图片地址</label>
                <span class="gray">当开启封面图片缓存可以直接显示封面图片在本站的地址。</span>
            </td> 
		  </tr>
          <tr>
			<th class="paddingT15">章节图片缓存:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_chapterimg" value="true" <?php if ($pt_set['PT_CACHE_CHAPTERIMG']=='true'){echo 'checked="checked"';}?> />开启缓存</label>
                <label><input type="radio" name="pt_cache_chapterimg" value="false" <?php if ($pt_set['PT_CACHE_CHAPTERIMG']=='false'){echo 'checked="checked"';}?> />关闭缓存</label>
                <span class="gray">注意：此功能耗费大量空间。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">静态缓存:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_html" value="true" <?php if ($pt_set['PT_CACHE_HTML']=='true'){echo 'checked="checked"';}?> />开启缓存</label>
                <label><input type="radio" name="pt_cache_html" value="false" <?php if ($pt_set['PT_CACHE_HTML']=='false'){echo 'checked="checked"';}?> />关闭缓存</label>
                <span class="gray">以空间来换速度。注意：此功能耗费一定空间。</span>
            </td> 
		  </tr>
           <tr> 
			<th class="paddingT15">首页单独静态:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_index" value="true" <?php if ($pt_set['PT_CACHE_INDEX']=='true'){echo 'checked="checked"';}?> />开启静态</label>
                <label><input type="radio" name="pt_cache_index" value="false" <?php if ($pt_set['PT_CACHE_INDEX']=='false'){echo 'checked="checked"';}?> />不开启</label>
                 <span class="gray">可以在不开启静态的条件下对首页进行静态缓存处理(6分钟自动更新一次)</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">书籍数据缓存:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_data" value="true" <?php if ($pt_set['PT_CACHE_DATA']=='true' or !isset($pt_set['PT_CACHE_DATA'])){echo 'checked="checked"';}?> />强制打开</label>
                <label><input type="radio" name="pt_cache_data" value="false" <?php if ($pt_set['PT_CACHE_DATA']=='false'){echo 'checked="checked"';}?> />关闭缓存</label>
                <span class="gray"><font color=red>强烈推荐开启！！！</font>注意：此功能耗费一定空间。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">搜索结果缓存:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_search" value="true" <?php if ($pt_set['PT_CACHE_SEARCH']=='true' or !isset($pt_set['PT_CACHE_SEARCH'])){echo 'checked="checked"';}?> />开启缓存</label>
                <label><input type="radio" name="pt_cache_search" value="false" <?php if ($pt_set['PT_CACHE_SEARCH']=='false'){echo 'checked="checked"';}?> />关闭缓存</label>
                <span class="gray">适用于WEB与WAP双模式，推荐开启！注意：此功能耗费一定空间。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">章节内容缓存:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_cache_chapter" value="true" <?php if ($pt_set['PT_CACHE_CHAPTER']=='true' or !isset($pt_set['PT_CACHE_CHAPTER'])){echo 'checked="checked"';}?> />开启缓存</label>
                <label><input type="radio" name="pt_cache_chapter" value="false" <?php if ($pt_set['PT_CACHE_CHAPTER']=='false'){echo 'checked="checked"';}?> />关闭缓存</label>
                <span class="gray"><font color=red>空间足够时，强烈推荐开启！！！</font>注意：此功能耗费一定空间。</span>
            </td> 
		  </tr>
          <tr>
			<th class="paddingT15">是否隐藏下载地址:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_downurl" value="true" <?php if ($pt_set['PT_DOWNURL']=='true'){echo 'checked="checked"';}?> />隐藏地址</label>
                <label><input type="radio" name="pt_downurl" value="false" <?php if ($pt_set['PT_DOWNURL']=='false'){echo 'checked="checked"';}?> />真实地址</label>
                <span class="gray">隐藏地址才可验证登录，真实地址更节约资源。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">下载是否需要登录:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_downlogin" value="true" <?php if ($pt_set['PT_DOWNLOGIN']=='true'){echo 'checked="checked"';}?> />验证登录</label>
                <label><input type="radio" name="pt_downlogin" value="false" <?php if ($pt_set['PT_DOWNLOGIN']=='false'){echo 'checked="checked"';}?> />不验证登录</label>
                <span class="gray">开启验证后只有登录会员方可下载，必须开启隐藏下载地址。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">搜索结果唯一显示:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_searchjump" value="true" <?php if ($pt_set['PT_SEARCHJUMP']=='true'){echo 'checked="checked"';}?> />跳转书页</label>
                <label><input type="radio" name="pt_searchjump" value="false" <?php if ($pt_set['PT_SEARCHJUMP']=='false'){echo 'checked="checked"';}?> />显示列表</label>
                <span class="gray">当搜索结果唯一时，可以选择跳转书页或显示列表。</span>
            </td> 
		  </tr>
		  <tr> 
			<th class="paddingT15">章节内容显示方式:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_chaptertype" value="1" <?php if ($pt_set['PT_CHAPTERTYPE']=='1' or !isset($pt_set['PT_CHAPTERTYPE'])){echo 'checked="checked"';}?> />智能判别</label>
                <label><input type="radio" name="pt_chaptertype" value="2" <?php if ($pt_set['PT_CHAPTERTYPE']=='2'){echo 'checked="checked"';}?> />直接显示</label>
				<label><input type="radio" name="pt_chaptertype" value="3" <?php if ($pt_set['PT_CHAPTERTYPE']=='3'){echo 'checked="checked"';}?> />JS调用</label>
				<span class="gray">智能判别只在首次无缓存时使用JS调用，以后直接显示内容，强烈建议选择。</span>
            </td> 
		  </tr>
		  <tr> 
			<th class="paddingT15">章节内容JS地址:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_chapterjsurl" value="true" <?php if ($pt_set['PT_CHAPTERJSURL']=='true'){echo 'checked="checked"';}?> />静态地址</label>
                <label><input type="radio" name="pt_chapterjsurl" value="false" <?php if ($pt_set['PT_CHAPTERJSURL']=='false' or !isset($pt_set['PT_CHAPTERJSURL'])){echo 'checked="checked"';}?> />动态地址</label>
                <span class="gray">静态地址占用资源少，但是不能在后台中设置防盗链。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">章节内容替换:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_chapterreplace" value="true" <?php if ($pt_set['PT_CHAPTERREPLACE']=='true'){echo 'checked="checked"';}?> />开启替换</label>
                <label><input type="radio" name="pt_chapterreplace" value="false" <?php if ($pt_set['PT_CHAPTERREPLACE']=='false'){echo 'checked="checked"';}?> />关闭替换</label>
                <span class="gray">章节内容替换具体请在“<a href="config_chapterreplace.php" style="color:fuchsia;text-decoration:none;">章节内容替换</a>”当中设置。注意: 本功能会加重服务器负担。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">是否开启水印:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_markpower" value="true" <?php if ($pt_set['PT_MARKPOWER']=='true'){echo 'checked="checked"';}?> />开启水印</label>
                <label><input type="radio" name="pt_markpower" value="false" <?php if ($pt_set['PT_MARKPOWER']=='false'){echo 'checked="checked"';}?> />关闭水印</label>
                <span class="gray">若开启水印，请到菜单“<a href="config_mark.php" style="color:fuchsia;text-decoration:none;">水印设置</a>”进行详细参数设置。</span>
            </td> 
		  </tr>
          <tr>
			<th class="paddingT15">是否开启混淆字:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_randstrpower" value="true" <?php if ($pt_set['PT_RANDSTRPOWER']=='true'){echo 'checked="checked"';}?> />开启混淆字</label>
                <label><input type="radio" name="pt_randstrpower" value="false" <?php if ($pt_set['PT_RANDSTRPOWER']=='false'){echo 'checked="checked"';}?> />关闭混淆字</label>
                <span class="gray">若开启水印，请到菜单“<a href="config_randstr.php" style="color:fuchsia;text-decoration:none;">混淆字设置</a>”进行详细参数设置。</span>
            </td> 
		  </tr>
		  <tr>
			<th class="paddingT15">Gzip压缩传输:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_gzip_power" value="true" <?php if ($pt_set['PT_GZIP_POWER']=='true'){echo 'checked="checked"';}?> />开启功能</label>
                <label><input type="radio" name="pt_gzip_power" value="false" <?php if ($pt_set['PT_GZIP_POWER']=='false'){echo 'checked="checked"';}?> />关闭功能</label>
                <span class="gray">启用GZIP将极大的加快网站访问速度，不过此功能会造成服务器一定负担。<br /><font color=red>如果服务器已经开启GZIP功能，则这里不需要重复开启！如果开启后打开页面空白，请关闭此功能！</font></span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">Gzip压缩级别:</th> 
			<td class="paddingT15 wordSpacing5">
                <input name="pt_gzip_value" type="text" value="<?php echo $pt_set['PT_GZIP_VALUE']?>"  class="infoTableInput" />
                <span class="gray">请填写1-9之间的数字，数字越大，压缩级别越高。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">空链接文字:</th> 
			<td class="paddingT15 wordSpacing5">
                <input name="pt_link_defaulttext" type="text" value="<?php echo $pt_set['PT_LINK_DEFAULTTEXT']?>"  class="infoTableInput" />
                <span class="gray">当没有足够数量的友情链接的时候显示的文字。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">禁书屏蔽:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_banbook" value="true" <?php if ($pt_set['PT_BANBOOK']=='true'){echo 'checked="checked"';}?> />开启屏蔽</label>
                <label><input type="radio" name="pt_banbook" value="false" <?php if ($pt_set['PT_BANBOOK']=='false'){echo 'checked="checked"';}?> />关闭屏蔽</label>
                <span class="gray">禁书名单具体请在“<a href="config_banbook.php" style="color:fuchsia;text-decoration:none;">图书屏蔽管理</a>”当中设置。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">禁书屏蔽提示:</th> 
			<td class="paddingT15 wordSpacing5">
                <input name="pt_banbookinfo" type="text" value="<?php echo $pt_set['PT_BANBOOKINFO']?>"  class="infoTableInput" />
                <span class="gray">当书被屏蔽的时候显示的文字。</span>
            </td> 
		  </tr>
          <tr> 
			<th class="paddingT15">蜘蛛来访记录:</th> 
			<td class="paddingT15 wordSpacing5">
                <label><input type="radio" name="pt_bot_power" value="true" <?php if ($pt_set['PT_BOT_POWER']=='true'){echo 'checked="checked"';}?> />记录访问</label>
                <label><input type="radio" name="pt_bot_power" value="false" <?php if ($pt_set['PT_BOT_POWER']=='false'){echo 'checked="checked"';}?> />不记录</label>
                 <span class="gray">注意: 本功能会加重服务器负担</span>
            </td> 
		  </tr>
        </table>
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="save" value="提交" />
                <input class="formbtn" type="reset" name="reset" value="重置" />
            </td>
          </tr>
        </table>
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>