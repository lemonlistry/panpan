<?php
for($i=1;$i<=5;$i++){
?>
<li class="ui-tabs-selected">
                                <div id="no1" class="con ui-tabs-panel" style="DISpLaY: block">
                                    <a class="img" href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank">
                                        <img alt="<?php echo $pt_tpl_block[$i]['bookname']?>" src="<?php echo $pt_tpl_block[$i]['bookimg']?>"/> 
                                    </a>
                                    <h4><a href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank"><?php echo $pt_tpl_block[$i]['bookname']?></a></h4>
                                    <span><?php echo $pt_tpl_block[$i]['bookinfo']?></span><em>
                                    <a href="<?php echo $pt_tpl_block[$i]['bookurl']?>" target="_blank">¡¾ÔÄ¶Á±¾Êé¡¿</a>
                                </em>
                                </div>
                            </li>
<?php
}
?>