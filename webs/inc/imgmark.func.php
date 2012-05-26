<?php
/**
	 * PHP图片水印 (水印支持图片或文字)支持中文
	 * @param  string    $groundImage    背景图片路径
	 * @param  intval    $waterPos       水印位置:有10种状态，1-9以外为随机位置；
     *                                      1为顶端居左，2为顶端居中，3为顶端居右；
	 *                                      4为中部居左，5为中部居中，6为中部居右；
	 *                                      7为底端居左，8为底端居中，9为底端居右；
     * @param  array     $water_arr      参数数组，可包含如下值：
     *----------------------------------------------------------------
	 *   string    $type       添加水印的类型 ,  'img' => 添加水印图片, 'text' => 添加水印文字,
	 *   string    $path       添加水印图片时,水印图片的路径,
	 *   string    $content    添加水印文字的文字内容
	 *   string    $textColor  添加水印文字的文字颜色
	 *   string    $textFont   添加水印文字的文字小大
	 *   string    $textFile   添加水印文字的文字字库路径
	 *----------------------------------------------------------------
	 * @return mixed    返回TRUE或错误信息，只有当返回TRUE时，操作才是成功的
	 * @example
	 * <code>
	 * imageWaterMark('./apntc.gif', 1,  array('type' => 'img', 'path')); 添加水印图片
     * imageWaterMark('./apntc.gif', 1, array('type' => 'text', 'content' => '', 'textColor' => '', 'textFont' => ''));  添加水印文字
     * </code>
	 */
	function imageWaterMark($backgroundPath, $waterPos = 0, $water_arr )
	{
		$isWaterImage = FALSE;
	    //读取背景图片
		if(!empty($backgroundPath) && file_exists($backgroundPath)){
			$background_info = getimagesize($backgroundPath);
			$ground_width = $background_info[0];//取得背景图片的宽
			$ground_height = $background_info[1];//取得背景图片的高
		 
			switch($background_info[2])//取得背景图片的格式
			{
				case 1:
					$background_im = imagecreatefromgif($backgroundPath);break;
				case 2:
					$background_im = imagecreatefromjpeg($backgroundPath);break;
				case 3:
					$background_im = imagecreatefrompng($backgroundPath);break;
				default:
					die($formatMsg);
			}
		} else {
	        return 'water image is not exists';
	    }
	    //设定图像的混色模式
		imagealphablending($background_im, true);
	    
		if (is_array($water_arr) && !empty($water_arr)) {
			if($water_arr['type'] === 'img' && !empty($water_arr['path']) && file_exists($water_arr['path'])){
				$isWaterImage = TRUE;
		        $set = 0;
				$offset = isset($water_arr['offset']) && !empty($water_arr['offset']) ? $water_arr['offset'] : 0;
				$water_info = getimagesize($water_arr['path']);
			    $water_width = $water_info[0];//取得水印图片的宽
				$water_height = $water_info[1];//取得水印图片的高
				switch($water_info[2])//取得水印图片的格式
				{
					case 1:
						$water_im = imagecreatefromgif($water_arr['path']);
						break;
					case 2:
						$water_im = imagecreatefromjpeg($water_arr['path'])
						;break;
					case 3:
						$water_im = imagecreatefrompng($water_arr['path']);
						break;
					default:
						return 'picture format mistake';
		 	    } 
			} elseif ($water_arr['type'] === 'text' && $water_arr['content'] !='') {
			    $fontfile =  isset($water_arr['fontFile']) && !empty($water_arr['fontFile']) ?  $water_arr['fontFile'] : 'simkai.ttf';
			    $fontfile = 'C:\WINDOWS\Fonts\\' . $fontfile ;
				$waterText = $water_arr['content'];
				$set = 1;
				$offset = isset($water_arr['offset']) && !empty($water_arr['offset']) ? $water_arr['offset'] : 5;
				$textColor =  !isset($water_arr['textColor']) || empty($water_arr['textColor']) ? '#FF0000' :  $water_arr['textColor']; 
				$textFont =  !isset($water_arr['textFont']) || empty($water_arr['textFont']) ? 20 :  $water_arr['textFont']; 
				$temp = @imagettfbbox(ceil($textFont),0,$fontfile,$waterText);//取得使用 TrueType 字体的文本的范围
			    $water_width = $temp[2] - $temp[6];
			    $water_height = $temp[3] - $temp[7];
			    unset($temp);
			} else {
				return 'parameter mistake';
			}
		} else {
			return FALSE;
		}
	 
	    if( ($ground_width< $water_width) || ($ground_height<$water_height) ) {
			return "water image larger than background image";
	    }
		
		switch($waterPos)
		{
			case 1://1为顶端居左
				$posX = $offset * $set; 
				$posY = ($water_height + $offset) * $set-10;
			    break;
			case 2://2为顶端居中
				$posX = ($ground_width - $water_width) / 2;
				$posY = ($water_height + $offset) * $set;
				break;
			case 3://3为顶端居右
				$posX = $ground_width - $water_width - $offset * $set;
				$posY = ($water_height + $offset) * $set-10;
				break;
			case 4://4为中部居左
				$posX = $offset * $set;
				$posY = ($ground_height - $water_height) / 2;
			break;
				case 5://5为中部居中
				$posX = ($ground_width - $water_width) / 2;
				$posY = ($ground_height - $water_height) / 2;
				break;
			case 6://6为中部居右
				$posX = $ground_width - $water_width - $offset * $set;
				$posY = ($ground_height - $water_height) / 2;
				break;
			case 7://7为底端居左
				$posX = $offset * $set;
				$posY = $ground_height - $water_height;
				break;
			case 8://8为底端居中
				$posX = ($ground_width - $water_width) / 2;
				$posY = $ground_height - $water_height;
				break;
			case 9://9为底端居右
				$posX = $ground_width - $water_width - $offset * $set;
				$posY = $ground_height -$water_height;
				break;
			default://随机
				$posX = rand(0,($ground_width - $water_width));
				$posY = rand(0,($ground_height - $water_height));
			    break;
		}
	 
		if($isWaterImage === TRUE) {//图片水印
			imagealphablending($water_im,true); 
            imagealphablending($background_im,true); 
			imagecopy($background_im, $water_im, $posX, $posY, 0, 0, $water_width,$water_height);//拷贝水印到目标文件
		} else { //文字水印
			if( !empty($textColor) && (strlen($textColor)==7) ) {
				$R = hexdec(substr($textColor,1,2));
				$G = hexdec(substr($textColor,3,2));
				$B = hexdec(substr($textColor,5));
			} else {
			    return "text color format mistake";
			}
            $color=imagecolorallocate($background_im, $R, $G, $B);
            $color=0-$color;
			imagettftext($background_im, $textFont, 0, $posX, $posY,$color , $fontfile , $waterText);
	    }
	 
		//生成水印后的图片
		@unlink($backgroundPath);
		switch($background_info[2])//取得背景图片的格式
		{
			case 1:
				imagegif($background_im,$backgroundPath);
				break;
			case 2:
				imagejpeg($background_im,$backgroundPath);
				break;
			case 3:
				imagepng($background_im,$backgroundPath);
				break;
			default:
				die($errorMsg);
		}
		
		if(isset($water_im)) {
			imagedestroy($water_im);
		}
		
		imagedestroy($background_im);
	}

if (PT_MARKPOWER=="true"){
    include PT_DIR.'data/mark.php';
    $mark_arr=explode('|',$pt_mark_where);
    $pt_mark_textstr = iconv('GBK','UTF-8',$pt_mark_textstr);
    for ($i=0;$i<count($mark_arr);$i++){
        $value=$mark_arr[$i];
        if ($pt_mark_type=='pic'){
            imageWaterMark($file,$value,array('type' => 'img', 'path' => $pt_mark_picurl));
        }else{ 
            imageWaterMark($file,$value,array('type' => 'text', 'content' => $pt_mark_textstr, 'textColor' => $pt_mark_textcolor, 'textFont' => $pt_mark_textsize));
        }        
    }
    
}


?>