<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
$setfile=PT_DIR . 'plus/bot/data/last.txt';
$botlastlist=file($setfile);
if (isset($_POST["del"])){
    foreach ($_POST['id'] as $value){
        $id = $value;
        unset($botlastlist[$id]);        
    }
    $j=0;
    $botstr="";
    for($i=0;$i<count($botlastlist);$i++){
        if (isset($botlastlist[$i])){
            $botstr.=$botlastlist[$i];
        }
    }
    $result=$pt->writeto($setfile,$botstr);
    if ($result or $botstr==""){
        $msg="1|恭喜您，删除成功";
    }else{
        $msg="0|很遗憾，删除失败";
    }
    
	$url='bot_last.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}
if (isset($_GET['do']) and $_GET['do']=="del" and $_GET['id']>=0){
    $id=$_GET['id'];
    unset($botlastlist[$id]);
    $j=0;
    $botstr="";
    for($i=0;$i<count($botlastlist);$i++){
        if (isset($botlastlist[$i])){
            $botstr.=$botlastlist[$i];
        }
    }
    $result=$pt->writeto($setfile,$botstr);
    if ($result){
        $msg="1|恭喜您，删除成功";
    }else{
        $msg="0|很遗憾，删除失败";
    }
    
	$url='bot_last.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
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
	<p>您当前位置： 系统工具 &raquo; 蜘蛛记录管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>最近来访蜘蛛</span></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
        <li>仅列出最近来访的50条蜘蛛记录</li>
	</ul>
</div>

<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <table width="100%" cellspacing="0" class="dataTable" summary="数据显示区">
            <thead>
        		<tr>
        		  <th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="ptCheckAll(this,'id[]');" title="全选/全不选"></th>
        		  <th width="100"><label for="idAll">蜘蛛名称</label></th>
        		  <th width="100">蜘蛛来访时间</th>
        		  <th width="100">蜘蛛来访ip</th>
        		  <th>蜘蛛来访地址</th>
        		  <th width="50">操作</th>
        		</tr>
        	</thead>
            <tbody>
                <?php
                    if (isset($botlastlist)){ 
                    for($i=0;$i<count($botlastlist);$i++){ 
                        $botlast=explode('|||',$botlastlist[$i]);
                ?>
        		<tr class="tatr2">
        		  <td class="firstCell"><input type="checkbox" name="id[]" value="<?php echo $i?>" onclick="pbCheckItem(this,'idAll');" id="item_<?php echo $i?>" title="<?php echo $i?>" /></td>
        		  <td width="100"><?php echo $botlast['1']?></td>
        		  <td width="100"><?php echo $botlast['2']?></td>
        		  <td width="100"><?php echo $botlast['3']?></td>
        		  <td><?php echo $botlast['4']?></td>
        		  <td class="handler" width="50">
                    <ul id="handler_icon">
                        <li><a class="btn_delete" href="?do=del&id=<?php echo $i?>" title="删除">删除</a></li>
                    </ul>
                  </td>		
                </tr>
                <?php 
                    }
                    }else{
                        echo '<tr class="tatr2">
                        <td class="firstCell"></td>
                        <td colspan="6">暂时没有链接数据</td>
                        </tr>';
                    }
                ?>        		
        	</tbody>
        </table>
    	<div id="dataFuncs" title="操作区">
            <div class="left paddingT15" id="batchAction">
              <input type="submit" name="del" value="删除选定" class="formbtn batchButton"/>
            </div>
            
            <div class="clear"></div>
        </div>
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>