<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductController
 *
 * @author Administrator
 */
class ProductController extends CController{
    //put your code here
     public $layout = '/layouts/column1';
     public $pageTitle;
	 public $keyword;
	 public $description;
	     //验证码
    public function  actionAuthcode(){
        Os::Authcode();
    }
     //游玩项目
     public function actionIndex()
     {
         $sql = "SELECT pay_name,pay_id,pay_image,pay_content,pay_remark FROM playproject";
         $result = pages::init($sql);
		 $this->pageTitle = '株洲方特欢乐世界-游玩项目';
		 $this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特世界门票预订,株洲方特门票,株洲方特一日游';
		 $this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
         $this->render('index',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     
     //周边景点
     public function actionOther()
     {
		 $this->pageTitle = '株洲方特欢乐世界-周边景点';
		 $this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特世界门票预订,株洲方特门票,株洲方特一日游';
		 $this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
         $sql ="SELECT other_id,other_name,other_image,other_content,other_remark FROM otherscenic";
         $result = pages::init($sql);
         $this->render('zhoubian',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     
     //留言中心
     public function actionMessage()
     {
		 $this->pageTitle = '株洲方特欢乐世界-留言中心';
		 $this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
         $this->render('message');
     }
     
     //门票预订
     public function actionTicketlist()
     {
         //查询所有门票信息
         $tickte_list = array();
         $class = Yii::app()->db->createCommand("SELECT class_id,class_name FROM ticket_class")->queryAll();
         foreach($class as $val)
         {
             $list = Yii::app()->db->createCommand("SELECT ticket_id,ticket_name,ticket_market_price,ticket_shop_price FROM ticket WHERE ticket_class_id=:ticket_class_id")->queryAll(true,array(':ticket_class_id'=>$val['class_id']));
             $tickte_list[] = array($val['class_name'],$list);
         }
		 $this->pageTitle = '株洲方特欢乐世界-门票预订';
		 $this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
         $this->render('ticket',array('list'=>$tickte_list));
     }
     //添加留言
     public function actionAddmessage()
     {
         $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
         $mobile = isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] : '';
         $title = isset($_REQUEST['title']) ? $_REQUEST['title'] : '';
         $content = isset($_REQUEST['content']) ? $_REQUEST['content'] : '';
         if(empty ($username) || empty ($mobile) || empty ($title) || empty ($content)){
             echo json_encode(array('error'=>true,'message'=>'数据错误'));exit;
         }
         if(!is_numeric($mobile)){
             echo json_encode(array('error'=>true,'message'=>'数据错误'));exit;
         }
         $addtime = time();
         Yii::app()->db->createCommand("INSERT INTO message(message_name,message_addtime,message_title,message_content,message_state,message_mobile) VALUES(
                                        '{$username}','{$addtime}','{$title}','{$content}','0','{$mobile}')")->execute();
         echo json_encode(array('error'=>true,'message'=>'感谢您的留言，我们会根据你提交的联系方式尽快与你联系'));exit;
     }
     //新闻资讯
     public function actionNews()
     {
         $id = isset ($_REQUEST['cid']) ? $_REQUEST['cid'] : '1';
         $class = Yii::app()->db->createCommand("SELECT * FROM news_class WHERE class_id=:class_id")->queryRow(true,array(':class_id'=>$id));
         if(empty ($class)){echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         $sql = "SELECT news_id,news_name,news_addtime FROM news WHERE news_class_id = ".$id." ORDER BY news_addtime desc";
         $result = pages::init($sql,20);
		 $this->pageTitle = '株洲方特欢乐世界-新闻资讯';
		 $this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特欢乐世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
         $this->render('news',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     
     //新闻资讯详细内容
     public function actionNewsview()
     {
         
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)) {echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         if(!is_numeric($id)){ echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         $row = Yii::app()->db->createCommand("SELECT * FROM news WHERE news_id=:news_id")->queryRow(true,array(':news_id'=>$id));
         if(empty ($row)) { echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit; }
         $info = Yii::app()->db->createCommand("SELECT news_class_id,news_name,news_addtime,news_updatetime,news_click,news_content,class_name,class_id FROM news as a inner join news_class as s on a.news_class_id = s.class_id WHERE news_id=:news_id")->queryRow(true,array(':news_id'=>$id));
         //查询新闻上一个
         $befor_id = Yii::app()->db->createCommand("SELECT news_id,news_name FROM news WHERE news_id<:id AND news_class_id=:class_id order by news_id desc limit 0,1")->queryRow(true,array(':id'=>$id,':class_id'=>$info['news_class_id']));
         //查询下一个新闻
         $next_id = Yii::app()->db->createCommand("SELECT news_id,news_name FROM news WHERE news_id>:id AND news_class_id=:class_id order by news_id limit 0,1")->queryRow(true,array(':id'=>$id,':class_id'=>$info['news_class_id']));
         Yii::app()->db->createCommand("UPDATE news SET news_click=news_click+1 WHERE news_id=:news_id")->execute(array(':news_id'=>$id));
	 $this->pageTitle = '株洲方特欢乐世界-新闻资讯-'.$info['news_name'];
		 $this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特欢乐世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
         $this->render('news_view',array('info'=>$info,'before'=>$befor_id,'next'=>$next_id));
     }
     
     //游玩项目信息
     public function actionPayinfo()
     {
          $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)) {echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         if(!is_numeric($id)){ echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         $row = Yii::app()->db->createCommand("SELECT * FROM playproject WHERE pay_id=:pay_id")->queryRow(true,array(':pay_id'=>$id));
         if(empty ($row)) { echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit; }
         $info = Yii::app()->db->createCommand("SELECT pay_name,pay_addtime,pay_updatetime,pay_click,pay_content,keyword,description FROM playproject WHERE pay_id=:pay_id")->queryRow(true,array(':pay_id'=>$id));
         //查询上一个
         $befor_id = Yii::app()->db->createCommand("SELECT pay_name,pay_id FROM playproject WHERE pay_id<:id  order by pay_id desc limit 0,1")->queryRow(true,array(':id'=>$id));
         //查询下一个
         $next_id = Yii::app()->db->createCommand("SELECT pay_name,pay_id FROM playproject WHERE pay_id>:id order by pay_id limit 0,1")->queryRow(true,array(':id'=>$id));
         Yii::app()->db->createCommand("UPDATE playproject SET pay_click=pay_click+1 WHERE pay_id=:pay_id")->execute(array(':pay_id'=>$id));
		 $this->pageTitle = '株洲方特欢乐世界-'.$info['pay_name'];
		 $this->keyword = $info['keyword'];
			$this->description = $info['description'];
         $this->render('pay_view',array('info'=>$info,'before'=>$befor_id,'next'=>$next_id));
     }
     
     //周边景点信息
     public function actionOtherinfo()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)) {echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         if(!is_numeric($id)){ echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         $row = Yii::app()->db->createCommand("SELECT * FROM otherscenic WHERE other_id=:other_id")->queryRow(true,array(':other_id'=>$id));
         if(empty ($row)) { echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit; }
         $info = Yii::app()->db->createCommand("SELECT ticket_class_id,other_name,other_addtime,other_updatetime,other_click,other_content,keyword,description  FROM otherscenic WHERE other_id=:other_id")->queryRow(true,array(':other_id'=>$id));
         //查询上一个
         $befor_id = Yii::app()->db->createCommand("SELECT other_name,other_id FROM otherscenic WHERE other_id<:id  order by other_id desc limit 0,1")->queryRow(true,array(':id'=>$id));
         //查询下一个
         $next_id = Yii::app()->db->createCommand("SELECT other_name,other_id FROM otherscenic WHERE other_id>:id order by other_id limit 0,1")->queryRow(true,array(':id'=>$id));
         //查询当前景点的门票
        $tick_list = Yii::app()->db->createCommand("SELECT ticket_paystate,ticket_name,ticket_market_price,ticket_shop_price,ticket_id FROM ticket WHERE ticket_class_id=:class_id")->queryAll(true,array(':class_id'=>$info['ticket_class_id']));
        Yii::app()->db->createCommand("UPDATE otherscenic SET other_click=other_click+1 WHERE other_id=:other_id")->execute(array(':other_id'=>$id));
		 $this->pageTitle = $info['other_name'];
	$this->keyword = $info['keyword'];
                        $this->description = $info['description'];
         $this->render('other_view',array('info'=>$info,'before'=>$befor_id,'next'=>$next_id,'tick_list'=>$tick_list));
     }
     
     public  function actionBooking()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)) {echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         if(!is_numeric($id)){ echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit;}
         $row = Yii::app()->db->createCommand("SELECT * FROM ticket WHERE ticket_id=:ticket_id")->queryRow(true,array(':ticket_id'=>$id));
         if(empty ($row)) { echo "<script>alert('".  json_encode('数据错误')."');history.go(-1);</script>";exit; }
         $ticket_info = Yii::app()->db->createCommand("SELECT ticket_id,ticket_name,ticket_market_price,ticket_shop_price,class_name,class_content,keyword,description FROM ticket AS a INNER JOIN ticket_class AS s ON a.ticket_class_id=s.class_id WHERE ticket_id=:ticket_id")->queryRow(true,array(':ticket_id'=>$id));
		  $this->pageTitle = $ticket_info['class_name'].'门票预订';
		  $this->keyword = $ticket_info['keyword'];
		$this->description = $ticket_info['description'];;
	 $comment_list = pages::init("SELECT comment_name,comment_content,add_time,comment_tickname,comment_ticketclassname from comment where comment_tickid=".$id ." and state=2 order by add_time desc");
         $this->render('booking',array('info'=>$ticket_info,'pages'=>$comment_list['pages'],'comment'=>$comment_list['posts']));
         //$this->render('booking',array('info'=>$ticket_info));
     }
     
     //ajax评论分页
     public function actionAjaxcomment()
     {
         $this->layout = false;
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         $comment_list = pages::init("SELECT comment_name,comment_content,add_time,comment_tickname,comment_ticketclassname from comment where comment_tickid=".$id ." and state=2 order by add_time desc");
         $this->render('comment',array('pages'=>$comment_list['pages'],'comment'=>$comment_list['posts']));
         
     }
     
     //添加评论
     public function actionAddcomment()
     {
	 $id = $_REQUEST['id'];
	 $comment_name = $_REQUEST['comment_name'];
	 $comment_content = $_REQUEST['comment_content'];
	 $authcode_content = $_REQUEST['authcode_content'];
	 $addtime = time();
	 if(Yii::app()->user->authcode!=$authcode_content){echo json_encode(array('error'=>true,'message'=>"验证码错误，请重新输入"));exit;}
	
	 if(!is_numeric($id)) { echo json_encode(array('error'=>true,'message'=>"数据错误"));exit;}
	 
	 $row = Yii::app()->db->createCommand("SELECT ticket_name,class_name FROM ticket as a inner join ticket_class as s on a.ticket_class_id=s.class_id WHERE a.ticket_id=".$id)->queryRow();
	  
	 if(empty($id) || empty($comment_content) || empty($comment_name) || empty($authcode_content) || empty($row))
	 {
	      echo json_encode(array('error'=>true,'message'=>"数据错误"));exit;
	 }
	 Yii::app()->db->createCommand("INSERT INTO comment(comment_name,comment_content,comment_ticketclassname,comment_tickname,comment_tickid,add_time) VALUES(:comment_name,:comment_content,:comment_ticketclassname,:comment_tickname,:comment_tickid,:add_time)")->execute(
		 array(':comment_name'=>$comment_name,':comment_content'=>$comment_content,':comment_ticketclassname'=>$row['class_name'],':comment_tickname'=>$row['ticket_name'],':comment_tickid'=>$id,':add_time'=>$addtime));
	 echo json_encode(array('error'=>false,'message'=>"您的评论已成功，可能需要2-3小时才能生效"));exit;
     }
     public function actionBook()
     {
         $username = isset ($_REQUEST['username']) ? trim($_REQUEST['username']) : '';
         $phone = isset ($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
         $number = isset ($_REQUEST['number']) ? $_REQUEST['number'] : '';
         $starttime = isset ($_REQUEST['addtime']) ? $_REQUEST['addtime'] : '';
         $tid = isset ($_REQUEST['tid']) ? $_REQUEST['tid'] : '';
         if(empty ($username) || empty ($phone) || empty ($number) || empty ($starttime) || empty ($tid))
         {
             echo json_encode(array('error'=>true,'message'=>'信息不能为空'));exit;
         }
         if(!is_numeric($phone)){echo json_encode(array('error'=>true,'message'=>'请填写正确的手机号码'));exit;}
         if(!is_numeric($number)){echo json_encode(array('error'=>true,'message'=>'请填写正确的出游人数'));exit;}
         if(!is_numeric($tid)){echo json_encode(array('error'=>true,'message'=>'数据错误'));exit;}
         $row = Yii::app()->db->createCommand("SELECT a.*,class_name FROM ticket as a inner join ticket_class as s on a.ticket_class_id=s.class_id WHERE ticket_id=:ticket_id")->queryRow(true,array(':ticket_id'=>$tid));
         if(empty ($row)){echo json_encode(array('error'=>true,'message'=>'数据错误'));exit;}
         $addtime = time();
         $starttime = strtotime($starttime);
         //查询最后一个订单号
         $order_sn = Yii::app()->db->createCommand("SELECT order_sn FROM order_list order by order_id DESC")->queryRow();
         $order_number = Os::createnumber($order_sn['order_sn'],'LO');
	$sql = ("INSERT INTO order_list (order_sn,order_ticket_class_id,order_ticket_id,order_mobile,order_username,order_time,order_number,order_state,order_addtime)
                                    VALUES('{$order_number}','{$row['ticket_class_id']}','{$row['ticket_id']}','{$phone}','{$username}','{$starttime}','{$number}','0','{$addtime}')");
         Yii::app()->db->createCommand($sql)->execute();
	$xx = smsApi::sendSms(iconv('UTF-8','GB2312',"{$username}预订{$_REQUEST['addtime']}{$row['class_name']}的门票{$number}张成功,订单号为{$order_number},预订人电话号码为{$phone}"),'13873387887');
         echo json_encode(array('error'=>false,'message'=>'欢迎您预订方特门票，我们已收到您的预订信息，我们工作人员稍晚会与您联系确认！感谢您的支持！'));
     }
}

?>
