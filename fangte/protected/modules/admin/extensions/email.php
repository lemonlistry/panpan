<?php
class email{
    /**
     * @param string $email_url 收件人地址
     * @param string $content 内容
     * @param string $emial_type 邮件主题
     * **/
    public static function email_send($email_url,$content,$email_title){
        require_once("phpmailer.php"); 
        $mail = new PHPMailer();
        $mail->IsSMTP();                 // 启用SMTP
        $mail->Host = "smtp.qq.com";           //SMTP服务器
        $mail->SMTPAuth = true;                  //开启SMTP认证
        $mail->Username = "68026166@qq.com";            // SMTP用户名
        $mail->Password = "2011lelike";                // SMTP密码

        $mail->From = "service@lelike.com";            //发件人地址
        $mail->FromName = '邻里客';              //发件人
		$mail->FromName = "=?UTF-8?B?".base64_encode($mail->FromName)."?=";  
        $mail->AddAddress($email_url); //添加收件人
        $mail->WordWrap = 50;                    //设置每行字符长度
        $mail->IsHTML(true);                 // 是否HTML格式邮件

        $mail->Subject = $email_title;          //邮件主题
		$mail->Subject = "=?UTF-8?B?".base64_encode($mail->Subject)."?=";  
		$arr = explode('@',$email_url);
		if($arr[1]=='163.com' ||$arr[1]=='126.com'){
			$mail->CharSet = "UTF-8"; 
			$mail->Body    =  $content;      //邮件内容
		}else{
			$mail->Body    = iconv("UTF-8","GB2312", $content);      //邮件内容
		}
        $mail->Send();
     
      
    }
}
    

?>
