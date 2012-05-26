<?php
/**
 * 系统函数类
 */

// class类
class pt{
	
    //获取内容
    //$url  采集的网址
    //    
    function getcode($url,$type='1'){
		if ( PT_PROX == "true"){
		     $code = $this->http_fopen($url);
		}else{
			for ($getnum=1;$getnum<=PT_GETNUM;$getnum++){
				if (PT_GETTYPE=="file_get_contents"){
					ini_set('user_agent',PT_USERAGENT);
					$opt=array('http'=>array('header'=>"Referer:$url"));
					$context=stream_context_create($opt);
					$code=file_get_contents($url,false,$context);
				}elseif (PT_GETTYPE=="curl"){
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_USERAGENT, PT_USERAGENT);
					curl_setopt($ch, CURLOPT_REFERER, $url);
					$code = curl_exec($ch);
					curl_close($ch);
				}else{
					$buf = parse_url($url);
					$host = $buf['host'];
					if (isset($buf['path'])) {
                        $page = $buf['path'];
                        if (isset($buf['query']) and trim($buf['query']) !== "") {
                            $page .= "?" . trim($buf['query']);
                        }
                    } else {
                        $page = '/';
                    }
                    if (isset($buf['port'])) {
                        $port = $buf['port'];
                    } else {
                        $port = 80;
                    }
					$header = "GET $page HTTP/1.1\r\n";
                    $header .= "Host:$host\r\n";
                    $header .= "Content-type:application/x-www-form-urlencoded\n";
                    $header .= "Connection:close\r\n";
                    $header .= "Accept:text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5\r\n";
                    $header .= "Accept-Language:zh-cn,zh;q=0.5\r\n";
                    $header .= "Accept-Charset:gb2312,utf-8;q=0.7,*;q=0.7\r\n";
                    $header .= "User-Agent:" . PT_USERAGENT . "\r\n";
                    $header .= "Referer:http://$host/\r\n";
					$code = "";
                    $fp = fsockopen($host, $port, $errno, $errstr, 30);
                    if ($fp) {
                        fputs($fp, $header);
                        while (!feof($fp))
                            $code .= fgets($fp, 1024);
                        fclose($fp);
                    } else {
                        return false;
                    }
				}				
				if ($code!="") {
				    return $code;
				}elseif (!strpos($_SERVER[REQUEST_URI],'collect') and !strpos($_SERVER[REQUEST_URI],'user') and $type=='1'){
				    $msg=file_get_contents(PT_DIR.'error.html');		
				    if ($msg!=""){
				    	error_msg(str_replace('{$errormsg}','采集页面出错，页面超时或者目标页面暂时无法访问<br>源地址：'.$url,$msg));
                        exit;
                    }else{
						error_msg("地址错误，源地址：$url<br />自定义此错误请在根目录加增加error.html文件。");
						exit;
				    }
                    return false;
                }
			}			
		}
		return false;
    }
    
    //偷取内容
    //$from  所要偷取的变量
    //$start 开始位置
    //$end   结束位置
    //$lt    是否附加开始字符串,为真附加
    //$gt    是否附加结尾字符串,问真附加
	function steal($from,$start,$end,$lt=false,$gt=false){
        $str = explode($start,$from);         
        if (isset($str['1']) and $str['1']!=""){
		
			$str = explode($end,$str['1']);
			$strs = $str['0'];
		}else{
            //echo $from,'<br /><br />';
            //echo $start;
            $strs="";
            
		}
		     
        if($lt){ $strs = $start.$strs; } 
        if($gt){ $strs = $strs.$end; }
		return($strs);
	}
    
	// 生成html
    function writeto($filePath, $content){
        pt::createdir(dirname($filePath));
        $pt_html = fopen($filePath, 'w'); 
        flock($pt_html, LOCK_EX);
        $result = fwrite($pt_html, $content);
        fclose($pt_html);
        return $result;
    }
    
    //生成目录
    function createdir($dir){
        if (strpos('\\',$dir)){
            $dir=str_replace('\\','/',$dir);
        }
        $edir = explode("/",$dir);
        for($i=0;$i<count($edir);$i++){
            $edirm = $edir[0];
            for($ii=1;$ii<=$i;$ii++){
                $edirm = $edirm.'/'.$edir[$ii];
            }
            if(file_exists($edirm) && is_dir($edirm)){
            
            }else{
               @mkdir ($edirm,0777);
            }
        }
    }
    
    function getsorturl($sortid,$page='1'){
        if (PT_REURL == 'true') {
            return PT_SITEURL.str_replace('{page}',$page,str_replace('{sortid}',$sortid,PT_REURL_SORT));
        }else{
            return PT_SITEURL.PT_FILENAME_SORT.'?sortid='.$sortid.'&page='.$page;
        }
    }
    
    function getoverurl($page='1'){
        if (PT_REURL == 'true'){
            return PT_SITEURL.str_replace('{page}',$page,PT_REURL_OVER);
        }else{
            return PT_SITEURL.PT_FILENAME_OVER.'?page='.$page;
        }
    }
    
    function gettopurl($topid,$page='1'){
        if (PT_REURL == 'true') {
            return PT_SITEURL.str_replace('{page}',$page,str_replace('{topid}',$topid,PT_REURL_TOP));
        }else{
            return PT_SITEURL.PT_FILENAME_TOP.'?topid='.$topid.'&page='.$page;
        }
    }
    
    function gettopoverurl($topid,$page='1'){
        if (PT_REURL == 'true') {
            return PT_SITEURL.str_replace('{page}',$page,str_replace('{topid}',$topid,PT_REURL_TOPOVER));
        }else{
            return PT_SITEURL.PT_FILENAME_TOPOVER.'?topid='.$topid.'&page='.$page;
        }
    }
    
    function getbookurl($bookid){
        if (PT_REURL == 'true') {
            return PT_SITEURL.str_replace('{bookid}',$bookid,PT_REURL_BOOK);
        }else{
            return PT_SITEURL.PT_FILENAME_BOOK.'?bookid='.$bookid;
        }
    }
    
    function getdownurl($bookid,$type='all'){
        
        if (PT_REURL == 'true') {
            return PT_SITEURL.str_replace('{type}',$type,str_replace('{bookid}',$bookid,PT_REURL_DOWN));
        }else{
            return PT_SITEURL.PT_FILENAME_DOWN.'?bookid='.$bookid.'&type='.$type;
        }
    }
    
    function getreadurl($cutid,$bookid){
        if (PT_REURL == 'true') {
            return PT_SITEURL.str_replace('{cutid}',$cutid,str_replace('{bookid}',$bookid,PT_REURL_READ));
        }else{
            return PT_SITEURL.PT_FILENAME_READ.'?cutid='.$cutid.'&bookid='.$bookid;
        }
    }
    
    function getchapterurl($cutid,$bookid,$chapterid){
        if (PT_REURL == 'true') {
            return PT_SITEURL.str_replace('{chapterid}',$chapterid,str_replace('{cutid}',$cutid,str_replace('{bookid}',$bookid,PT_REURL_CHAPTER)));
        }else{
            return PT_SITEURL.PT_FILENAME_CHAPTER.'?cutid='.$cutid.'&bookid='.$bookid.'&chapterid='.$chapterid;
        }
    }
    
    function getreadendurl($bookid){
        if (PT_REURL == 'true') {
            return PT_SITEURL.str_replace('{bookid}',$bookid,PT_REURL_READEND);
        }else{
            return PT_SITEURL.PT_FILENAME_READEND.'?bookid='.$bookid;
        }
    }
    
    function getsearchurl($searchkey,$searchtype){
        $searchkey=urlencode($searchkey);
        return PT_SITEURL.PT_FILENAME_SEARCH.'?type='.$searchtype.'&key='.$searchkey;
    }
    
    function getvoteurl($bookid){
        return PT_SITEURL.'user/vote.php?bookid='.$bookid;
    }
    
    function getmarkurl(){
        return PT_SITEURL.'user/usermark.php';
    }
    
    function getmarkaddurl($bookid,$chapterid="",$chaptername=""){
        return PT_SITEURL.'user/usermark.php?action=add&bookid='.$bookid.'&chapterid='.$chapterid.'&chaptername='.$chaptername;
    }
    
}
	
