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

    //短信接口账号密码
    const username = 'Glan';
    const password = '888888';
    //请求url
    private $request_task_url ='';
    private $request_sms_url ='';
    
    /**
     * 构造方法 初始化请求url
     */
    public function __construct(){
        $this->request_task_url = "http://113.106.89.207/websms/admin/sms_stat_task.jsp?username=".self::username."&password=".self::password."";
        $this->request_sms_url = "http://113.106.89.207/websms/admin/sms_stat_phn.jsp?username=".self::username."&password=".self::password."";
    }

    /**
     * 发送短信
     * param string $content 短信内容
     * param string $phones 接收短信的电话号码，支持多个 【example：13751060276;13751060276】
     * return string
     */
    public static function sendSms($content,$phones){
        set_time_limit(100);
        if(empty($content) || empty($phones)){
            return '-1001';//参数信息错误
        }
        $content = iconv('UTF-8', 'GB2312', $content);
        $ch = curl_init();
        //获取任务ID
        $task_url = "http://113.106.89.207/websms/admin/sms_stat_task.jsp?username=".self::username."&password=".self::password."" . "&sms=" . urlencode($content);
        curl_setopt($ch, CURLOPT_URL, $task_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $task_id = curl_exec($ch);
        $task_id = trim($task_id);
        //发送短信
        $send_url = "http://113.106.89.207/websms/admin/sms_stat_phn.jsp?username=".self::username."&password=".self::password."". "&taskid={$task_id}&phones={$phones}";
        curl_setopt($ch, CURLOPT_URL, $send_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}


?>
