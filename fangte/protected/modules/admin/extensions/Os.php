<?php

/**
 * @author 黄金辉
 */
class Os
{
	/**
	 * 编号生成 各种编号
	 * @param string $nownumber 当前编号
	 * @param string $prefix 前缀

	 */
	const PARAM_INT = 0;
        const PARAM_TXT = 1;
	public static function createnumber($nownumber, $prefix)
	{
		$nowtime = date('Ymd');
		$newnumber = null;
		if(substr($nownumber, 2, 8) == $nowtime){
			$nextfix = substr($nownumber, 10) + 1;
			$nextfix = str_pad($nextfix, 8, 0, STR_PAD_LEFT);
			$newnumber = $prefix . $nowtime . $nextfix;
		}else{
			$newnumber = $prefix . $nowtime . str_pad(1, 8, 0, STR_PAD_LEFT);
		}
		return $newnumber;
	}

	/**
	 * 提示信息页面
	 * @param string $mess 提示信息内容
	 * @param string  $url 要跳转的url，默认(1)是返回上一页
	 * @param int $s 等待的时间，默认3秒
	 * @param boolean $is_exit 是否退出 默认终止程序 true  不终止false
	 */
	public static function prompt($mess, $url=1, $s=3000, $is_exit=true)
	{
		include dirname('index.php') . '/protected/views/Prompt.php';
		$is_exit == true && exit();
	}

	/**
	 * @param string $message 提示信息--默认(我们的机器小王子太繁忙了，请返回浏览其他页面吧！) 
	 * @param string $gourl 默认前往首页
	 * @param boolean $is_exit 是否终止执行 true 是 false 继续往下执行
	 */
	public static function error($message='', $gourl='', $is_exit=true)
	{
		$gourl == '' && $gourl = Yii::app()->request->baseurl;
		include dirname('index.php') . '/protected/views/error.php';
		$is_exit == true && exit();
	}

	/**
	 * 404 页面，错误
	 */
	public static function error404()
	{
		include dirname('index.php') . '/protected/views/404.php';
		exit();
	}

	/**
	 * 验证码
	 */
	public static function Authcode()
	{
		Header("Content-type: image/GIF");
		header("Expires:Mon,26 Mar 1997 06 26 05:00:00 GMT");
		header("Cache-control:no-cache,must-revalidate");
		header("Pragma:no-cache");
		srand((double) microtime() * 1000000);
		$im = imagecreate(62, 20);

		$black = ImageColorAllocate($im, 0, 0, 0);
		$white = ImageColorAllocate($im, 255, 255, 255);
		$gray = ImageColorAllocate($im, 200, 200, 200);
		imagefill($im, 0, 0, $gray);
		while(($authcode = rand() % 100000) < 10000);
		Yii::app()->user->setState('authcode', $authcode);
		imagestring($im, 5, 10, 3, $authcode, $black);
		for($i = 0; $i < 200; $i++){
			$randcolor = ImageColorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));
			imagesetpixel($im, rand() % 70, rand() % 30, $randcolor);
		}
		ImagePNG($im);
		ImageDestroy($im);
	}

	/**
	 * text 转 html
	 * @param string $text 要转换的text
	 */
	public static function Text2html($text)
	{
		$text = htmlspecialchars_decode($text);
		return $text;
	}

	/**
	 * 计算时间间隔 
	 * @param int $time 时间间隔
	 * @param boolean $echo 是否打印结果
	 */
	public static function intvaltime($time, $echo=false)
	{
		$arr = array();
		$arr['d'] = floor($time / (3600 * 24));
		$arr['h'] = floor(($time - (3600 * 24 * $arr['d'])) / 3600);
		$arr['i'] = floor(($time - ((3600 * 24 * $arr['d']) + ($arr['h'] * 3600))) / 60);
		$arr['s'] = floor(($time - ((3600 * 24 * $arr['d']) + ($arr['h'] * 3600) + ( 60 * $arr['i']))));
		if($time > 1){
			foreach($arr as $k=>$v){
				$arr[$k] = str_pad($v, 2, '0', STR_PAD_LEFT);
			}
		}else{
			foreach($arr as $k=>$v){
				$arr[$k] = str_pad(0, 2, '0', STR_PAD_LEFT);
			}
		}
		if($echo == false){
			return $arr;
		}else{
			echo $arr['d'] . '天' . $arr['h'] . '時' . $arr['i'] . '分' . $arr['s'] . '秒';
		}
	}
        
        
    /**
     * 用于UTF8字符集的文字截取,
     * @name string_cut
     * @param  string $str 字符串
     * @param  $width 要截取的宽度
     * @return string 返回新字符串
     */
    public static function string_cut($str,$width)
    {
        $str = preg_replace('/<.+>/U','',$str);
        $new_str = mb_strimwidth($str,0,$width,'','UTF-8');
        if(strlen($str)>$width){
            $new_str.= "....";
        }
        return $new_str;
    }
    
      /**
     * 获取request 里面的变量值
     * @param array param 数组索引和类型
     * @return array  返回取到的变量值数组
     */
    public static function get_data($param){
        $result = array();
        foreach($param as $k=>$v){
            if($_REQUEST[$k]!=''){
                $result[$k] = $_REQUEST[$k];
            }else{
            }
            //如果指定输入是整形
            if(self::PARAM_INT == $v){
                if(!is_numeric($result[$k])){
                }
            }else{
                //如果指定输入是字符串
                //过滤html语法
                $result[$k] = str_replace(array("&","<",">"), array("&amp;","&lt;","&gt;"),$result[$k]);
                //过滤sql注入攻击
                if(get_magic_quotes_gpc()){
                    $result[$k] = str_replace(array("\\\"","\\''"),array("&quot;","&#039;"),$result[$k]);
                }else{
                    $result[$k] = str_replace(array("\"","'"),array('&quot;','&#039;'),$result[$k]);
                }
                $temp = urldecode($result[$k]);
                if(self::check_sql($temp)){
                }
            }
            $result[$k] = self::daddslashes($result[$k]);
        }
        return $result;
    }
    
    //防止GPC未开启时的字符型注入
    public static function daddslashes($string, $force = 0) {
        if(!get_magic_quotes_gpc() || $force) {
            if(is_array($string)) {
                foreach($string as $key => $val) {
                    $string[$key] = daddslashes($val, $force);
                }
            }else{
                $string = addslashes($string);
            }
        }
        return $string;
    }

    //过滤常用的sql语句
    public static function check_sql($a){
      return preg_match('/\sexec\s|\sshow\s|\sdescribe\s|\sdesc\s|\s0x\s|\sselect\s|\sdrop\s|\salter\s|\sinsert\s|\supdate\s|\sdelete\s|\s\'\s|\s\/\*\s|\s\*\s|\s\.\.\/\s|\s\.\/\s|\sunion\s|\sinto\s|\sload_file\s|\soutfile\s|\sand\s/', $a);   
    }


}

?>
