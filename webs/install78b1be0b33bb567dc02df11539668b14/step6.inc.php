<?php include 'header.share.php';?>
<div class="content">
<form id="install" name="myform" action="install.php?step=7" method="post">
<input type="hidden" name="step" value="7" />

<table width="100%" cellspacing="1" cellpadding="0">
<caption>填写管理员信息</caption>
  <tr>
	<th width="30%" align="right">管理员帐号 : </th>
	<td><input name="username" type="text" id="username" value="admin" style="width:120px" /> 2到20个字符，不含非法字符！<font color="FFFF00">(默认为 admin)</font></td>
  </tr>
  <tr>
	<th align="right">密码 : </th>
	<td><input name="password" type="text" id="password" value="" style="width:120px" /> 3到20个字符<font color="FFFF00">(默认为 admin&nbsp;<a href="javascript:;" onclick="$('#password').val(suggestPassword());"><img src="images/auth.gif" border="0" /></a>)</font></td>
  </tr>
  <tr>
	<th align="right">确认密码 : </th>
	<td><input name="pwdconfirm" type="text" id="pwdconfirm" value="" style="width:120px"/></td>
  </tr>
</table>
</form>
<a href="javascript:history.go(-1);" class="btn">返回上一步 : 填写网站基本信息</a>
<input type="button" name="completeInstall" onclick="checkform()" class="btn" value="下一步 : 安装结果" /></div>
</div>
</div>
</body>
</html>