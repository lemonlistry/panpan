
<div class="mid">
	<!--左边-->
    <?php include dirname('index.php') . '/protected/views/left.php';?>
  <div class="mid_right_nr">
  	<div class="mbx">
  		<span>您所在的位置：<a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界">首页</a> > 株洲方特欢乐世界留言中心</span>
  	</div>
  	<div class="title_news">
    	<h1>株洲方特欢乐世界留言中心</h1>
    </div>
    <div class="nr">
    <table border="0">
					
						<tr>
							<th width="80" align="center">留言人：</th>
							<td>
								<input name="pf_guestbook_contact" id="username" size="20" maxlength="10" />
								<span class="red">*</span> </td>
						</tr>
						<tr>
							<th align="center">联系方式：</th>
							<td>
								<input name="pf_guestbook_contactinfo" id="mobile" size="30" maxlength="30" />
								<span class="red">*（电话、QQ等，方便我们联系您！）</span> </td>
						</tr>
						<tr>
							<th align="center">留言标题：</th>
							<td>
								<input name="pf_guestbook_name" id="title" size="50" maxlength="60" />
								<span class="red">*</span> </td>
						</tr>
						<tr>
							<th align="center">留言内容：</th>
							<td>
								<textarea name="pf_guestbook_content" id="messagecontent" cols="50" rows="3"></textarea>
								<span class="red">*</span> </td>
						</tr>
						<tr>
							<th colspan="2" align="center">
								<input type="button" id="sendmessage" name="submit" value="提交留言" />
							</th>
						</tr>
	</table>
    <hr style=" color:#CCC; border:3px;"/>

				<div class="page">
					
    </div>
    
    </div>
    <div class="nr_bottom"></div>
  </div>
</div>
<div class="clear"></div>
  <?php echo CHtml::scriptFile(Yii::app()->request->baseUrl.'/js/jquery.js');?>
<?php echo CHtml::scriptFile(Yii::app()->request->baseUrl.'/js/index.js');?>