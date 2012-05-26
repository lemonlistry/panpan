<?php
include 'conn.php';
include_once '../data/config.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

if (isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    $msg="0|编辑失败，无法获取链接id";
    $url='ad_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
}
//链接数据库
include '../data/ad/'.$id.'.php';



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
.daima {
	FONT-SIZE: 10px; BACKGROUND: none transparent scroll repeat 0% 0%; OVERFLOW: hidden; WIDTH: 120px; COLOR: blue; BORDER-TOP-STYLE: none; LINE-HEIGHT: 20px; BORDER-BOTTOM: #ccc 1px solid; FONT-FAMILY: Verdana; BORDER-RIGHT-STYLE: none; BORDER-LEFT-STYLE: none; HEIGHT: 18px;text-align:center;
}
</style>
<script type="text/javascript">
function oCopy(obj){
obj.select();
js=obj.createTextRange();
js.execCommand("Copy");
alert("调用代码复制成功,请到合适的位置按 Ctrl+V 粘贴即可 O(∩_∩)O");
}

</script>
</head>
<body>
<div id="currentPosition">
	<p>您当前位置： 系统工具 &raquo; 友情链接</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>广告编辑</span></li>
        <li><a href="ad_add.php">添加广告</a></li>
        <li><a href="ad_list.php">广告列表</a></li>
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">		
        <li>调用代码为<strong>{pt.getad.广告编号}</strong></li>
		<li>若修改完该页面广告位预览没有变化，请点击右上的“刷新页面”按钮强制刷新一下！</li>
	</ul>
</div>
<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <table width="100%" cellspacing="0" class="dataTable" summary="数据显示区">
            <thead>
        		<tr>
				  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        		  <th>广告编号</th>
        		  <th><label for="idAll">广告名称</label></th>
        		  <th>广告大小</th>
        		  <th>广告代码</th>       		  
                  
        		  <th>操作</th>
        		</tr>
        	</thead>
			<tfoot>
        		<tr>
      		        <th colspan="7">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </th>        		  
        		</tr>
        	</tfoot>
            <tbody>
        		<tr class="tatr2">
        		  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				  <td><?php echo $adid?></a></td>
        		  <td><label for="item_2"><?php echo $adname?></label></td>
        		  <td><?php echo $adsize?></a></td>
        		  <td><input class="daima" onclick="oCopy(this)" value="{pt.getad.<?php echo $adid;?>}" readonly="readonly"/> <b>(点击蓝色代码自动复制)</b></td>        		  
                  
        		  <td class="handler">
                    <ul id="handler_icon">
						<li><a class="btn_browse" href="ad_view.php?id=<?php echo $adid?>" title="预览">预览</a></li>
                        <li><a class="btn_edit" href="ad_edit.php?id=<?php echo $adid?>" title="编辑">编辑</a></li>
						<li><a class="btn_delete" href="?do=del&id=<?php echo $adid?>" title="删除">删除</a></li>                        
                    </ul>
                  </td>		
                </tr>
                <tr class="tatr2" height="110">
				  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				  <td>广告预览</td>
				  <td colspan="5">
						<script src="<?php  echo PT_SITEURL.'files/'.PT_ADDIR.$adid.'.js' ;?>" type="text/javascript" language="javascript"></script>
				  </td>
				</tr>
        	</tbody>
        </table>
		<div id="dataFuncs" title="操作区">
            <div class="left paddingT15" id="batchAction">
              <input type="submit" name="save" value="返回列表" class="formbtn batchButton"/>
            </div>            
            <div class="clear"></div>
        </div>    	
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>