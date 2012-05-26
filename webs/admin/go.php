<?php
if(isset($_GET["msg"])){$msg=$_GET["msg"];}else{$msg='';}
if(isset($_GET["url"])){$url=$_GET["url"];}else{$url='';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PT系统消息 - Powered by PT Book</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="css/logerr.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<style>
	html { overflow-x:hidden; }
</style>
</head>
<body>
<h1>PT Book 系统提示消息</h1>
<dl>
	<dt>
		<?php
		$info=explode('|',$msg);
		if ($info['0']) {
			echo '<font color=green><b>'.$info['1'].'<b></font>';
		}else{
			echo '<font color=red><b>'.$info['1'].'</b></font>';
		}
		?>
	</dt>
	<dd>如果您的浏览器 <span style="color:red;" id='t'>3</span> 秒后没有自动跳转</dd>
	<dd><a href="<?php echo $url?>" class="forward">请点击这里转向...</a></dd>
</dl>
<script type="text/javascript">
$().ready(function(){
	function Redirect(){
		window.location = "<?php echo $url?>";
	}
	var handler;
	var seconds = 3;//时间,秒
	function timer() {
		seconds -= 1;
		if(seconds < 1) seconds = 0;
		$('#t').text(seconds+'');
		if (seconds == 0){
			Redirect();
			return true;
		} 
	}
	handler = setInterval(timer,1000);	
});
</script>
<p>Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></p>
</body>
</html>