<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<title>管理登录 - 8090旅游-方特世界</title>
<meta content="58haojie Team" name="Author">
<meta content="58haojie" name="Copyright">
<link type="image/x-icon" href="<?= Yii::app()->request->baseUrl?>/images/favicon.ico" rel="icon"> 
<link href="<?= Yii::app()->request->baseUrl?>/css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="login_wrap">
    <div class="login_header">
       <img src="<?= Yii::app()->baseUrl?>/images/login_logo.gif" width="194" height="90" border="0">	</div>
	<div class="login">
      <div class="login_ab">
		<div class="loginBox">
                    <form id="loginForm" class="form" action="<?= $this->createUrl('default/Login')?>" method="post">
					<h4>方特世界后台管理</h4>
		            <table class="loginTable">
		            	<tbody><tr>
		                    <th>
		                    	用户名:		                    </th>
							<td>
		                    	<div class="formText">
		                    		<input value="<?php $cookie_username = Yii::app()->request->getCookies(); if(isset($cookie_username['username']->value)){echo $cookie_username['username']->value;}?>" id="username" name="j_username" type="text">
		                    	</div>		                    </td>
		                </tr>
		                <tr>
							<th>
								密&nbsp;&nbsp;码:							</th>
		                    <td>

		                    	<div class="formText">
		                    		<input id="password" value="<?php $cookie_password = Yii::app()->request->getCookies(); if(isset($cookie_password['password']->value)){echo $cookie_password['password']->value;}?>" name="j_password" type="password">
		                    	</div>		                    </td>
		                </tr>
		                <tr>
		                	<th>
		                		验证码:		                	</th>
		                    <td>
		                    	<div class="formTextS">
		                    		<input id="captcha" name="j_captcha" type="text">
		                    	</div>
		                    	<div class="captchaImage">
		                   			<img src="<?= $this->createUrl('default/Authcode')?>" onclick='captchaImage()' id="authcode" alt="换一张" width="80" height="28" id="captchaImage">		                   		</div>		                    </td>
		                </tr>
		                <tr>
		                	<th>&nbsp;</th>
		                    <td>
		                    	<input id="isSaveUsername" name='isSaveUsername' type="checkbox" value="1"><label for="isSaveUsername">&nbsp;记住用户名</label>
		                    	&nbsp;<a style="color: blue;" href="javascript:void(0);" onclick='captchaImage()'>看不清,换一个</a>		                    </td>
		                </tr>
		                <tr>
		                	<th>&nbsp;</th>
		                    <td>
		                        <input class="submitButton ignoreForm" value="登 录" hidefocus="true" type="button" onclick='SubMit()'>		                    </td>
		                </tr>
		            </tbody></table>
		        </form>
		</div></div>
		
	</div>
    <div class="footer">Copyright © 2011 <a href="#">www.8090goto.com</a> All Rights Reserved 版权所有</div>
</div>

</body>
<script src="<?= Yii::app()->request->baseUrl?>/js/jquery.js"></script>
<script src="<?= Yii::app()->request->baseUrl?>/js/site_login.js"></script>
</html>