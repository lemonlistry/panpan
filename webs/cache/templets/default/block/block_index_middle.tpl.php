<?php
for($i=1;$i<=5;$i++){
?>
<?php
if($i==1){
?>
<div class="ft">            
		<a target="_blank" href="<?php echo $pt_tpl_block[$i]['bookurl']?>"><img src="<?php echo $pt_tpl_block[$i]['bookimg']?>" alt="<?php echo $pt_tpl_block[$i]['bookname']?>"  class="imgbg"/></a>
		<h3><a href="<?php echo $pt_tpl_block[$i]['bookurl']?>" title="<?php echo $pt_tpl_block[$i]['bookname']?>" target="_blank"><?php echo $pt_tpl_block[$i]['bookname']?></a></h3>
		<em>¿‡–Õ£∫<a href="<?php echo $pt_tpl_block[$i]['sortnurl']?>" target="_blank"><?php echo $pt_tpl_block[$i]['sortnname']?></a></em>
		<p>
			<a href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank" class="limit"><?php echo $pt_tpl_block[$i]['bookinfo']?></a><a href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank" class="more">°æœÍœ∏°ø</a>
		</p>			
	</div>
	<ul>
<?php }else{ ?>
<li><a target="_blank" href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank"><b><?php echo $pt_tpl_block[$i]['bookname']?>:</b><?php echo $pt_tpl_block[$i]['bookinfo']?></a></li>
<?php } ?>
<?php
}
?>
</ul>