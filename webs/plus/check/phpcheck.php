<?php
if(function_exists("file_get_contents")){
	echo "file_get_contents：支持";
}else{
	echo "file_get_contents：不支持";
}
echo '<br />';
if(function_exists("curl_init")){
	echo "curl：支持";
}else{
	echo "curl：不支持";
}
echo '<br />';
if(function_exists("fsockopen")){
	echo "fsockopen：支持";
}else{
	echo "fsockopen：不支持";
}
?>