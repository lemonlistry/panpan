<title>程序路径校验</title>
此文件用于校验程序路径是否正确，请检测下面2种方式获取的路径是否和后台的一致。<br />
若不一致请复制一个到后台目录。如果下面2个获取的不同，请联系我们。<br />
方法一：<?php echo str_replace('\\','/',str_replace('plus/check','',str_replace('plus\check','',dirname(__FILE__))));?><br>
方法二：<?php echo str_replace('\\','/',str_replace('plus/check/dircheck.php','',str_replace('plus\check\dircheck.php','',$_SERVER["SCRIPT_FILENAME"])));?>