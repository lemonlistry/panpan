<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
$setfile= PT_DIR . PT_TPLDIR . PT_TPL . '/blocklist.php';
include $setfile;

if (isset($_POST["save"])){
    unset($_POST["save"]);
    unset($_POST["inputnum"]);
    $arrnum=0;
    $str='<?php'."\n";
    foreach($_POST as $key => $value){
        if (is_array($_POST[$key])){            
            foreach($_POST[$key] as $akey => $avalue){
                if (is_array($_POST[$key][$akey])){
                    if ($_POST[$key][$akey]['name']!=''){
                        $arrnum++;
                        foreach($_POST[$key][$akey] as $bkey => $bvalue){                        
                            $str.="\$".$key."['".$arrnum."']['".$bkey."']='".$bvalue."';\n";                        
                        }
                    }
                }
                
            }
        }else{
            $str.="\$$key='".valuedo($value)."';\n";
        }
        
    }    
    $str.='?>';
    
	unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/blocklist.tpl.php');
    $pt->writeto('../files/blockset/'.PT_RULE.'/blocklist.php',$str);
    $result=$pt->writeto($setfile,$str);
    if ($result){
        $msg="1|恭喜您，修改成功";
    }else{
        $msg="0|很遗憾，修改失败";
    }
	$url='set_blocklist.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
    
}

$num=count($pt_templets_blocklist);
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
<script language="javascript">
<!--
var startNum = <?php echo $num+1?>;
function MakeUpload()
{
	var upfield = document.getElementById("uploadfield");
	var endNum =  parseInt(document.list_frm.inputnum.value) + startNum;
	for(startNum; startNum<endNum; startNum++){
		upfield.innerHTML += "<table width='100%' cellspacing='0' class='dataTable'><tbody ><tr><th class='paddingT15' width='140px'><label for='time_zone'><input name='pt_templets_blocklist["+startNum+"][name]' type='text' value='' style='width: 80px;'  /></label></th><td class='paddingT15 wordSpacing5' width='120px'><select name='pt_templets_blocklist["+startNum+"][type]' style='width: 100px;'><option value='free' selected='selected'>free-自由列表</option><option value='allclick'>allclick-总点击</option><option value='monthclick'>monthclick-月点击</option><option value='weekclick'>weekclick-周点击</option><option value='allvote'>allvote-总推荐</option><option value='monthvote'>monthvote-月推荐</option><option value='weekvote'>weekvote-周推荐</option><option value='newbook'>newbook-新书榜</option><option value='fontsize'>fontsize-字数榜</option><option value='overbook'>overbook-全本榜</option><option value='goodnum'>goodnum-收藏榜</option></select></td><td class='paddingT15 wordSpacing5' width='120px'><input name='pt_templets_blocklist["+startNum+"][templets]' type='text' value='' style='width: 100px;' /></td><td class='paddingT15 wordSpacing5'><input name='pt_templets_blocklist["+startNum+"][num]' type='text' value='' style='width: 250px;' /></td>  </tr></tbody></table>";
	}
}
function oCopy(obj){
obj.select();
js=obj.createTextRange();
js.execCommand("Copy");
alert("调用代码复制成功,请到合适的位置按 Ctrl+V 粘贴即可 O(∩_∩)O");
}
-->
</script>
</head>
<body>
<div id="currentPosition">
	<p>您当前位置： 小说管理 &raquo; 区块管理</p>
</div>
<form method="post" name="list_frm" id="ListFrm">
    <div id="rightTop">
    	<ul class="subnav">
    		<li><span>区块列表管理</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>该项设置为在页面中显示的区块列表；</li>
            <li>区块模板应位于模板目录的block目录，模板文件后缀必须为html，此处不需要加上模板的后缀；</li>
            <li>区块类别为free则为自由列表，如果为其他的则为系统区块,系统区块类别及名称不可修改；</li>
            <li>区块数据系统区块填写数量，自由列表则填写自己想用的小说书号，用“|”分隔。</li>
            <li>若名称不填写，则自动删除此条记录</li>
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="数据显示区">
            <thead>
        		<tr>        		  
        		  <th style="width: 140px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;列表名称</th>
        		  <th style="width: 120px;">列表类别</th>
                  <th style="width: 120px;">区块模板</th>
        		  <th style="width: 270px;">列表数据</th> 
                  <th>调用代码</th>       		 
        		</tr>
        	</thead>
          <?php for ($i=1;$i<=$num;$i++) {?>  
          <tr>
            <th class="paddingT15">
                <label for="time_zone">
                    <input name="pt_templets_blocklist[<?php echo $i?>][name]" type="text" value="<?php echo $pt_templets_blocklist[$i]['name']?>" style="width: 80px;" <?php if ($i<=10){echo 'readonly="readonly"';}?> />
                </label>
            </th>
            <td class="paddingT15 wordSpacing5">
                <?php 
                    if ($i<=10){
                        echo '<input name="pt_templets_blocklist['.$i.'][type]" type="text" value="'.$pt_templets_blocklist[$i]['type'].'" style="width: 100px;" readonly="readonly" />'."\n";
                    }else{
                        echo '                <select name="pt_templets_blocklist['.$i.'][type]" style="width: 100px;">'."\n";                
                        if ($pt_templets_blocklist[$i]['type']=='free'){
                            echo '<option value="free" selected="selected">free-自由列表</option>'."\n";
                        }else{
                            echo '<option value="free">free-自由列表</option>'."\n"; 
                        }
                        for ($j=1;$j<=10;$j++){
                            if ($pt_templets_blocklist[$i]['type']==$pt_templets_blocklist[$j]['type']){
                                echo '<option value="'.$pt_templets_blocklist[$j]['type'].'" selected="selected">'.$pt_templets_blocklist[$j]['type'].'-'.$pt_templets_blocklist[$j]['name'].'</option>'."\n";
                            }else{
                                echo '<option value="'.$pt_templets_blocklist[$j]['type'].'">'.$pt_templets_blocklist[$j]['type'].'-'.$pt_templets_blocklist[$j]['name'].'</option>'."\n";
                            }
                        }
                        echo '</select>'."\n";    
                    }
                ?>
                
                                
            </td>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_blocklist[<?php echo $i?>][templets]" type="text" value="<?php echo $pt_templets_blocklist[$i]['templets']?>" style="width: 100px;" />                
            </td>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_blocklist[<?php echo $i?>][num]" type="text" value="<?php echo $pt_templets_blocklist[$i]['num']?>" style="width: 250px;" />                
            </td>
            <td class="paddingT15 wordSpacing5">
                <input class="daima" onclick="oCopy(this)" value="{pt.getblocklist.<?php echo $i;?>}" readonly="readonly"/> <b>(点击复制)</b>                
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