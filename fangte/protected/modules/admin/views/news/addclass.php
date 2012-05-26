<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body class="input"><div id="tipWindow" class="tipWindow"><span class="icon">&nbsp;</span><span class="messageText"></span></div><div id="messageWindow" class="messageWindow jqmID2"><div class="windowTop"><div class="windowTitle">提示信息&nbsp;</div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="messageContent"><span class="icon">&nbsp;</span><span class="messageText"></span></div><input class="formButton messageButton windowClose" value="确  定" hidefocus="true" type="button"></div><div class="windowBottom"></div></div><div id="contentWindow" class="contentWindow jqmID1"><div class="windowTop"><div class="windowTitle"></div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="windowContent"></div></div><div class="windowBottom"></div></div>
	<div class="body">
		<div class="inputBar">
			<h1><span class="icon">&nbsp;</span>添加新闻类型</h1>
		</div>
            <div class="bodytotal">
               <div class="body_left">
                   <form action="<?php echo $this->createUrl('news/actaddclass');?>" method="post">
			<table width="700px">
				<tbody>
				  <th width="100px;">新闻类型:</th>
				  <td width="600px;"><input type="text" value="<?php echo  isset($info) ? $info['class_name'] : '';?>" name="class_name"></td>
				  </tr>
				<tr>
                                    <th><input type="hidden" name="class_id" value="<?php echo isset($info) ? $info['class_id'] : '';?>"></th>
                                    <td><input type="submit" value="添加"></td>
                                </tr>
			</tbody></table>
                       </form>
            </div>
           
            </div>
	</div>

</body>
</html>