<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestCommand
 *
 * @author Administrator
 */
class TestCommand extends CConsoleCommand{
    //put your code here
	private $pidfile = null;
	public function beforeAction($action)/*{{{*/
	{
		$pidfile = dirname(__FILE__).'/'.$action;
               
		if(file_exists($pidfile))
		{
			$pid = file_get_contents($pidfile);

			//获取脚本文件名
			$pname = exec("ps up $pid  | awk '{print $12}'");
			#如果進程存在 且 腳本文件名包含user_cookie.php 且 index參數相同
			if(posix_getsid($pid))
			{
				exit();
			}
		}
		file_put_contents($pidfile,posix_getpid());

		$this->pidfile = $pidfile;

		register_shutdown_function(array($this,'cleanFile'));
		return true;
	}/*}}}*/

	public function cleanFile()/*{{{*/
	{
		if($this->pidfile != null)
		{
			@unlink($this->pidfile);
		}
	}/*}}}*/
    //清凉美女
    public function actionQLurl()
    {
        for($i=1;$i<45;$i++)
        {
            if($i==1)
                $url = 'http://www.22mm.cc/mm/qingliang/index.html';
            else
                $url = "http://www.22mm.cc/mm/qingliang/index_{$i}.html";
            echo $url."\n";
            $page = $this->getUrldata($url);
            preg_match_all('/<a href="(.*)" title="(.*)" target="_blank"><img border="0" src="(.*)">.*<\/a>/iUs', $page,$href);
            
             $dir = Yii::app()->basePath . '/../uploadfile/small/2013/01/';
           
            foreach($href[2] as $key=>$val)
            {
                if($key==0)
                    continue;
                $val = trim($val);
                $arr = explode('.',$href[3][$key]);
                ob_start();
                @readfile($href[3][$key]);
                $img = ob_get_contents();
                ob_end_clean();
                $size = strlen($img);
                try {
                    $rand = rand(100000,999999);
                    $fp2 = @fopen($dir.$rand.'.'.$arr[3] , "a");
                    @fwrite($fp2, $img);
                    @fclose($fp2);
                } catch (Exception $exc) {
                     continue;
                }
                $smallurl = '/uploadfile/small/2013/01/'.$rand.'.'.$arr[3];
                
                Yii::app()->db->createCommand("insert into mm_info(title,classid,small) values('{$val}','1','{$smallurl}')")->execute();
                $aid = Yii::app()->db->getLastInsertID();
                Yii::app()->db->createCommand("insert into url(url,infoid) values('{$href[1][$key]}','{$aid}')")->execute();
            }
            sleep(rand(0,5));
        }
        
    }
    
    //惊艳美女
    public function actionJYurl()
    {
        for($i=28;$i<42;$i++)
        {
            if($i==1)
                $url = 'http://www.22mm.cc/mm/jingyan/index.html';
            else
                $url = "http://www.22mm.cc/mm/jingyan/index_{$i}.html";
            echo $url."\n";
            $page = $this->getUrldata($url);
            preg_match_all('/<a href="(.*)" title="(.*)" target="_blank"><img border="0" src="(.*)">.*<\/a>/iUs', $page,$href);
            
             $dir = Yii::app()->basePath . '/../uploadfile/small/2013/01/';
            foreach($href[2] as $key=>$val)
            {
                if($key==0)
                    continue;
                $val = trim($val);
                $arr = explode('.',$href[3][$key]);
                ob_start();
                @readfile($href[3][$key]);
                $img = ob_get_contents();
                ob_end_clean();
                $size = strlen($img);
                try {
                    $rand = rand(10000000,99999999);
                    $fp2 = @fopen($dir.$rand.'.'.$arr[3] , "a");
                    @fwrite($fp2, $img);
                    @fclose($fp2);
                } catch (Exception $exc) {
                     continue;
                }
                $smallurl = '/uploadfile/small/2013/01/'.$rand.'.'.$arr[3];
                
                Yii::app()->db->createCommand("insert into mm_info(title,classid,small) values('{$val}','2','{$smallurl}')")->execute();
                $aid = Yii::app()->db->getLastInsertID();
                Yii::app()->db->createCommand("insert into url(url,infoid) values('{$href[1][$key]}','{$aid}')")->execute();
            }
            sleep(rand(0,5));
        }
        
    }
    
    //美女八卦
    public function actionBGurl()
    {
        for($i=1;$i<36;$i++)
        {
            if($i==1)
                $url = 'http://www.22mm.cc/mm/bagua/index.html';
            else
                $url = "http://www.22mm.cc/mm/bagua/index_{$i}.html";
            echo $url."\n";
            $page = $this->getUrldata($url);
            preg_match_all('/<a href="(.*)" title="(.*)" target="_blank"><img border="0" src="(.*)">.*<\/a>/iUs', $page,$href);
            
             $dir = Yii::app()->basePath . '/../uploadfile/small/2013/01/';
            foreach($href[2] as $key=>$val)
            {
                if($key==0)
                    continue;
                $val = trim($val);
                $arr = explode('.',$href[3][$key]);
                ob_start();
                @readfile($href[3][$key]);
                $img = ob_get_contents();
                ob_end_clean();
                $size = strlen($img);
                try {
                    $rand = rand(10000000,99999999);
                    $fp2 = @fopen($dir.$rand.'.'.$arr[3] , "a");
                    @fwrite($fp2, $img);
                    @fclose($fp2);
                } catch (Exception $exc) {
                     continue;
                }
                $smallurl = '/uploadfile/small/2013/01/'.$rand.'.'.$arr[3];
                
                Yii::app()->db->createCommand("insert into mm_info(title,classid,small) values('{$val}','3','{$smallurl}')")->execute();
                 $aid = Yii::app()->db->getLastInsertID();
                Yii::app()->db->createCommand("insert into url(url,infoid) values('{$href[1][$key]}','{$aid}')")->execute();
            }
            sleep(rand(0,5));
        }
        
    }
    
