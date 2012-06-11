
<div class="mid">
	<!--左边-->
   <?php include dirname('index.php') . '/protected/views/left.php';?>
  <div class="mid_right_nr">
  	<div class="mbx">
  		<span>您所在的位置：<a href="<?php echo $this->createUrl('site/index')?>" title="株洲方特欢乐世界">首页</a> > <?php echo $info['class_name']?>门票在线预订</span>
  	</div>
  	<div class="title">
    	<h1><?php echo $info['class_name']?>门票预订</h1>
    </div>
    <div class="nr">
	<!--联盟开始-->
<h1 style="font-size:16px;">
<?php echo $info['class_name']?>预订</h1>
<table width='682px' bgcolor='0' cellpadding='0' style="background:#CCC;">
<tr style='height: 30px;'>
<th width='33%' height='23' style='background: #FFF;'>
景区项目
</th>
<th width='33%' style='background: #FFF;'>
挂牌价
</th>
<th width='33%' style='background: #FFF;'>
折扣价
</th>
</tr>
<tr style='height: 25px; background: #FFF;' align='center'>
    <td height='33' style='background: #FFF;'>
    <?php echo $info['ticket_name']?>
    </td>
    <td height='33' style='background: #FFF;'>
    <del style="font-size: 16px;">￥<?php echo $info['ticket_market_price']?></del>
    </td>
    <td height='33' style='background: #FFF;'>
    <strong style="font-size: 16px; color: Red;">￥<?php echo $info['ticket_shop_price']?></strong>
    </td>
</tr>
</table>

