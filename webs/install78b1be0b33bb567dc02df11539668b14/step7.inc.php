<?php include 'header.share.php';?>
<div id="installmessage" style="height:50px; overflow:auto; line-height:50px; font-size:28px; font-weight:bold;  padding-left:215px;" class="content">安装成功</div>
     <div class="installmessage_img"></div>
     <div class="suc">
     <p style="color: red;font-weight: bold;">为了安全考虑，我们已经将install目录重命名为<?php echo $newname;?><br /><br /></p>
     <p>网站前台 : <a href="<?php echo $siteurl;?>" target="_blank"><?php echo $siteurl;?></a></p>
	 <p>网站后台 : <a href="<?php echo $siteurl;?>admin/" target="_blank"><?php echo $siteurl;?>admin/</a></p>

	</div>

</div>
</body>
</html>
