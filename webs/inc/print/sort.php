<?php
if (isset($_GET['sortid'])){
    $sortid=$_GET['sortid'];
}else{
    $sortid=0;
}
if (isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}
?>