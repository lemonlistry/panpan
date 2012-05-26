<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body class="input"><div id="tipWindow" class="tipWindow"><span class="icon">&nbsp;</span><span class="messageText"></span></div><div id="messageWindow" class="messageWindow jqmID2"><div class="windowTop"><div class="windowTitle">提示信息&nbsp;</div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="messageContent"><span class="icon">&nbsp;</span><span class="messageText"></span></div><input class="formButton messageButton windowClose" value="确  定" hidefocus="true" type="button"></div><div class="windowBottom"></div></div><div id="contentWindow" class="contentWindow jqmID1"><div class="windowTop"><div class="windowTitle"></div><a class="messageClose windowClose" href="#" hidefocus="true"></a></div><div class="windowMiddle"><div class="windowContent"></div></div><div class="windowBottom"></div></div>
	<div class="body">
		<div class="inputBar">
			<h1><span class="icon">&nbsp;</span>添加门票类型</h1>
		</div>
            <div class="bodytotal">
               <div class="body_left">
                   <form action="<?php echo $this->createUrl('ticket/actaddclass');?>" method="post">
			<table width="700px">
				<tbody>
				  <th width="100px;">门票类型:</th>
				  <td width="600px;"><input type="text" value="<?php echo  isset($info) ? $info['class_name'] : '';?>" name="class_name">(门票类型名称就是为景点的名称) </td>
				  </tr>
				  <tr>
				  <th width="100px">页面关键字: </th>
				  <td width="600px;">
                                      <textarea name="keyword"  style="width:700px;height:50px;"><?php echo  isset($info) ? $info['keyword'] : '';?></textarea>
                                  </td>
				  </tr>
				<tr>
				<tr>
				  <th width="100px">页面描述 </th>
				  <td width="600px;">
                                      <textarea name="description"  style="width:700px;height:50px;"><?php echo  isset($info) ? $info['description'] : '';?></textarea>
                                  </td>
				  </tr>
				<tr>
				<tr>
				  <th width="100px">订票须知: </th>
				  <td width="600px;">
                                      <textarea id="editor_id" name="content"  style="width:700px;height:300px;"><?php echo  isset($info) ? $info['class_content'] : '';?></textarea>
                                  </td>
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
     <script charset="utf-8" src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></script>
    <script charset="utf-8" src="<?php echo Yii::app()->request->baseUrl?>/js/kindeditor-v4.0.3/kindeditor.js"></script>
 <script>
  KindEditor.ready(function(K) {
   var editor1 = K.create('textarea[name="content"]', {
    uploadJson : '<?php echo Yii::app()->request->baseUrl?>/js/kindeditor-v4.0.3/php/upload_json.php',
    fileManagerJson : '<?php echo Yii::app()->request->baseUrl?>/js/kindeditor-v4.0.3/php/file_manager_json.php',
    allowFileManager : true,
    afterCreate : function() {
     var self = this;
     K.ctrl(document, 13, function() {
      self.sync();
      K('form[name=example]')[0].submit();
     });
     K.ctrl(self.edit.doc, 13, function() {
      self.sync();
      K('form[name=example]')[0].submit();
     });
    }
   });
  });
 </script>
</html>