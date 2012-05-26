<?php include 'header.share.php';?>
	<div class="content">
		<div id="installdiv">
		  <h3>欢迎您使用 PT小说程序</h3>
		  <ul>
			<li>
    			<p><br />本向导将指导您完成PT小说程序的正确安装。</p>
    			<p><br />为了能够顺利完成安装，您需要将您的数据库设置提前准备好。如果您不知道您的数据库设置，请联系您的主机商，并要求他们提供给您相关信息，同时您的服务器必须要有如下配置：<br /><br /></p>
            	<ul>
            		<li><font color="red"><b>为了迎接PT小说程序3.0即将发布，2.X系列现已全面免费！<br>为防止程序被人加上后门，请您到官方网站及授权下载点下载！</b></font></li>
            	</ul>
            	<p><br /><strong>注意:</strong> PT小说程序 目前此版本暂时没有用到Mysql数据库。<br></p>
        	</li>
		  </ul>
		</div>
		<br />
		<input type="button" class="btn" onclick="$('#install').submit();" value="开始安装PT小说程序" title="点击进入下一步" />
	</div>
	<form id="install" action="install.php" method="get">
	<input type="hidden" name="step" value="2" />
	</form>
  </div>
</div>
<script>
alert('为了迎接PT小说程序3.0即将发布，2.X系列现已全面免费！为防止程序被人加上后门，请您到官方网站及授权下载点下载！');
</script>
</body>
</html>