// 更新时间
function pt_datetime(){
	$H = date('H') - 3;
	if($H < '0'){ $H = '1'; }
	return(date('Y-m-d '.$H.':'.rand(1,59).':s'));
}

//获取数据缓存
function cache_file($file){
	$filetmp=file_get_contents($file);
	$cache=explode("\n",$filetmp);
	return $cache;
}
function error_msg($msg){
	echo $msg."<script type='text/javascript'>setTimeout(function(){document.location='http://www.ptcms.com/error.php';},10000);</script>";
}

//百度top榜
function baidu($n){
    global $pt;
    $file = PT_DIR.'cache/cache_baidutop.ptv';
	if(file_exists($file)){
		include $file;
	}else{
		$baidulist = $pt->getcode('http://top.baidu.com/buzz.php?p=book');
		$baidulist = $pt->steal($baidulist,'<tbody>', '</tbody>');
		$baidubook = explode('<tr>',$baidulist);
		$baidunum = count($baidubook)-1;
		$str="<?php\n";
		for($i=1; $i<=$baidunum; $i++){
			$baidu[$i] = str_replace("'",'\'',str_replace('','\\',$pt->steal($baidubook[$i],'target="_blank">','</a>',false,false)));
			$str .= "\$baidu[$i]='".$baidu[$i]."';\n";
		}
		$str.="?>";
		$pt->writeto($file,$str);
	}
	if($n > 50){ $n = "5"; }
	$str="";
	for($i=1; $i<=$n; $i++){
		$bookname = $baidu[rand(1,50)];
		$str .= '<a href="'.PT_SITEURL.'search.php?type=bookname&key='.$bookname.'" target="_blank">'.$bookname.'</a> ';
	}
	return($str);
}

function ob_gzip($content){ 
    if(!headers_sent()&&extension_loaded("zlib")&&strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")){ 
        $content = gzencode($content,PT_GZIP_VALUE); 
        header("Content-Encoding: gzip"); 
        header("Vary: Accept-Encoding"); 
        header("Content-Length: ".strlen($content)); 
    } 
    return $content; 
} 

function geturl(){
    $ServerName = $_SERVER["SERVER_NAME"];
    $ServerPort = $_SERVER["SERVER_PORT"];
    $ScriptName = $_SERVER["SCRIPT_NAME"];
    $QueryString = $_SERVER["QUERY_STRING"];
    $Url = "http://" . $ServerName;
    if ($ServerPort != "80") {
        $Url = $Url . ":" . $ServerPort;
    }
    $Url = $Url . $ScriptName;
    if ($QueryString != "") {
        $Url = $Url . "?" . $QueryString;
    }
    return $Url;
}

function extend_3($file_name){
	$extend =explode("." , $file_name);
	$va=count($extend)-1;
	return $extend[$va];
}

function readlistend($listnum,$enum,$format){
    $num=$enum-$listnum%$enum;
    $str="";
	if ($num<$enum){
		for($i=1;$i<=$num;$i++){
			$str.=$format;
		}
	}
    return $str;
}

?>