    //素人美女
    public function actionSRurl()
    {
        for($i=1;$i<32;$i++)
        {
            if($i==1)
                $url = 'http://www.22mm.cc/mm/suren/index.html';
            else
                $url = "http://www.22mm.cc/mm/suren/index_{$i}.html";
            echo $url."\n";
            $page = $this->getUrldata($url);
            preg_match_all('/<a href="(.*)" title="(.*)" target="_blank"><img border="0" src="(.*)">.*<\/a>/iUs', $page,$href);
            
             $dir = Yii::app()->basePath . '/../uploadfile/small/2013/01/';
            foreach($href[2] as $key=>$val)
            {
                if($key==0)
                    continue;
                $val = trim($val);
                $arr = explode('.',$href[3][$key]);
                ob_start();
                @readfile($href[3][$key]);
                $img = ob_get_contents();
                ob_end_clean();
                $size = strlen($img);
                try {
                    $rand = rand(10000000,99999999);
                    $fp2 = @fopen($dir.$rand.'.'.$arr[3] , "a");
                    @fwrite($fp2, $img);
                    @fclose($fp2);
                } catch (Exception $exc) {
                     continue;
                }
                $smallurl = '/uploadfile/small/2013/01/'.$rand.'.'.$arr[3];
                
                Yii::app()->db->createCommand("insert into mm_info(title,classid,small) values('{$val}','4','{$smallurl}')")->execute();
                 $aid = Yii::app()->db->getLastInsertID();
                Yii::app()->db->createCommand("insert into url(url,infoid) values('{$href[1][$key]}','{$aid}')")->execute();
            }
            sleep(rand(0,5));
        }
        
    }
	


	public function actionInfo()
    {
        $row = Yii::app()->db->createCommand("select * from url where is_ok=0")->queryAll();
        foreach($row as $v)
        {
            $url = "http://www.22mm.cc".$v['url'];
            echo $url."\n";
            $page = $this->getUrldata($url);
            preg_match('/<div class="pagelist">(.*)<\/div>/iUs', $page,$pages);
           
            if(!empty($pages))
            {
                 $p = explode('</a>', $pages[1]);
                 $total = count($p)-2;
                 for($j=1;$j<=$total;$j++)
                 {
                     if($j==1)
                         $urls = $url = "http://www.22mm.cc".$v['url'];
                     else
			{
                         $u = explode('.',$v['url']);
                         $urls = $url = "http://www.22mm.cc".$u[0].'-'.$j.'.html';
                     }
                     echo $url."\n";
                     $page = $this->getUrldata($urls);
                     $arr = explode('<script>var arrayImg=new Array();',$page);
                    $a = explode('</script>', $arr[1]);
                    preg_match_all('/\"(.*)\"/iUs', $a[0],$href);
                     $dir = Yii::app()->basePath . '/../uploadfile/img/2013/01/';

                     foreach($href[1] as $val)
                     {
                        $val = str_replace('big','pic',$val);
                         $arr = explode('.',$val);

                            ob_start();
                            @readfile($val);
                            $img = ob_get_contents();
                            ob_end_clean();
                            $size = strlen($img);
                            try {
                                $rand = rand(10000000,99999999);
                                $fp2 = @fopen($dir.$rand.'.'.$arr[3] , "a");
                                @fwrite($fp2, $img);
                                @fclose($fp2);
                            } catch (Exception $exc) {
                                 continue;
                            }
                        $imgurl = '/uploadfile/img/2013/01/'.$rand.'.'.$arr[3];
                        Yii::app()->db->createCommand("insert into mm_img(infoid,imgurl) values('{$v['infoid']}','{$imgurl}')")->execute();
                        Yii::app()->db->createCommand("update url set is_ok=1 where id=".$v['id'])->execute();
                     }
                 }
            }
            else
            {
                $arr = explode('<script>var arrayImg=new Array();',$page);
                $a = explode('</script>', $arr[1]);
                preg_match_all('/\"(.*)\"/iUs', $a[0],$href);
                 $dir = Yii::app()->basePath . '/../uploadfile/img/2013/01/';

                 foreach($href[1] as $val)
                 {
                    $val = str_replace('big','pic',$val);
                     $arr = explode('.',$val);

                        ob_start();
                        @readfile($val);
                        $img = ob_get_contents();
                        ob_end_clean();
                        $size = strlen($img);
                        try {
                            $rand = rand(10000000,99999999);
                            $fp2 = @fopen($dir.$rand.'.'.$arr[3] , "a");
                            @fwrite($fp2, $img);
                            @fclose($fp2);
                        } catch (Exception $exc) {
                             continue;
                        }
                    $imgurl = '/uploadfile/img/2013/01/'.$rand.'.'.$arr[3];
                    Yii::app()->db->createCommand("insert into mm_img(infoid,imgurl) values('{$v['infoid']}','{$imgurl}')")->execute();
                    Yii::app()->db->createCommand("update url set is_ok=1 where id=".$v['id'])->execute();
                 }
            }
            
        }

    }
    private function getUrldata($url)/*{{{*/
	{
		$url = str_replace(' ','+',$url);
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);  //是否抓取跳转后的页面
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$ext = curl_exec($ch); 
		curl_close($ch);
		return $ext;
	}/*}}}*/
}

?>
