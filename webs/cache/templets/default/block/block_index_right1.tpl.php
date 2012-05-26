<?php
for($i=1;$i<=2;$i++){
?>
<div class="big">
                        <a class="img" href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank">
                            <img alt="<?php echo $pt_tpl_block[$i]['bookname']?>" src="<?php echo $pt_tpl_block[$i]['bookimg']?>"/>
                        </a>
                        <h2><span style="float:right"><?php echo $pt_tpl_block[$i]['author']?></span><a href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank"><?php echo $pt_tpl_block[$i]['bookname']?></a></h2>
                        <p class="jj"><?php echo $pt_tpl_block[$i]['bookinfo']?></p>
                        <p class="tr"><a href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank">¡¾ÔÄ¶Á±¾Êé¡¿ </a></p>
                    </div>
<?php
}
?>