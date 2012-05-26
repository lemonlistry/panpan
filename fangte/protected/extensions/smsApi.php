<?php

/**
 * 短信接口API
 * @author lemon
 * @since 2011-04-25
 * example：
 *      $smsInstance = new smsApi();
 *      $smsInstance->sendSms($content,$phones);
 */
class smsApi{

public static function sendSms($content,$mobile){ 
	set_time_limit(100);
	$_url="http://sms.rhww.cn:80/ensms/servlet/WebSend?userId=jeromes&password=7ecd07f1eff514d63ecbe8a753f64f3c&mobile={$mobile}&content={$content}";
	$url = parse_url($_url); 
	$contents = ''; 
	$fp = fsockopen($url['host'],$url['port']); 
	if($fp){ 
		$_request = $url['path'].($url['query']==''?'':'?'.$url['query']).($url['fragment']==''?'':'#'.$url['fragment']); 
		fputs($fp,'GET '.$_request." HTTP/1.0\r\n"); 
		fputs($fp,"Host: ".$url['host']."\n"); 
		fputs($fp,"Content-type: application/x-www-form-urlencoded\n"); 
		fputs($fp,"Connection: close\n\n"); 
		$line = fgets($fp,1024); 
		if(!eregi("^HTTP/1\.. 200", $line))
		 	return; 
		else{ 
			$results = ''; 
			$contents = ''; 
			$inheader = 1; 
		while(!feof($fp)){ 
			$line = fgets($fp,2048); 
			if($inheader&&($line == "\n" || $line == "\r\n")){ 
					$inheader = 0; 
			}elseif(!$inheader){ 
					$contents .= $line; 
			} 
		} 
	fclose($fp); 
	} 
} 
return $contents; 
} 
}


?>
