<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/regis.css" rel="stylesheet" type="text/css" />
<title>提示信息</title>
<style type="text/css">
/***********************提示页面样式***********************************/
.Prompt{ width:980px;  margin:0px auto; height:auto;}
.Prompt .prnternal{ margin:20px 0px; padding:0px 200px; width:580px; float:left; height:auto;}
.Prompt .prnternal .prnt_image{width:580px; float:left; text-align:center;}
.Prompt .prnternal .prnt_font{width:580px; float:left;  font-size:14px; color:#F00; font-weight:bold; text-align:center; height:35px; line-height:35px;}
.Prompt .prnternal .prnt_bottom{width:580px; text-align:center; float:left; height:30px; line-height:30px; font-size:12px;}
.Prompt .prnternal .prnt_bottom a { color:#999;}
</style>
</head>

<body>
<div class="Prompt">
<div class="prnternal">
         <div class="prnt_image"><img src="<?= Yii::app()->request->baseUrl;?>/images/pronew.gif" /></div>
         <div class="prnt_font"><?= $mess;?></div>
         <div class="prnt_bottom"><a href="<?php
if ($url == 1) {
    echo "javascript:history.go(-1)";
} else {
    echo $url;
}
?>">如浏览器不支持，请点击跳转......<font id="s">3</font>秒后自动跳转</a></div>
</div>
</div>
	<script type='text/javascript'>
            var url="<?= $url; ?>";
            var timelimit=3;
            function gourl(){
                if(timelimit>0){
                    timelimit=timelimit-1;
                    document.getElementById('s').innerHTML=timelimit;
                    setTimeout('gourl()',1000);
                }else{
                    if(url==1){
                        history.go(-1);
                    }else{
                        window.location.href=url;
                    }
                }
        
        
            }
            window.onload=gourl;
        </script>
	</script>
</body>
</html>
