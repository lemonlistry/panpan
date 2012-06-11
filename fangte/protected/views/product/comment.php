<?php
?>

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

<script>
$('#bonus_page').bind('click', function(e){
       var h=e.target;
    var ref=h.href;
    var url='';
    var id = $('#ticket_id').val();
        var href=$.baseurl+'product/ajaxcomment';
        if(ref.indexOf('?')=='-1'){
            url=href+'?id='+id;
        }else{
            url=href+'?'+ref.split('?')[1]+"&id="+id;
        }
    $.post(url,function(data){
    $("#all_bonus").html(data);
    });
        return false;
    });

</script>