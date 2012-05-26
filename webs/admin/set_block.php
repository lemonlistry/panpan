<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}
include '../data/config.php';
$setfile= PT_DIR . PT_TPLDIR . PT_TPL . '/block.php';
include $setfile;

if (isset($_POST["save"])){
    unset($_POST["save"]);
    unset($_POST['inputnum']);
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
    
	unlink(PT_DIR.'cache/'.PT_TPLDIR.PT_TPL.'/block.tpl.php');
    $result=$pt->writeto('../files/blockset/'.PT_RULE.'/block.php',$str);
    $result=$pt->writeto($setfile,$str);
    
    if ($result){
        $msg="1|恭喜您，修改成功";
    }else{
        $msg="0|很遗憾，修改失败";
    }
	$url='set_block.php';
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();    
}
$num=count($pt_templets_block);

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
		upfield.innerHTML += "<table width='100%' cellspacing='0' class='dataTable'><tbody ><tr><th class='paddingT15' width='140px'>                <label for='time_zone'>                    <input name='pt_templets_block["+startNum+"][name]' type='text' value='' style='width:80px;' />                </label>            </th>            <td class='paddingT15 wordSpacing5' width='170px'>                <input name='pt_templets_block["+startNum+"][templets]' type='text' value='' style='width: 150px;' />                           </td>            <td class='paddingT15 wordSpacing5'>                <input name='pt_templets_block["+startNum+"][id]' type='text' value='' style='width: 250px;' />                            </td>                      </tr></tbody></table>";
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
    		<li><span>首页区块</span></li>		
    	</ul>
    </div>
    <div class="tipsblock">
    	<ul id="tipslis">
    		<li>该项设置为在首页中显示的区块；</li>
            <li>区块模板应位于模板目录的block目录，模板文件后缀必须为html，此处不需要加上模板的后缀；</li>
            <li>区块数据为该区块显示的小说在目标站的书号，小说之间用“|”隔开，请根据模板填写小说的数量。</li>
            <li>若名称不填写，则自动删除此条记录</li>
    	</ul>
    </div>
    <div class="tdare">     
        <table width="100%" cellspacing="0" class="dataTable" summary="数据显示区">
            <thead>
        		<tr>        		  
        		  <th style="width: 140px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;区块名称</th>
        		  <th style="width: 170px;">区块模板</th>
        		  <th style="width: 270px;">区块数据</th>
                  <th>调用代码</th>         		 
        		</tr>
        	</thead>
          <?php for ($i=1;$i<=$num;$i++) {?>  
          <tr>
            <th class="paddingT15">
                <label for="time_zone">
                    <input name="pt_templets_block[<?php echo $i?>][name]" type="text" value="<?php echo $pt_templets_block[$i]['name']?>" style="width: 80px;" />
                </label>
            </th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_block[<?php echo $i?>][templets]" type="text" value="<?php echo $pt_templets_block[$i]['templets']?>" style="width: 150px;" />                
            </td>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_templets_block[<?php echo $i?>][id]" type="text" value="<?php echo $pt_templets_block[$i]['id']?>" style="width: 250px;" />                
            </td>
            <td class="paddingT15 wordSpacing5">
                <input class="daima" onclick="oCopy(this)" value="{pt.getindexblock.<?php echo $i;?>}" readonly="readonly"/> <b>(点击复制)</b>                
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