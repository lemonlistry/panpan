<?php
if(PT_DOWNURL=="true"){
	for($i=1; $i<=$downlistnum; $i++){
		$downlist[$i]['url']=PT_SITEURL.'ptdown.php?bookid='.$bookid.'&type='.$type.'&id='.$i;
	}
}
?>