<div class="conText" style="width:660px">
                    <div id="consub">
                        <h2>
                            预订提交</h2>
                        <script type="text/javascript">
                        function Check(obj) {
                            var startTime = $("#startTime").val();
                            var usernames = $("#usernames").val();
                            var number = $('#number').val();
                            var phone = $("#phone").val();
                            var fenlei = $("#fenlei").val();
                            var name = usernames;
                            if (startTime == '') { alert("尊敬的游客您好，出游时间不能为空！"); return false; }
                            if (number <= 0 || isNaN(number)) { alert("尊敬的游客您好，请输入正确的人数！"); return false; }
                            if (usernames == '') { alert("尊敬的游客您好，请输入正确的姓名！"); return false; }
                            if (phone == '' || phone.length != 11 || isNaN(phone)) { alert("请填入正确的手机号！"); return false; }
                            var  url = $.baseurl+"product/book";
                            var data ="addtime=" + startTime + "&username=" + usernames + "&phone=" + phone + "&number=" +number +"&tid="+<?php echo $info['ticket_id']?>;
                            $.post(url,data,function(result){
                                if(result.error)
                                {
                                    alert(result.message);
                                }
                                else
                                {
                                    alert(result.message);
                                    location.href=$.baseurl+'site/index';
                                }
                            },'json');
                            
                        }
			function change(id)
			{
			    if(id=='1')
			    {
				$('#note').show();
				$('#message').hide();
				$('#active1').removeClass('active');
				$('#active1').addClass('inactive');
				$('#active2').removeClass('inactive');
				$('#active2').addClass('active');
			    }
			    if(id=='2')
			    {
				$('#note').hide();
				$('#message').show();
				$('#active2').removeClass('active');
				$('#active2').addClass('inactive');
				$('#active1').removeClass('inactive');
				$('#active1').addClass('active');
			    }
			}
   
                    </script>
                        <table width="630px" border="1" cellpadding="0" cellspacing="0" bordercolor="#EBEBEB" bgcolor="#FFFFFF" style="text-align: center; line-height: 20px;">
                            <tr style="height: 30px;">
                                <td align="right" width="15%" bgcolor="#FFFFFF">
                                    出游时间：
                                </td>
                                <td align="left" width="30%" valign="middle" bgcolor="#FFFFFF">
                                    <input type="text" id="startTime" name="startTime"  class="f_input date-pick" style="float: left;" />
                                   
                                </td>
                                <td align="left" bgcolor="#FFFFFF">
                                    请选择时间，注意出游时间为30天内
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    出游人数：
                                </td>
                                <td align="left" valign="middle">
                                    <input type="text" id="number" name="p1" class="f_input2" />个
                                </td>
                                <td align="left">
                                    请填写数字，如2个，其他特殊门票请参照购票详情。
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    联系人姓名：
                                </td>
                                <td align="left" valign="middle">
                                    <input id="usernames" class="f_input" type="text" />
                                </td>
                                <td align="left">
                                    请填写真实姓名和手机号码是为了您能收到我们发送的购票短信作为购票凭证以方便您够买折扣票。
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    手机号码：
                                </td>
                                <td align="left" valign="middle">
                                    <input name="phone" id="phone" class="f_input" type="text" />
                                </td>
                                <td align="left">
                                    手机号码一定要填写正确，前面不需要加0，否则将无法收到短信
                                </td>
                            </tr>
                            <tr style="height: 30px;">
                                <td colspan="3">
                                    <input type="button" id="regsubmit" class="C_input" value="提交" onclick="Check(this);" />
                                </td>
                            </tr>
                      </table>
						
						<div class="conText">
						    <ul>
			<li id="active1" class="inactive" onclick="change(1)" style="cursor: pointer;cursor:hand;float: left;height: 33px;width: 135px " onclick="_p_nav(1)">订票须知</li>
			<li id="active2" class="active" onclick="change(2)" style="cursor: pointer;cursor:hand;float: left;height: 33px;width: 135px" onclick="_p_nav(2)">商品评论(<?php echo $pages->_itemCount;?>)</li>
			</ul>
						    <div style="clear: both"></div>
                    <b style="color: #F00;"></b> 
		    <div id="note"><?php echo $info['class_content'];?></div>
		    <div id="message" style="display: none">
                       <div id="all_bonus">

			    <table class="show-rate-table" style="width: 100%;">
				<tbody>
                                    <?php foreach($comment as $val){?>
				    <tr>
					<td class="cmt">
					    <p class="rate" style="text-align: left; max-width: 100%;"><?php echo $val['comment_content'];?></p>
					    <p class="cmtInfo"><span class="date">[<?php if(date('Y-m-d',$val['add_time'])==date('Y-m-d',time())){echo '今天';}else{echo date('Y-m-d',$val['add_time']);}?>]</span><span class="actSku"><?php echo $val['comment_ticketclassname']?>【<?php echo $val['comment_tickname'];?>】</span></p>
					</td>
					<td class="buyer">
					    <p><?php echo $val['comment_name'];?></p>
					</td>
				    </tr>
                                    <?php }?>
				</tbody>
			    </table>
        

                              <div style="float: left;margin-left:35%;margin-bottom: 10px;margin-top: 10px;" align="center" id="bonus_page"><?php $this->widget('CLinkPager',array(
                                'pages'=>$pages,
                                'nextPageLabel'=>'下一页',
                                'prevPageLabel'=>'上一页',
                                 'lastPageLabel'=>'尾頁',
                                'firstPageLabel'=>'首頁',
                            ));?></div>
                           </div>
			    <table style="margin-left: 20px;">
				<tr>
				    <td>预定人：</td>
				    <td><input type="text" name="comment_name" id="comment_name"></td>
				</tr>
				<tr>
				    <td>信息：</td>
				    <td><textarea id="comment_content" name="comment_content" rows="6" cols="60"></textarea></td>
				</tr>
				<tr>
				    <td>验证码：</td>
				    <td><input id="authcode_content" name="authcode_content" size="15"><img src="<?php echo $this->createUrl('product/Authcode');?>" onclick='captchaImage()' id="authcode" alt="换一张" width="80" height="18"  id="captchaImage"></td>
				</tr>
				<tr >
				     <td></td>
				    <td style="text-align: right;padding-right: 50%;"><input type="button" value="提交" id="comment_button"></td>
				</tr>
			    </table>
		    </div>		
                </div>
                    </div>
                </div>
        <input type="hidden" value="<?php echo $info['ticket_id'];?>" id="ticket_id">
<!--联盟结束-->
    
    </div>
    <div class="nr_bottom"></div>
  </div>
</div>
<div class="clear"></div>
