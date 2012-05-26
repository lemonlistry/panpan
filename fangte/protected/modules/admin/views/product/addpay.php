<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
    <link href="<?= Yii::app()->request->baseUrl?>/css/jquery-ui-1.8.15.custom.css" rel="stylesheet" type="text/css">
</head>
<body class="input">
	<div class="body">
		<div class="inputBar">
			<h1><span class="icon">&nbsp;</span>添加方特娱乐设施</h1>
		</div>
            <div class="bodytotal">
               <div class="body_left">
                   <form action="<?php echo $this->createUrl('product/actaddpay');?>" method="post" enctype="multipart/form-data">
			<table>
				<tbody>
                                    <tr>
				  <th>项目名称:</th>
				  <td><input type="text" value="<?php echo  isset($info) ? $info['pay_name'] : '';?>" name="pay_name"></td>
				  </tr>
                                     <tr>
				  <th>项目图片:</th>
				  <td><input type="file" name="pay_image"></td>
				  </tr>
                                     <tr>
				  <th>添加时间:</th>
				  <td><input type="text" id="addtime" value="<?php echo  isset($info) ? date('Y-m-d',$info['pay_addtime']) : '';?>" name="pay_addtime"></td>
				  </tr>
                                     <tr>
				  <th>修改时间:</th>
				  <td><input type="text" id="updatetime" value="<?php echo  isset($info) ? date('Y-m-d',$info['pay_updatetime']) : '';?>" name="pay_updatetime"></td>
				  </tr>
                                     <tr>
				  <th>点击次数:</th>
				  <td><input type="text" value="<?php echo  isset($info) ? $info['pay_click'] : '';?>" name="pay_click"></td>
				  </tr>
				  <tr>
                                  <th>简单描述:</th>
                                  <td>
					 <textarea  name="pay_remark"  style="width:700px;height:50px;"><?php echo  isset($info) ? $info['pay_remark'] : '';?></textarea>
					</td>
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
				  <th>娱乐内容简介: </th>
				  <td>
                                      <textarea id="editor_id" name="pay_content"  style="width:700px;height:300px;"><?php echo  isset($info) ? $info['pay_content'] : '';?></textarea>
                                  </td>
				  </tr>
				<tr>
                                    <th><input type="hidden" name="pay_id" value="<?php echo isset($info) ? $info['pay_id'] : '';?>"></th>
                                    <td><input type="submit" value="添加"></td>
                                </tr>
			</tbody></table>
                       </form>
            </div>
           
            </div>
	</div>

</body>
     <script charset="utf-8" src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></script>
     <script charset="utf-8" src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui-1.8.15.custom.min.js"></script>
    <script charset="utf-8" src="<?php echo Yii::app()->request->baseUrl?>/js/kindeditor-v4.0.3/kindeditor.js"></script>
 <script>
  KindEditor.ready(function(K) {
   var editor1 = K.create('textarea[name="pay_content"]', {
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
 <script>
 $(document).ready(function(){
    //初始化日期控件
     $('#addtime').datepicker();
      $('#updatetime').datepicker();
      //绑定日期控件
    $('#addtime').bind('focus',function(){
       $('#addtime').datepicker();
    });
       $('#updatetime').bind('focus',function(){
       $('#updatetime').datepicker();
    });     
});
 </script>
</html>
