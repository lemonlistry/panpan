<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname'] == $adminname and $_SESSION['adminpwd'] ==
    $adminpwd) {

} else {
    echo "<script>location.href='login.php';</script>";
    exit();
}

if (isset($_POST["delall"])){
    foreach ($_POST['id'] as $value){           
        removedir(PT_DIR.'data/user/'.$value);
    }
    $msg="1|恭喜您，删除成功";
	$url='user_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}

if (isset($_GET['do']) and $_GET['do']=="del" and $_GET['username']!=''){
    removedir(PT_DIR.'data/user/'.$_GET['username']);
    $msg="1|恭喜您，删除成功";
	$url='user_list.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit;
}

$usernum=0;
$directory=PT_DIR.'data/user';
$mydir = dir($directory);
while ($file = $mydir->read()) {
    if ((is_dir("$directory/$file")) and ($file != ".") and ($file != "..")) {
		$usernamelist[]=$file;
    }
}
$mydir->close();
$usernum=count($usernamelist);

//页面显示数量
if (isset($_GET['pagenum'])){
    $pagenum=$_GET['pagenum'];
}else{
    $pagenum=20;
}
//在第几页
if (isset($_GET['page'])){
    $page=$_GET['page'];   
}else{    
    $page=1;
}
$num=$usernum;
$pagesize=floor($num/$pagenum)+1;
if (($pagesize-1)*$pagenum>=$num){
	$pagesize=$pagesize-1;
}
//列表起止
$pagestart=$page-2;
if ($pagestart<1){
    $pagestart=1;
}
$pageend=$pagestart+4;
if ($pageend>$pagesize){
    $pageend=$pagesize;
    $pagestart=$pageend-4;
    if ($pagestart<1){
        $pagestart=1;
    }
}

//从第几条开始
$pagenumstart=($page-1)*$pagenum;



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
	<p>您当前位置： 系统设置 &raquo; 用户管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>用户列表</span></li>                
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>默认每页显示20条数据</li>
        <li>点击用户名直接编辑用户资料</li>
        <li>点击用户积分直接编辑用户积分</li>        
	</ul>
</div>
<div class="mrightTop"> 
    <div class="fontr"> 
        <form name="search_frm" id="SearchFrm" method="get"> 
            <input type="hidden" name="page" value="<?php echo $page?>" />
             <div>                
			    <select class="querySelect" name="pagenum">
				<option value="5">每页显示数量</option>
				<option value="10" >每页显示10</option>
				<option value="20" >每页显示20</option>
				<option value="30" >每页显示30</option>
				</select>
                <input type="submit" class="formbtn" value="查询" /> 
            </div> 
        </form> 
    </div> 
    <div class="fontr"></div> 
</div> 
<div class="tdare">
    <form name="list_frm" id="ListFrm" action="" method="post">
        <table width="100%" cellspacing="0" class="dataTable" summary="数据显示区">
            <thead>
        		<tr>
        		  <th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="ptCheckAll(this,'id[]');" title="全选/全不选"></th>
        		  <th><label for="idAll">用户名</label></th>
        		  <th>联系QQ</th>
        		  <th>用户积分</th>        		  
                  <th>最后登录时间</th>
        		  <th>操作</th>
        		</tr>
        	</thead>
            <tfoot>
        		<tr>
      		        <th colspan="6">
                        <div class="pageLinks">
                            <div class="pagination2">
                                共有 <?php echo $usernum;?> 位会员，每页 <?php echo $pagenum;?> 位，当前第 <?php echo $page;?> 页 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='?page=1&pagenum=<?php echo $pagenum?>'>首页</a>
                                <?php
                                    for($i=$pagestart;$i<=$pageend;$i++){
                                        if ($i==$page){
                                            echo "<span class='current'>$i</span>\n";
                                        }else{
                                            echo "<a href='?page=$i&pagenum=$pagenum'>$i</a>\n";
                                        }
                                    }
                                ?>
                                <a href='?page=<?php echo $pagesize;?>&pagenum=<?php echo $pagenum?>'>尾页</a>
                            </div>
                        </div>
                    </th>        		  
        		</tr>
        	</tfoot>
            <tbody>
                <?php 
                    if ($pagenum>$num){
						$fornum=$num;
					}else{
						$fornum=$pagenum;
					}
                    if (isset($usernamelist)){
                    for ($i=0;$i<$fornum;$i++){
                        $userfilenum=$i+$pagenumstart;
                        
                        $userfile = PT_DIR . 'data/user/' . $usernamelist[$userfilenum] . '/info.php';
                        if (file_exists($userfile)) {
                            include $userfile;
                            include PT_DIR . 'data/user/' . $usernamelist[$userfilenum] . '/point.php';
                            include PT_DIR . 'data/user/' . $usernamelist[$userfilenum] . '/log.php';
                        }else{
                            continue;
                        } 
                ?>
        		<tr class="tatr2">
        		  <td class="firstCell"><input type="checkbox" name="id[]" value="<?php echo $usernamelist[$userfilenum]?>" onclick="pbCheckItem(this,'idAll');" id="item_2" title="2" /></td>
        		  <td><a href="user_edit.php?username=<?php echo $usernamelist[$userfilenum]?>"><?php echo $usernamelist[$userfilenum]?></a></td>
        		  <td><?php echo $qq?></a></td>
        		  <td><a href="user_point.php?username=<?php echo $usernamelist[$userfilenum]?>"><?php echo $userpoint ?></a></td>        		  
                  <td><?php echo $logtime?></td>
        		  <td class="handler">
                    <ul id="handler_icon">
                        <li><a class="btn_edit" href="user_edit.php?username=<?php echo $usernamelist[$userfilenum]?>" title="编辑">编辑</a></li>
                        <li><a class="btn_delete" href="?do=del&username=<?php echo $usernamelist[$userfilenum]?>" title="删除">删除</a></li>
                    </ul>
                  </td>		
                </tr>
                <?php 
                    }   
                    }else{
                         echo '<tr class="tatr2">
                        <td class="firstCell"></td>
                        <td colspan="6">暂时没有用户数据</td>
                        </tr>';
                    }                 
                ?>        		
        	</tbody>
        </table>
    	<div id="dataFuncs" title="操作区">
            <div class="left paddingT15" id="batchAction">
               <input type="submit" name="delall" value="删除选定" class="formbtn batchButton"/>
            </div>            
            <div class="clear"></div>
        </div>
	</form>
</div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>