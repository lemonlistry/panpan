<?php include 'header.share.php';?>
<div class="content">
目录文件属性检测结果 :  <br />
<?php if($no_writablefile !='') { ?>
<span class="error">
<?php echo $no_writablefile;?>
</span>
	<input type="button" onclick="javascript:history.go(-1);" value="返回上一步: 运行环境检测" class="btn" />
	<input type="button" onclick="window.location.reload()" value="重新检测" class="btn" />
	<input type="button" onclick="if(confirm('安装后网站可能无法正常运行,是否继续?')) $('#install').submit();" value="强制安装" class="btn" title="强制安装" />
<?php
}
else
{
?>
<span class="no_error">

<?php echo $writablefile;?>

</span>
<a href="javascript:history.go(-1);" class="btn">返回上一步 : 运行环境检测</a> 
<a onclick="$('#install').submit();" class="btn">检测通过，下一步</a>
<?php
}
?>
<form id="install" action="install.php" method="get">
<input type="hidden" name="step" value="5" />
 </form>
</div>
</div>
</div>
</body>
</html>