<?php 
include 'header.share.php';
function tree($directory,$check){
    global $pt_set;
    $mydir=dir($directory);
    while($file=$mydir->read()){
    if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")){
        if (file_exists("$directory/$file/rules.set.php") and strpos($directory,'rules')){
            include "$directory/$file/rules.set.php";
            $name=$pt_rules_name.'('.$pt_rules_copyurl.')';
        }elseif (file_exists("$directory/$file/templets.set.php") and strpos($directory,'templets')){
            include "$directory/$file/templets.set.php";
            $name=$pt_templets_name;
        }else{
            $name=$file.'(不可用，缺乏必需文件)';
        }
    	if ($file==$check)
    	{
    		echo "<option value=$file selected='true'>$name</option>";
    	}else
    	{
    		print_r($pt_set);
            echo "<option value=$file>$name</option>";
    	}
    }
    }
    $mydir->close();
}
?>

<div class="content">
<form id="install" action="install.php?step=6" method="post">


<table width="100%" cellpadding="0" cellspacing="0">
<caption>请输入网站的基本资料</caption>
<tr>
<th>网站名称 : </th>
<td><input name="pt_sitename" type="text" id="sitename" value="PT小说程序" style="width: 200px;" /><span> 用于网站中使用的名称</span></td>
</tr>

<tr>
<th>网站地址 : </th>
<td><input name="pt_siteurl" type="text" id="siteurl" value="<?php echo $siteurl;?>" style="width: 200px;" /><span> 网站的访问URL，一般保持默认即可</span></td>
</tr>
<tr>
<th>站长名字 : </th>
<td><input name="pt_zzname" type="text" id="siteurl" value="Ptcms" style="width: 200px;" /><span> </span></td>
</tr>
<tr>
<th>E-mail : </th>
<td><input name="pt_zzemail" type="text" id="siteurl" value="administrator@yourdomain.com" style="width: 200px;" /><span> </span></td>
</tr>
<tr>
<th>备案编号 : </th>
<td><input name="pt_beian" type="text" id="siteurl" value="京ICP证030173号" style="width: 200px;" /><span> 您域名在工信部的备案</span></td>
</tr>
<tr>
<th>所用规则 : </th>
<td>
    <select name="pt_rule" style="width: 205px;">
		<?php  tree("../rules",'zaidudu'); ?>
    </select>
    <span> zaidudu为新规则</span>
</td>
</tr>
<tr>
<th>所用模板 : </th>
<td><select name="pt_tpl" style="width: 205px;">
		<?php  tree("../templets",'default'); ?>
    </select>
    <span> 纵横模板为PTvip模板</span>
</td>
</tr>
<tr>
            <th class="paddingT15"><label for="time_zone"> 程序目录：</label></th>
            <td class="paddingT15 wordSpacing5">
                <input name="pt_dir" type="text" value="<?php echo str_replace('\\','/',str_replace('install','',dirname(__FILE__)))?>" style="width:200px" />
                <span class="gray">程序所在绝对路径，程序自动检测。<a href="../plus/check/dircheck.php" target="_blank" style="color: #FFFF00;font-weight: bold;">点击此处对目录进行校验</a></span>
            </td>
          </tr>
</table>
</form>
</div>

<input type="button" onclick="javascript:history.go(-1);" value="返回上一步 : 文件权限检测" class="btn" />
<input type="button" onclick="$('#install').submit();$('#btn_installnow').attr('disabled',true);" id="btn_installnow" class="btn" value="下一步 : 管理员设置" />

</div>
</div>
</body>
</html>