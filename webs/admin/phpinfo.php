<?php
error_reporting(0); //抑制所有错误信息
@header("content-Type: text/html; charset=utf-8"); //语言强制
ob_start();
//打开缓冲区,当缓冲区激活时，所有来自PHP程序的非文件头信息均不会发送，而是保存在内部缓冲区。为了输出缓冲区的内容，可以使用ob_end_flush()或flush()输出缓冲区的内容。
    $mysqlReShow = "none";
    $mailReShow = "none";
    $funReShow = "none";
    $opReShow = "none";
    $sysReShow = "none";

    define("YES", "<span class='resYes'>YES</span>");
    define("NO", "<span class='resNo'>NO</span>");
    define("ICON", "<span class='icon'>2</span>&nbsp;");
    $phpSelf = $_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME];
    define("PHPSELF", preg_replace("/(.{0,}?\/+)/", "", $phpSelf));
     
    if ($_GET['act'] == "phpinfo")
    {
        phpinfo();
        exit();
    }
	elseif($_POST['action']=="开始测试")//网速测试，等你来完善。
	{
?>
<script language="javascript" type="text/javascript">
var acd1;
acd1 = new Date();
acd1ok=acd1.getTime();
</script>
<?php
for($i=1;$i<=1000;$i++){
echo "<!--567890#########0#########0#########0#########0#########0#########0#########0#########012345-->";
}
?>
<script language="javascript" type="text/javascript">
var acd2;
acd2 = new Date();
acd2ok=acd2.getTime();
window.location = '?speed=' +(acd2ok-acd1ok)+'#bottom';
</script>
<?php
}
    elseif($_POST['act'] == "CONNECT")
    {
        $mysqlReShow = "show";
        $mysqlRe = "MYSQL连接测试结果：";
        $mysqlRe .= (false !== @mysql_connect($_POST['mysqlHost'], $_POST['mysqlUser'], $_POST['mysqlPassword']))?"MYSQL服务器连接正常, ":
        "MYSQL服务器连接失败, ";
        $mysqlRe .= "数据库 <b>".$_POST['mysqlDb']."</b> ";
        $mysqlRe .= (false != @mysql_select_db($_POST['mysqlDb']))?"连接正常":
        "连接失败";
    }
    elseif($_POST['act'] == "SENDMAIL")
    {
        $mailReShow = "show";
        $mailRe = "MAIL邮件发送测试结果：发送";
        $mailRe .= (false !== @mail($_POST["mailReceiver"], "MAIL SERVER TEST", "This email is sent by iProber.\r\n\r\ndEpoch Studio\r\nhttp://depoch.net"))?"完成":"失败";
    }
    elseif($_POST['act'] == "FUNCTION_CHECK")
    {
        $funReShow = "show";
        $funRe = "函数 <b>".$_POST['funName']."</b> 支持状况检测结果：".isfun($_POST['funName']);
    }
    elseif($_POST['act'] == "CONFIGURATION_CHECK")
    {
        $opReShow = "show";
        $opRe = "配置参数 <b>".$_POST['opName']."</b> 检测结果：".getcon($_POST['opName']);
    }
