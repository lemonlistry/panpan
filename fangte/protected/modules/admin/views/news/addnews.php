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
			<h1><span class="icon">&nbsp;</span>添加新闻</h1>
		</div>
            <div class="bodytotal">
               <div class="body_left">
                   <form action="<?php echo $this->createUrl('news/actadnews');?>" method="post">
			<table>
				<tbody>
				  <th>新闻类型:</th>
				  <td><select name="news_class_id">
                                          <option value="">请选择</option>
                                          <?php foreach($class as $val){?>
                                          <option value="<?php echo $val['class_id']?>" <?php if(isset($info) && $val['class_id']==$info['news_class_id']){echo "selected='selected'";}?>><?php echo $val['class_name']?></option>
                                          <?php }?>
                                      </select></td>
				  </tr>
				<tr>
				  <th>新闻标题: </th>
				  <td><input type="text" name="news_name" value="<?php echo  isset($info) ? $info['news_name'] : '';?>"></td>
				  </tr>
				<tr>
                                    <tr>
				  <th>添加时间: </th>
				  <td><input type="text" id="news_addtime" name="news_addtime" value="<?php echo  isset($info) ? date('Y-m-d',$info['news_addtime']) : '';?>"></td>
				  </tr>
                                     <tr>
				  <th>修改时间: </th>
				  <td><input type="text" id="news_updatetime" name="news_updatetime" value="<?php echo  isset($info) ?  date('Y-m-d',$info['news_updatetime']) : '';?>"></td>
				  </tr>
                                     <tr>
				  <th>点击次数: </th>
				  <td><input type="text" name="news_click" value="<?php echo  isset($info) ? $info['news_click'] : '';?>"></td>
				  </tr>
                                    <tr>
				  <th width="100px">新闻内容: </th>
				  <td width="600px;">
                                      <textarea id="editor_id" name="news_content"  style="width:700px;height:300px;"><?php echo  isset($info) ? $info['news_content'] : '';?></textarea>
                                  </td>
				  </tr>
				<tr>
                                    <th><input type="hidden" name="news_id" value="<?php echo isset($info) ? $info['news_id'] : '';?>"></th>
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
   var editor1 = K.create('textarea[name="news_content"]', {
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
     $('#news_addtime').datepicker();
      $('#news_updatetime').datepicker();
      //绑定日期控件
    $('#news_addtime').bind('focus',function(){
       $('#news_addtime').datepicker();
    });
       $('#news_updatetime').bind('focus',function(){
       $('#news_updatetime').datepicker();
    });     
});
 </script>
</html>