<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
$setfile= PT_DIR . PT_RULESDIR. PT_RULE .'/rules.sort.php';;
include $setfile;
if (isset($_POST["save"])){
    unset($_POST["save"]);
    unset($_POST["inputnum"]);
    $arrnum=0;
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){
            foreach($_POST[$key] as $akey => $avalue){
                if ($_POST[$key][$akey]['name']!=''){
                    $arrnum++;
                    $str.="\$".$key."['".$arrnum."']['name']='".$_POST[$key][$akey]['name']."';\n";
                    $str.="\$".$key."['".$arrnum."']['id']='".$_POST[$key][$akey]['id']."';\n";
                }
            }
        }else{
            $str.="\$$key='".valuedo($value)."';\n";
        }
    }    
    $str.='?>';
    $result=$pt->writeto($setfile,$str);
    if ($result){
        $msg="1|恭喜您，修改成功";
    }else{
        $msg="0|很遗憾，修改失败";
    }
	unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/nav.tpl.php');
	$url='set_sort.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}
$num=count($pt_templets_sortnav);

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
<script language="javascript">
<!--
var startNum = <?php echo $num+1?>;
function MakeUpload()
{
	var upfield = document.getElementById("uploadfield");
	var endNum =  parseInt(document.list_frm.inputnum.value) + startNum;
	for(startNum; startNum<endNum; startNum++){
		upfield.innerHTML += "<table width='100%' cellspacing='0' class='dataTable'><tbody ><tr><th class='paddingT15' width='200px'>                <label for='time_zone'>                    <input name='pt_templets_sortnav["+startNum+"][name]' type='text' value='' style='width: 200px;' />                </label>            </th>            <td class='paddingT15 wordSpacing5' width='400px'>                <input name='pt_templets_sortnav["+startNum+"][id]' type='text' value='' style='width: 400px;' />                           </td>            </tr></tbody></table>";
	}
}
-->
</script>
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
	<p>您当前位置： 小说管理 &raquo; </p>
</div>
<form method="post" name="list_frm" id="ListFrm">
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>频道栏目设置</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>该项设置为在模板中显示的栏目分类，分类数据与规则有关</li>
            <li>若使用栏目分类，则只写出分类id即可，动态地址和静态地址由程序自动生成</li>
            <li>若使用排行榜或者其他数据，则分类id保持为空，动态地址和静态地址均需要手动填写</li>
            <li>若名称不填写，则自动删除此条记录</li>
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="数据显示区">
            <thead>
        		<tr>        		  
        		  <th style="width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;栏目名称</th>
        		  <th style="width: 400px;">分类id</th>
        		</tr>
        	</thead>
          <?php for ($i=1;$i<=$num;$i++) {?>  
          <tr>
            <th class="paddingT15">
                <label for="time_zone">
                    <input name="pt_templets_sortnav[<?php echo $i?>][name]" type="text" value="<?php echo $pt_templets_sortnav[$i]['name']?>" style="width: 200px;" />
                </label>
            </th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_sortnav[<?php echo $i?>][id]" type="text" value="<?php echo $pt_templets_sortnav[$i]['id']?>" style="width: 400px;" />                
            </td>
          </tr>
          <?php } ?>    
        </table>
        <div id='uploadfield'></div>
    </div>
    <div class="info" >        
        <table class="infoTable">
          <tr>
            <th></th>
            <td class="ptb20">
                <input name="inputnum" type="text" id="inputnum" size="15" value="1" />
                <input name='kkkup' type='button' class="formbtn" value='增加条目' onclick="MakeUpload();" />            
                <input class="formbtn" type="submit" name="save" value="提交" />
                <input class="formbtn" type="reset" name="reset" value="重置" />
            </td>
          </tr>
        </table>
    </div>
</form>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>