//alexa查询
else
{
    $url = "http://data.alexa.com/data?cli=10&dat=snba&url=".$_SERVER['HTTP_HOST'];
    $str = file( $url."" );
    $count = count( $str );
    $i = 0;
    for ( ; $i < $count; ++$i )
    {
        $file .= $str[$i];
    }
    $alexa = explode( "\" TEXT=\"", $file );
    $alexa = explode( "\"/>", $alexa[1] );
    $alexa = $alexa[0];
}
// 根据不同系统取得CPU相关信息
switch(PHP_OS) {
	case "Linux":
		$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
		break;
	case "FreeBSD":
		$sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
		break;
	default:
		break;
}
//获取磁盘信息、disk_x_space("y")的参数不能用变量,@在这里不起作用
$diskct=0;
$disk=array();
/*if(@disk_total_space("A:")!=NULL) *为防止影响服务器，不检查软驱 - 阿江说的
{
	$diskct=1;
	$disk["A"]=round((@disk_free_space("A:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("A:")/(1024*1024*1024)),2).'G';
}*/
$diskz=0; //磁盘总容量
$diskk=0; //磁盘剩余容量
if(@disk_total_space("B:")!=NULL)
{
	$diskct++;
	$disk["B"]=round((@disk_free_space("B:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("B:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("B:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("B:")/(1024*1024*1024)),2);
}
if(@disk_total_space("C:")!=NULL)
{
	$diskct++;
	$disk["C"]=round((@disk_free_space("C:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("C:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("C:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("C:")/(1024*1024*1024)),2);
}
if(@disk_total_space("D:")!=NULL)
{
	$diskct++;
	$disk["D"]=round((@disk_free_space("D:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("D:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("D:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("D:")/(1024*1024*1024)),2);
}
if(@disk_total_space("E:")!=NULL)
{
	$diskct++;
	$disk["E"]=round((@disk_free_space("E:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("E:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("E:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("E:")/(1024*1024*1024)),2);
}
if(@disk_total_space("F:")!=NULL)
{
	$diskct++;
	$disk["F"]=round((@disk_free_space("F:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("F:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("F:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("F:")/(1024*1024*1024)),2);
}
if(@disk_total_space("G:")!=NULL)
{
	$diskct++;
	$disk["G"]=round((@disk_free_space("G:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("G:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("G:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("G:")/(1024*1024*1024)),2);
}
if(@disk_total_space("H:")!=NULL)
{
	$diskct++;
	$disk["H"]=round((@disk_free_space("H:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("H:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("H:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("H:")/(1024*1024*1024)),2);
}
if(@disk_total_space("I:")!=NULL)
{
	$diskct++;
	$disk["I"]=round((@disk_free_space("I:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("I:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("I:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("I:")/(1024*1024*1024)),2);
}
if(@disk_total_space("J:")!=NULL)
{
	$diskct++;
	$disk["J"]=round((@disk_free_space("J:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("J:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("J:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("J:")/(1024*1024*1024)),2);
}
if(@disk_total_space("K:")!=NULL)
{
	$diskct++;
	$disk["K"]=round((@disk_free_space("K:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("K:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("K:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("K:")/(1024*1024*1024)),2);
}
if(@disk_total_space("L:")!=NULL)
{
	$diskct++;
	$disk["L"]=round((@disk_free_space("L:")/(1024*1024*1024)),2)."G&nbsp;/&nbsp;".round((@disk_total_space("L:")/(1024*1024*1024)),2).'G';
	$diskk+=round((@disk_free_space("L:")/(1024*1024*1024)),2);
	$diskz+=round((@disk_total_space("L:")/(1024*1024*1024)),2);
}
//性能信息结果刷新
$ts_int = (false == empty($_POST['tsint']))?$_POST['tsint']:test_int();
$ts_float = (false == empty($_POST['tsfloat']))?$_POST['tsfloat']:test_float();
$ts_io = (false == empty($_POST['tsio']))?$_POST['tsio']:test_io();
if(isset($_POST['speed']))
{
	$speed=round(100/($_POST['speed']/1000),2);
}
elseif($_GET['speed']=="0")
{
	$speed=6666.67;
}
elseif(isset($_GET['speed']) and $_GET['speed']>0)
{
	$speed=round(100/($_GET['speed']/1000),2);
}
else
{
	$speed="<font color=\"red\">&nbsp;未探测&nbsp;</font>";
}

//计算页面运行时间函数
function getmicrotime(){ 
    list($usec, $sec) = explode(" ",microtime()); 
    return ((float)$usec + (float)$sec); 
    } 
$pagestartime=getmicrotime();

//X-Prober
$user=(isset($_GET['user']))?DecodeGET($_GET['user']):'';
ini_set('error_reporting', 0);
$PMS = Array();

switch (strtolower(PHP_OS)){ //检测系统类型,非linux系统不支持
	case "linux":	$PMS['os'] = "linux";
	break;
}

class PMSMod{  //构造类
	var $status;
	var $tempname;
	var $output;
	var $ret;
	function Execute($arg){ //构造/proc目录检测函数
		global $PMS;
		$this->status=false;
		$this->tempname='';
		$this->output=Array();
		$this->ret=0;
		switch ($PMS['os']){
			case 'linux':	exec($arg.' 2>&1', $this->output, $this->ret);
			break;
		}		
		$this->status=true;
		return true;
	}
	function Output2Array(){  //构造获取输出函数
		return (array)$this->output;
	}
}
/*========================================================================*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP探针 - Yahei v1.0</title>
<style type="text/css">
<!--
body,div,p,ul,form,h1 { margin:0px; padding:0px; }
body { background:#f2f2f2; }
div,a,input { FONT-FAMILY: "Microsoft YaHei"; font-size: 12px; color:#333333;}
div { margin-left:auto; margin-right:auto; width:760px; }
input { border: 1px solid #414340; background:#F7F7F7; font-family:sans-serif;}
a,#t3 a.arrow,#f1 a.arrow { text-decoration:none; color:#333333; }
a:hover { text-decoration:underline; }
a.arrow { font-family:Webdings, sans-serif; color:#343525; font-size:10px; }
a.arrow:hover { color:#ff0000; text-decoration:none; }
.resYes {font-family:Georgia; font-size: 11px; color: #006600; } 
.resNo { font-family:Georgia; font-size: 11px; color: #3366FF; }
.myButton { font-size:10px; font-weight:bold;  background:#F7F7F7; border:1px solid #4A4C49; color:#99999; }
.bar { border:1px solid #999999; background:#FFFFFF; height:8px; font-size:2px; }
.bar li { background:#CCCCCC; height:8px; font-size:2px; list-style-type:none; }
table { clear:both; background:#CCCCCC; border:0px solid #41433E; margin-bottom:10px; }
td,th { padding:3px; background:#FFFFFF; }
th { background:#F8FCFF; color:#343525; text-align:left; }
th span { font-family:Webdings, sans-serif; font-weight:normal; padding-right:4px; }
th p { float:right; line-height:10px; text-align:right; }
th a { color:#333333; }
h1 { color:#009900; font-size:35px; float:left; }
h1 b { color:#cc3300; font-size:50px; font-family: Webdings, sans-serif; font-weight:normal; }
h1 span { font-size:15px; padding-left:10px; color:#7D795E;  }
#t12 { float:right; text-align:right;}
#t12 a { line-height:18px; color:#7D795E; }
#t3 td{ line-height:30px; height:30px; text-align:center; background:#FBFAF5; border:0px solid #4A4C49; border-right:none; border-bottom:none; }
#t3 th,#t3 th a { font-weight:normal; }
#m4 td {text-align:center;}
.th2 th,.th3 { background:#FFFFFF; text-align:center; color:#333333; font-weight:normal;  }
.th3 { font-weight:bold; text-align:left; }
#footer table { clear:none; }
#footer td { text-align:center; padding:1px 3px; font-size:9px; }
#footer a { font-size:12px; }
#f1 { text-align:right; padding:15px; }
#f2 {float:left; border:1px solid #dddddd; }
#f3 { border: 1px solid #888888; float:right; }
#f3 a { color:#222222; }
#f31 { background:#2359B1; color:#FFFFFF; }
#f32 { background:#dddddd; }
#f33 { background:#dddddd; }
-->
</style>
<script type="text/javascript">
function ShowHide(item1){
	var itemtable=document.getElementById(item1);
	if(itemtable.style.display=='')
		itemtable.style.display='none';
	else
		itemtable.style.display='';
}
</script>
</head>
<body>
<form action="<?php echo PHPSELF."#bottom";?>" method="post">
	<div>
		<input type="hidden" name="pInt" value="<?php echo $ts_int;?>" />
		<input type="hidden" name="pFloat" value="<?php echo $ts_float;?>" />
		<input type="hidden" name="pIo" value="<?php echo $ts_io;?>" />
<!-- =============================================================
页头 
============================================================= -->
		<p id="t12">
		<?php echo $stylevar['header'];?>
		</p>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" id="t3">
			<tr >
				<td><b><a href="#sec1">服务器特征</a></b></td>
				<td><b><a href="#sec2">PHP基本特征</a></b></td>
				<td><b><a href="#sec3">PHP组件支持状况</a></b></td>
				<td><b><a href="#sec4">服务器性能检测</a></b></td>
				<td><b><a href="#sec5">自定义检测</a></b></td>
				<td><b><a href="<?php echo PHPSELF;?>" class="t211">刷新</a></b></td>
				<td><b><a href="#bottom" class="arrow">66</a></b></td>
			</tr>
		</table>
<?php
	$mod=new PMSMod();
	if ($mod->Execute('cat /proc/cpuinfo')){
		$rs=$mod->Output2Array();
		$data=Array();
		reset($rs);
		while (list($key, $val)=each($rs)){
			if (preg_match('/^([^:]+):\s+(.*)/', trim($val), $match)){
				$data[trim(strtolower(str_replace(' ','',$match[1])))][]=$match[2];
			}
		}
		if (!empty($data)){
			$cpu_a ="
<!-- =============================================================
中央处理芯片检测信息
============================================================= -->
<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\"><tr><th colspan=\"5\"><span>8</span>中央处理芯片检测信息</th></tr><tr><th>编号</th><th>类型</th><th>内核</th><th>频率</th><th>二级缓存</th></tr>";
			$cpu_b = $data['vendor_id']?$cpu_a:"";
			echo $cpu_b;
			for ($i=0; $i<count($data['processor']); $i++){
				echo '<tr><td>ID '.($i+1).'</td>';
				echo (isset($data['vendor_id'][$i]))?'<td>'.$data['vendor_id'][$i].'</td>':'';
				echo (isset($data['modelname'][$i]))?'<td>'.$data['modelname'][$i].'</td>':'';
				echo (isset($data['cpumhz'][$i]))?'<td>'.$data['cpumhz'][$i].' MHz</td>':'';
				echo (isset($data['cachesize'][$i]))?'<td>'.$data['cachesize'][$i].'</td></tr>':'';
			}
			$cpu_c = $data['vendor_id']?"</table>":"";
			echo $cpu_c;
		}									
		unset($data);
	}
$cpunum=$sysInfo['cpu']['num'];
$cpumodel=$sysInfo['cpu']['model'];
$cpucache=$sysInfo['cpu']['cache'];
$x_cpu = $sysInfo['cpu']['model'] ? "
<!-- =============================================================
中央处理芯片检测信息
============================================================= -->
<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\"><tr><th colspan=\"5\"><span>8</span>中央处理芯片检测信息</th></tr><tr><th>CPU个数</th><th>内核</th><th>L2缓存</th></tr><tr><td>$cpunum</td><td>$cpumodel</td><td>$cpucache</td></tr></table>":"";
$cpu_cpu =$rs?"":$x_cpu;
echo $cpu_cpu;
if (PHP_OS=="WINNT"){
$cpu1 = $_ENV["NUMBER_OF_PROCESSORS"];
            $cpu2 = $_ENV["PROCESSOR_IDENTIFIER"];
			$cpu3 = $_ENV["PROCESSOR_LEVEL"];
			$cpu4 = $_ENV["PROCESSOR_REVISION"];
			$cpu = $cpu2 ? "
			<!-- =============================================================
中央处理芯片检测信息
============================================================= -->
<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\"><tr><th colspan=\"5\"><span>8</span>中央处理芯片检测信息</th></tr><tr><th>CPU个数</th><th>内核+类型</th><th>运行级别</th><th>版本</th></tr><tr><td>$cpu1</td><td>$cpu2</td><td>$cpu3</td><td>$cpu4</td></tr></table>":"";
			echo $cpu;
}
//以上CPU检测信息结束
?>
<!-- =============================================================
服务器特性 
============================================================= -->
		<table width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr>
				<th colspan="2"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>服务器特性
					<a name="sec1" id="sec1"></a>
				</th>
			</tr>
			<tr>
				<td width="25%">服务器时间</td>
				<td width="75%"><?php echo date("Y年n月j日 H:i:s");?>
					&nbsp;北京时间：
					<?php echo gmdate("Y年n月j日 H:i:s",time()+8*3600);?></td>
			</tr>
			<?php if("show"==$sysReShow){?>
			<tr>
				<td>服务器运行时间</td>
				<td><?php echo $sysInfo['uptime'];?></td>
			</tr>
			<?php }?>			<tr>
				<td>服务器域名/IP地址</td>
				<td><?php echo $_SERVER['SERVER_NAME'];?>
					(
					<?php echo @gethostbyname($_SERVER['SERVER_NAME']);?>
					)&nbsp;&nbsp;你的IP地址是：<?php echo @$_SERVER['REMOTE_ADDR'];?>
					</td>
			</tr>
			<?php
			$alexa1 = $alexa ?
			"<tr>
				<td>网站排名</td>
				<td>$alexa</td>
			</tr>":"";
			echo $alexa1;
			?>
			<tr>
				<td>服务器操作系统</td>
				<td><?php if($sysInfo['win_n'] != ''){echo $sysInfo['win_n'];}else{echo php_uname() ? php_uname() : PHP_OS;} ;?></td>
			</tr>
			<?php
			$os = explode(" ", php_uname());
			$os1= $os[1];
			$os2 = $os1 ? "<tr>
				<td>主机名称</td>
				<td>$os1</td>
			</tr>" : "";
			echo $os2;
			?>
			<?php
			$SERVER_SOFTWAR_1 = $_SERVER['SERVER_SOFTWARE'];
			$SERVER_SOFTWAR = $SERVER_SOFTWAR_1 ? "<tr>
				<td>服务器解译引擎</td>
				<td>$SERVER_SOFTWAR_1</td>
			</tr>" : "";
			echo $SERVER_SOFTWAR;
			?>
			<?php
			$SERVER_PORT_1 = $_SERVER['SERVER_PORT'];
			$SERVER_PORT = $SERVER_PORT_1 ? "<tr>
				<td>Web服务端口</td>
				<td>$SERVER_PORT_1</td>
			</tr>" : "";
			echo $SERVER_PORT;
			?>
			<?php
			$admin_mail = $_SERVER['SERVER_ADMIN'] ? $_SERVER['SERVER_ADMIN'] : get_cfg_var("sendmail_from") ;
			$adminmail= $admin_mail ? "<tr>
				<td>服务器管理员</td>
				<td><a href=\"mailto:".$admin_mail."\">".$admin_mail."</a></td>
			</tr>" : "";
			echo $adminmail;
			?>
			<tr>
				<td>网站根目录</td>
				<td><?php echo $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));?>
				</td>
			</tr>
			<tr>
				<td>本文件路径</td>
				<td><?php echo str_replace('\\','/',__FILE__)?str_replace('\\','/',__FILE__):$_SERVER['SCRIPT_FILENAME'];?></td>
			</tr>
<!-- 如果系统不是WINNT的，不显示以下信息 -->
<?php if (PHP_OS=="WINNT"){?>
			<?php
	        $getenv_SystemRoot = @getenv('SystemRoot');
            $getenv_Path = @getenv('Path');
			$getenv_TEMP = @getenv('TEMP');
			$getenv_PATHEXT = @getenv('PATHEXT');
			$SystemRoot = $getenv_SystemRoot ? "<tr>
				<td>系统目录</td>
				<td>$getenv_SystemRoot
				<a href=\"javascript:ShowHide('sysroot');\" title=\"点击此处查看详细信息\">(详细信息)</a>
				<p id=\"sysroot\" class=\"notice\" style=\"display:none;\">
				<strong>Path：</strong>$getenv_Path
				<br><strong>TEMP：</strong>$getenv_TEMP
				<br><strong>PATHEXT：</strong>$getenv_PATHEXT</p></td>
			</tr>":"";
			echo $SystemRoot;
			?>
	<?php
    
    $a_disk = $diskct?"<tr>
				<td>磁盘信息</td>
				<td>磁盘数：$e_disk":"";
	echo $a_disk;
	$diskum=0;
	if($diskct>0)
	{
		echo $diskct."&nbsp;&nbsp;它们是：&nbsp;";foreach($disk as $key=>$value){echo $key.'盘&nbsp;&nbsp;';
//		$diskum=$diskum+$value;
	}
		}
		else
		{
			echo '';
		} 
//		echo "磁盘容量：".$diskum;
			?>
		<?PHP 
				$b_disk = $diskct?"&nbsp;&nbsp;&nbsp;磁盘总容量：<font color=\"#CC0000\">":"";
			echo $b_disk;
	if(abs($diskz-80)<50)
	{
		echo '80G';
	}
	elseif(abs($diskz-160)<50)
	{
		echo '160G';
	}
	elseif(abs($diskz-250)<50)
	{
		echo '250G';
	}
	elseif(abs($diskz-320)<50)
	{
		echo '320G';
	}
	elseif(abs($diskz-500)<50)
	{
		echo '500G';
	}
	elseif(abs($diskz-640)<50)
	{
		echo '640G';
	}
	elseif(abs($diskz-750)<50)
	{
		echo '750G';
	}
	elseif(abs($diskz-1024)<50)
	{
		echo '1TB';
	}
	elseif(abs($diskz-1024)<50)
	{
		echo '1TB';
	}
	elseif(abs($diskz-1536)<50)
	{
		echo '1.5TB';
	}
	elseif(abs($diskz-2048)<50)
	{
		echo '2TB';
	}
	?><?php
		$d_disk = $diskk.'G';
		$c_disk = $diskct?"</font>&nbsp;&nbsp;&nbsp;剩余空间：<font color=\"#CC0000\">$d_disk</font></td></tr>":"";
		echo $c_disk;
		?>
			<?php 
			$disk_a = $key?"<tr>
				<td>磁盘空间信息</td>
				<td>":"";
			echo $disk_a;
			if($diskct>0){foreach($disk as $key=>$value){echo $key.'盘：'.$value.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';}}else{echo '';}
			$disk_b = $key?"(剩余/总)</td>
			</tr>":"";
			echo $disk_b;
			?>
  <?php
		}
	?>
 <!-- 如果系统不是WINNT的，不显示以上信息 -->
 			<tr>
				<td>目前还有空余空间</td>
				<td><font color='#CC0000'><?php echo round((@disk_free_space(".")/(1024*1024*1024)),2) ? round((@disk_free_space(".")/(1024*1024*1024)),2) : intval(diskfreespace("/") / (1024 * 1024*1024));?></font> GB</td>
			</tr>
			<?php
			$user1 = @get_current_user();
			$current_user= $user1 ? "<tr>
				<td>系统当前用户名</td>
				<td>$user1</td>
			</tr>" : "";
			echo $current_user;
			?>
			<?php if("show"==$sysReShow){?>
			<tr>
				<td>内存使用状况</td>
				<td> 物理内存：共<font color='#CC0000'>
					<?php echo $sysInfo['memTotal'];?></font>
					M，已使用<font color='#CC0000'>
					<?php echo $sysInfo['memUsed'];?></font>
					M，空闲<font color='#CC0000'>
					<?php echo $sysInfo['memFree'];?></font>
					M，使用率
					<?php echo $sysInfo['memPercent'];?>
					%
					<?php echo bar($sysInfo['memPercent']);?>
					不含Cache内存部分的真实内存已使用 <font color='#CC0000'><?php echo round($sysInfo['memTotal']*$sysInfo['memRealPercent']*0.01, 2);?></font> M，真实内存使用率为
					<?php echo $sysInfo['memRealPercent'];?>
					%
					<?php echo bar($sysInfo['memRealPercent']);?>
					SWAP区：共
					<?php echo $sysInfo['swapTotal'];?>
					M，已使用
					<?php echo $sysInfo['swapUsed'];?>
					M，空闲
					<?php echo $sysInfo['swapFree'];?>
					M，使用率
					<?php echo $sysInfo['swapPercent'];?>
					%
					<?php echo bar( $sysInfo['swapPercent'] );?>
				</td>
			</tr>
			<tr>
				<td>系统平均负载</td>
				<td><?php echo $sysInfo['loadAvg'];?></td>
			</tr>
      <tr>
        <td>网络</td>
        <td><table width="100%" cellpadding="0" cellspacing="1" border="0" ><?php
if (false === ($str = @file("/proc/net/dev"))) return false;
for($i=2;$i<count($str);$i++){
        preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $str[$i], $info );
        echo "<tr><td>".$info[1][0].":</td><td>已接收：<font color='#CC0000'>".round($info[2][0]/1024/1024/1024, 2)."</font> GB</td><td>已发送：<font color='#CC0000'>".round($info[10][0]/1024/1024/1024, 2)."</font> GB</td></tr>";
}
?></table></td>
      </tr>
			<?php }?>

		</table>
<!-- ============================================================= 
PHP基本特性 
============================================================== -->
		<table width="100%" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<th colspan="2"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>PHP基本特性
					<a name="sec2" id="sec2"></a>
				</th>
			</tr>
			<tr>
				<td width="49%">PHP运行方式</td>
				<td width="51%"><?php echo strtoupper(php_sapi_name());?></td>
			</tr>
			<tr>
				<td>PHP版本</td>
				<td><?php echo PHP_VERSION;?></td>
			</tr>
			<tr>
				<td>Zend版本</td>
				<td><?php echo zend_version();?></td>
			</tr>
			<tr>
				<td>Mysql版本</td>
				<td><?php if(function_exists("mysql_get_server_info")) {
	$curr_mysql_version = @mysql_get_server_info();
	$m = @mysql_get_client_info();
	$s = @mysql_get_client_info()?"$m&nbsp;<a href=\"javascript:ShowHide('sqlcl');\" title=\"点击此处查看说明\">说明</a>
      <p id=\"sqlcl\" class=\"notice\" style=\"display:none;\">
    此处显示的是客户端的Mysql版本，不要误会是服务器端的,大部分正确的连接版本, 都是连接上数据库后才会显示</p>":"未安装";
	}
	else {
		$s = "<span class='resNo'>NO</span>";
	}
	echo $curr_mysql_version?$curr_mysql_version:"$s";?></td>
			</tr>
			<tr>
				<td>SQLite版本</td>
				<td><?php
				if(function_exists(sqlite_libversion)) {
	$sqlitelibversion = @sqlite_libversion();
	}
	else {
		$sqlitelibversion = "";
	}
	echo $sqlitelibversion?$sqlitelibversion:NO;?></td>
			</tr>
			<tr>
				<td>GD Library版本</td>
				<td><?php
				if(function_exists(gd_info)) {
				@$gdInfo=@gd_info();
	$gdInfo_a = @$gdInfo["GD Version"];
	}
	else {
		$gdInfo_a = "";
	}
	echo $gdInfo_a?$gdInfo_a:NO;?></td>
				</tr>
			<tr>
				<td>运行于安全模式</td>
				<td><?php echo getcon("safe_mode");?></td>
			</tr>
			<tr>
				<td>支持ZEND编译运行</td>
				<td><?php echo (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend_extension_ts")) ?YES:NO;?></td>
			</tr>
			<tr>
				<td>短标记&lt;? ?&gt;支持</td>
				<td><?php echo @get_cfg_var("short_open_tag")?YES:"<span class='resNo'>NO</span>&nbsp;&nbsp;<a href=\"javascript:ShowHide('shortag');\" title=\"点击此处查看说明\">说明</a>
					<p id=\"shortag\" class=\"notice\" style=\"display:none;\">
					不允许使用 PHP 代码开始标志的缩写形式&lt;? ?&gt;。很多PHP程序都使用短标记，如著名的Discuz!。如果你的空间不支持这个的话，要当心放DZ论坛</p>";?>
				</td>
			</tr>
			<tr>
				<td>允许使用URL打开文件&nbsp;allow_url_fopen</td>
				<td><?php echo getcon("allow_url_fopen");?></td>
			</tr>
			<tr>
				<td>允许动态加载链接库&nbsp;enable_dl</td>
				<td><?php echo getcon("enable_dl");?></td>
			</tr>
			<tr>
				<td>COOKIE支持</td>
				<td><?php echo isset($HTTP_COOKIE_VARS)?YES:NO;?></td>
			</tr>
			<tr>
				<td>显示错误信息&nbsp;display_errors</td>
				<td><?php echo getcon("display_errors");?></td>
			</tr>
			<tr>
				<td>自动定义全局变量&nbsp;register_globals</td>
				<td><?php echo getcon("register_globals");?></td>
			</tr>
			<tr>
				<td>程序最多允许使用内存量&nbsp;memory_limit</td>
				<td><?php echo getcon("memory_limit");?></td>
			</tr>
			<tr>
				<td>POST最大字节数&nbsp;post_max_size</td>
				<td><?php echo getcon("post_max_size");?></td>
			</tr>
			<tr>
				<td>允许最大上传文件&nbsp;upload_max_filesize</td>
				<td><?php echo getcon("upload_max_filesize");?></td>
			</tr>
			<tr>
				<td>程序最长运行时间&nbsp;max_execution_time</td>
				<td><?php echo getcon("max_execution_time");?>
					秒</td>
			</tr>
			<tr>
				<td>magic_quotes_gpc</td>
				<td><?php echo (1===get_magic_quotes_gpc())?YES:NO;?></td>
			</tr>
			<tr>
				<td>magic_quotes_runtime</td>
				<td><?php echo (1===get_magic_quotes_runtime())?YES:NO;?></td>
			</tr>
			<tr>
				<td>被禁用的函数&nbsp;disable_functions</td>
				<td><?php echo (""==($disFuns=get_cfg_var("disable_functions")))?"无":str_replace(",","<br />",$disFuns);?></td>
			</tr>
			<tr>
				<td>PHP信息&nbsp;PHPINFO</td>
				<td><?php echo (false!==eregi("phpinfo",$disFuns))?NO:"<a href='$phpSelf?act=phpinfo' target='_blank' class='static'>PHPINFO</a>";?></td>
			</tr>
		</table>
<!-- ============================================================= 
PHP组件支持 
============================================================== -->
		<table width="100%" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<th colspan="4"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>PHP组件支持
					<a name="sec3" id="sec3"></a>
				</th>
			</tr>
			<tr>
				<td width="38%">拼写检查 ASpell Library</td>
				<td width="12%"><?php echo isfun("aspell_check_raw");?></td>
				<td width="38%">高精度数学运算 BCMath</td>
				<td width="12%"><?php echo isfun("bcadd");?></td>
			</tr>
			<tr>
				<td>历法运算 Calendar</td>
				<td><?php echo isfun("cal_days_in_month");?></td>
				<td>DBA数据库</td>
				<td><?php echo isfun("dba_close");?></td>
			</tr>
			<tr>
				<td>dBase数据库</td>
				<td><?php echo isfun("dbase_close");?></td>
				<td>DBM数据库</td>
				<td><?php echo isfun("dbmclose");?></td>
			</tr>
			<tr>
				<td>FDF表单资料格式</td>
				<td><?php echo isfun("fdf_get_ap");?></td>
				<td>FilePro数据库</td>
				<td><?php echo isfun("filepro_fieldcount");?></td>
			</tr>
			<tr>
				<td>Hyperwave数据库</td>
				<td><?php echo isfun("hw_close");?></td>
				<td>SQL Server数据库</td>
				<td><?php echo isfun("mssql_close");?></td>
			</tr>
			<tr>
				<td>IMAP电子邮件系统</td>
				<td><?php echo isfun("imap_close");?></td>
				<td>Informix数据库</td>
				<td><?php echo isfun("ifx_close");?></td>
			</tr>
			<tr>
				<td>LDAP目录协议</td>
				<td><?php echo isfun("ldap_close");?></td>
				<td>MCrypt加密处理</td>
				<td><?php echo isfun("mcrypt_cbc");?></td>
			</tr>
			<tr>
				<td>哈稀计算 MHash</td>
				<td><?php echo isfun("mhash_count");?></td>
				<td>mSQL数据库</td>
				<td><?php echo isfun("msql_close");?></td>
			</tr>
			<tr>
				<td>SyBase数据库</td>
				<td><?php echo isfun("sybase_close");?></td>
				<td>Yellow Page系统</td>
				<td><?php echo isfun("yp_match");?></td>
			</tr>
			<tr>
				<td>Oracle数据库</td>
				<td><?php echo isfun("ora_close");?></td>
				<td>Oracle 8 数据库</td>
				<td><?php echo isfun("OCILogOff");?></td>
			</tr>
			<tr>
				<td>PREL相容语法 PCRE</td>
				<td><?php echo isfun("preg_match");?></td>
				<td>PDF文档支持</td>
				<td><?php echo isfun("pdf_close");?></td>
			</tr>
			<tr>
				<td>Postgre SQL数据库</td>
				<td><?php echo isfun("pg_close");?></td>
				<td>SNMP网络管理协议</td>
				<td><?php echo isfun("snmpget");?></td>
			</tr>
			<tr>
				<td>VMailMgr邮件处理</td>
				<td><?php echo isfun("vm_adduser");?></td>
				<td>WDDX支持</td>
				<td><?php echo isfun("wddx_add_vars");?></td>
			</tr>
			<tr>
				<td>压缩文件支持(Zlib)</td>
				<td><?php echo isfun("gzclose");?></td>
				<td>XML解析</td>
				<td><?php echo isfun("xml_set_object");?></td>
			</tr>
			<tr>
				<td>FTP</td>
				<td><?php echo isfun("ftp_login");?></td>
				<td>ODBC数据库连接</td>
				<td><?php echo isfun("odbc_close");?></td>
			</tr>
			<tr>
				<td>Session支持</td>
				<td><?php echo isfun("session_start");?></td>
				<td>Socket支持</td>
				<td><?php echo isfun("socket_accept");?></td>
			</tr>
			<tr>
				<td>SMTP支持</td>
				<td><?php echo get_cfg_var("SMTP")?YES:NO;?></td>
				<td>SMTP地址</td>
				<td><?php echo get_cfg_var("SMTP")?get_cfg_var("SMTP"):NO;?></td>
			</tr>
		</table>
<!-- ============================================================= 
服务器性能检测 
============================================================== -->
		<table width="100%" cellpadding="0" cellspacing="1" border="0" id="m4">
			<tr>
				<th colspan="4"><p><?php 
$pagendtime=getmicrotime();
$pagetime=round($pagendtime-$pagestartime,5);
?>
						&nbsp;&nbsp;
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>服务器性能检测
					<a name="sec4" id="sec4"></a>
				</th>
			</tr>
			<tr class="th2" >
				<th>检测对象</th>
				<th>整数运算能力测试<br />
					(1+1运算300万次)</th>
				<th>浮点运算能力测试<br />
					(开平方300万次)</th>
				<th>数据I/O能力测试<br />
					(读取10K文件10000次)</th>
			</tr>
			<tr>
				<td>Godaddy Linux主机 (2009/10/09 07:00)</td>
				<td> 0.217秒</td>
				<td> 0.211秒</td>
				<td> 0.093秒</td>
			</tr>
			<tr>
				<td>Lunarpages虚拟主机 (2009/10/09 07:00)</td>
				<td> 0.228秒</td>
				<td> 0.234秒</td>
				<td> 0.100秒</td>
			</tr>
			<tr>
				<td>稳定110MB免费主机 (2009/10/09 07:00)</td>
				<td> 0.242秒</td>
				<td> 0.24秒</td>
				<td> 0.095秒</td>
			</tr>
				<tr>
				<td>000webhost免费主机 (2009/10/09 07:00)</td>
				<td> 0.209秒</td>
				<td> 0.203秒</td>
				<td> 0.099秒</td>
			</tr>
			<tr>
				<td>您正在使用的这台服务器&nbsp;&nbsp;&nbsp;&nbsp;<input name="action" type="submit" class="gbutton" value="重新测试" /></td>
				<td class="center"><?php echo "<font color=\"#006600\"><b>".$ts_int."</b></font>";?><br /></td>
      <td class="center"><?php echo "<font color=\"#006600\"><b>".$ts_float."</b></font>";?><br /></td>
				<td class="center"><?php echo "<font color=\"#006600\"><b>".$ts_io."</b></font>";?><br /></td>
			</tr>
  </table>
 <table width="100%" cellpadding="0" cellspacing="1" border="0" >
<tr>
      <td class="center">网络速度测试：
        <input name="action" type="submit" class="gbutton" value="开始测试" />
        <br />
	(向客户端传送 100k 字节数据)
</td>
      <td colspan="3">
  <table style="margin:0px;border:none" align="center" width="500" border="0" cellspacing="0" cellpadding="0">
    <tr><td height="15" width="32">1M</td>
    <td height="15" width="231"> 2M ADSL</td>
    <td height="15" width="237"> 10M LAN</td>
    </tr>
  </table>
  <table style="margin:0px" align="center" width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td bgcolor="#009900" height="10" width="<?php 
	if(preg_match("/[^\d-., ]/",$speed))
		{
			echo "0";
		}
	else{
			echo 500*$speed/(1024*4);
		} 
		?>"></td>
      <td height="10" width="<?php 
	if(preg_match("/[^\d-., ]/",$speed))
		{
			echo "500";
		}
	else{
			echo 500-500*$speed/(1024*4);
		} 
		?>"><?php echo $speed; ?> kb/s</td>
    </tr>
  </table>
  <?php echo (isset($_GET['speed']))?"向客户端传送100k字节数据使了<font color=\"red\">".$_GET['speed']."</font>毫秒":"<font color=\"red\">&nbsp;未探测&nbsp;</font>" ?></td>
    </tr>
</table>
<!-- ============================================================= 
自定义检测 
============================================================== -->
<?php
    $isMysql = (false !== function_exists("mysql_query"))?"":" disabled";
    $isMail = (false !== function_exists("mail"))?"":" disabled";
?>
		<table width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr>
				<th colspan="4"><p>
						<a href="#top" class="arrow">5</a>
						<br />
						<a href="#bottom" class="arrow">6</a>
					</p>
					<span>8</span>自定义检测
					<a name="sec5" id="sec5"></a>
				</th>
			</tr>
			<tr>
				<th colspan="4" class="th3">MYSQL连接测试</th>
			</tr>
			<tr>
				<td>MYSQL服务器</td>
				<td><input type="text" name="mysqlHost" value="localhost" <?php echo $isMysql;?> /></td>
				<td> MYSQL用户名 </td>
				<td><input type="text" name="mysqlUser" <?php echo $isMysql;?> /></td>
			</tr>
			<tr>
				<td> MYSQL用户密码 </td>
				<td><input type="text" name="mysqlPassword" <?php echo $isMysql;?> /></td>
				<td> MYSQL数据库名称 </td>
				<td><input type="text" name="mysqlDb" />
					&nbsp;<input type="submit" class="myButton" value="CONNECT" <?php echo $isMysql;?>  name="act" /></td>
			</tr>
			<?php if("show"==$mysqlReShow){?>
			<tr>
				<td colspan="4"><?php echo $mysqlRe;?></td>
			</tr>
			<?php
			}?>
			<tr>
				<th colspan="4" class="th3">MAIL邮件发送测试</th>
			</tr>
			<tr>
				<td>收信地址</td>
				<td colspan="3"><input type="text" name="mailReceiver" size="50" <?php echo $isMail;?> />
					&nbsp;<input type="submit" class="myButton" value="SENDMAIL" <?php echo $isMail;?>  name="act" /></td>
			</tr>
			<?php if("show"==$mailReShow){?>
			<tr>
				<td colspan="4"><?php echo $mailRe;?></td>
			</tr>
			<?php
			}?>
			<tr>
				<th colspan="4" class="th3">函数支持状况</th>
			</tr>
			<tr>
				<td>函数名称</td>
				<td colspan="3"><input type="text" name="funName" size="50" />
					&nbsp;<input type="submit" class="myButton" value="FUNCTION_CHECK" name="act" /></td>
				<?php if("show"==$funReShow){?>
			<tr>
				<td colspan="4"><?php echo $funRe;?></td>
			</tr>
			<?php
			}
			?>
			</tr>
			
			<tr>
				<th colspan="4" class="th3">PHP配置参数状况</th>
			</tr>
			<tr>
				<td>参数名称</td>
				<td colspan="3"><input type="text" name="opName" size="40" />
					&nbsp;<input type="submit" class="myButton" value="CONFIGURATION_CHECK" name="act" /></td>
			</tr>
			<?php if("show"==$opReShow){?>
			<tr>
				<td colspan="4"><?php echo $opRe;?></td>
			</tr>
			<?php
			}?>
		</table>
<!-- ============================================================= 
页脚  
============================================================== -->
		<div id="footer" align="right" style="margin:20px 0px 20px 0px;">
			
			<span style="float:left;">Power by: <A HREF="http://www.ptcms.com" target="_blank">PTcms.CoM</A></span>页面执行时间<?php echo $pagetime;?>秒&nbsp;&nbsp;<a name="bottom"></a><a href="#top" class="arrow">55</a>
		</div>
	</div>
</form>
</body>
</html>
<?php
/*=============================================================
    函数库
=============================================================*/
//检测函数支持
    function isfun($funName)
    {
        return (false !== function_exists($funName))?YES:NO;
    }
//检测PHP设置参数
    function getcon($varName)
    {
        switch($res = get_cfg_var($varName))
        {
            case 0:
            return NO;
            break;
            case 1:
            return YES;
            break;
            default:
            return $res;
            break;
        }
         
    }
//整数运算能力测试
    function test_int()
    {
        $timeStart = gettimeofday();
        for($i = 0; $i < 3000000; $i++);
        {
            $t = 1+1;
        }
        $timeEnd = gettimeofday();
        $time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
        $time = round($time, 3)."秒";
        return $time;
    }
//浮点运算能力测试
    function test_float()
    {
        $t = pi();
        $timeStart = gettimeofday();
        for($i = 0; $i < 3000000; $i++);
        {
            sqrt($t);
        }
        $timeEnd = gettimeofday();
        $time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
        $time = round($time, 3)."秒";
        return $time;
    }
//数据IO能力测试
    function test_io()
    {
        $fp = fopen(PHPSELF, "r");
        $timeStart = gettimeofday();
        for($i = 0; $i < 10000; $i++)
        {
            fread($fp, 10240);
            rewind($fp);
        }
        $timeEnd = gettimeofday();
        fclose($fp);
        $time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
        $time = round($time, 3)."秒";
        return($time);
    }
//比例条
    function bar($percent)
    {
    ?>
<ul class="bar">
	<li style="width:<?php echo $percent;?>%">&nbsp;</li>
</ul>
<?php
    }
//linux系统探测
function sys_linux() {
	// CPU
	if (false === ($str = @file("/proc/cpuinfo"))) return false;
	$str = implode("", $str);
	@preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.]+)([\r\n]+)/s", $str, $model);
	@preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
	if (false !== is_array($model[1])) {
		$res['cpu']['num'] = sizeof($model[1]);
		for($i = 0; $i < $res['cpu']['num']; $i++) {
			$res['cpu']['model'][] = $model[1][$i];
			$res['cpu']['cache'][] = $cache[1][$i];
		}
		if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
		if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
	}

	// UPTIME
	if (false === ($str = @file("/proc/uptime"))) return false;
	$str = explode(" ", implode("", $str));
	$str = trim($str[0]);
	$min = $str / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."天";
	if ($hours !== 0) $res['uptime'] .= $hours."小时";
	$res['uptime'] .= $min."分钟";

	// MEMORY
	if (false === ($str = @file("/proc/meminfo"))) return false;
	$str = implode("", $str);
	preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);

	$res['memTotal'] = round($buf[1][0]/1024, 2);
	$res['memFree'] = round($buf[2][0]/1024, 2);
	$res['memCached'] = round($buf[3][0]/1024, 2);
	$res['memUsed'] = ($res['memTotal']-$res['memFree']);
	$res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

	$res['memRealUsed'] = ($res['memTotal'] - $res['memFree'] - $res['memCached']);
	$res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0;

	$res['swapTotal'] = round($buf[4][0]/1024, 2);
	$res['swapFree'] = round($buf[4][0]/1024, 2);
	$res['swapUsed'] = ($res['swapTotal']-$res['swapFree']);
	$res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;

	// LOAD AVG
	if (false === ($str = @file("/proc/loadavg"))) return false;
	$str = explode(" ", implode("", $str));
	$str = array_chunk($str, 4);
	$res['loadAvg'] = implode(" ", $str[0]);

	return $res;
}

//FreeBSD系统探测
function sys_freebsd() {
	//CPU
	if (false === ($res['cpu']['num'] = get_key("hw.ncpu"))) return false;
	$res['cpu']['model'] = get_key("hw.model");

	//LOAD AVG
	if (false === ($res['loadAvg'] = get_key("vm.loadavg"))) return false;

	//SWAP
	if (false === ($res['swapTotal'] = get_key("hw.pagesize"))) return false;

	//UPTIME
	if (false === ($buf = get_key("kern.boottime"))) return false;
	$buf = explode(' ', $buf);
	$sys_ticks = time() - intval($buf[3]);
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."天";
	if ($hours !== 0) $res['uptime'] .= $hours."小时";
	$res['uptime'] .= $min."分钟";

	//MEMORY
	if (false === ($buf = get_key("hw.physmem"))) return false;
	$res['memTotal'] = round($buf/1024/1024, 2);
	$buf = explode("\n", do_command("vmstat", ""));
	$buf = explode(" ", trim($buf[2]));

	$res['memFree'] = round($buf[5]/1024, 2);
	$res['memUsed'] = ($res['memTotal']-$res['memFree']);
	$res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

	$buf = explode("\n", do_command("swapinfo", "-k"));
	$buf = $buf[1];
	preg_match_all("/([0-9]+)\s+([0-9]+)\s+([0-9]+)/", $buf, $bufArr);

	$res['swapUsed'] = round($bufArr[2][0]/1024, 2);
	$res['swapFree'] = round($bufArr[3][0]/1024, 2);
	$res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;

	return $res;
}

//取得参数值 FreeBSD
function get_key($keyName) {
	return do_command('sysctl', "-n $keyName");
}

//确定执行文件位置 FreeBSD
function find_command($commandName) {
	$path = array('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin');
	foreach($path as $p) {
		if (@is_executable("$p/$commandName")) return "$p/$commandName";
	}
	return false;
}

//执行系统命令 FreeBSD
function do_command($commandName, $args) {
	$buffer = "";
	if (false === ($command = find_command($commandName))) return false;
	if ($fp = @popen("$command $args", 'r')) {
		while (!@feof($fp)){
			$buffer .= @fgets($fp, 4096);
		}
		return trim($buffer);
	}
	return false;
}
?>