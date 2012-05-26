<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TicketController
 *
 * @author Administrator
 */
class TicketController  extends Controller{
    //put your code here
     public $layout=false;
     
     //门票类型列表
     public function actionClass()
     {
         $result = pages::init("SELECT class_id,class_name FROM ticket_class");
         $this->render('class',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     
     //添加编辑门票类型
     public function actionAddclass()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(!empty ($id))
         {
             $info = Yii::app()->db->createCommand("SELECT class_id,class_name,class_content,keyword,description FROM ticket_class WHERE class_id=:class_id")->queryRow(true,array(':class_id'=>$id));
              $this->render('addclass',array('info'=>$info));
         }
         else{
             $this->render('addclass');
         }
         
     }
     
     //保存门票类型
     public function actionActaddclass()
     {
         $class_name = $_REQUEST['class_name'];
         $class_content = $_REQUEST['content'];
		 $description = $_REQUEST['description'];
		 $keyword = $_REQUEST['keyword'];
         $class_id = $_REQUEST['class_id'];
         if(!empty ($class_id))
         {
             Yii::app()->db->createCommand("UPDATE ticket_class SET class_name='{$class_name}',class_content=:class_content,keyword='{$keyword}',description='{$description}' WHERE class_id='{$class_id}'")->execute(array(':class_content'=>$class_content));
             Os::prompt('编辑成功', $this->createUrl('ticket/class'));
         }
         Yii::app()->db->createCommand("INSERT INTO ticket_class(class_name,class_content,keyword,description) VALUES('{$class_name}','{$class_content}','{$keyword}','{$description}')")->execute();
         Os::prompt('添加成功', $this->createUrl('ticket/class'));
     }
     
     
     //删除门票类型
     public function actionDelclass()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)){ Os::prompt('数据错误', $this->createUrl('ticket/class'));}
         if(!is_numeric($id)){ Os::prompt('数据错误', $this->createUrl('ticket/class'));}
         $row = Yii::app()->db->createCommand("SELECT * FROM ticket_class WHERE class_id=:class_id")->queryRow(true,array(':class_id'=>$id));
         if(empty ($row)){Os::prompt('数据错误', $this->createUrl('ticket/class'));}
         Yii::app()->db->createCommand("DELETE FROM  ticket_class WHERE class_id=:class_id")->execute(array(':class_id'=>$id));
         Os::prompt('门票类型删除成功', $this->createUrl('ticket/class'));
     }
     //门票列表
     public function actionList()
     {
         $result = pages::init('SELECT ticket_id,ticket_name,ticket_market_price,ticket_shop_price,ticket_paystate,class_name FROM ticket AS a INNER JOIN ticket_class AS s ON a.ticket_class_id=s.class_id');
         $this->render('ticket',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     
     public function actionAddticket()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         $class = Yii::app()->db->createCommand("SELECT class_name,class_id FROM ticket_class")->queryAll();
         if(!empty ($id))
         {
             $info = Yii::app()->db->createCommand("SELECT ticket_id,ticket_name,ticket_market_price,ticket_shop_price,ticket_class_id,ticket_paystate FROM ticket WHERE ticket_id=:ticket_id")->queryRow(true,array(':ticket_id'=>$id));
              $this->render('addticket',array('info'=>$info,'class'=>$class));
         }
         else{
             $this->render('addticket',array('class'=>$class));
         }
     }
     
      //保存门票
     public function actionActadticket()
     {
         $ticket_id = $_REQUEST['ticket_id'];
         $ticket_name = $_REQUEST['ticket_name'];
         $ticket_market_price = $_REQUEST['ticket_market_price'];
         $ticket_shop_price = $_REQUEST['ticket_shop_price'];
         $ticket_class_id = $_REQUEST['ticket_class_id'];
         $ticket_paystate = $_REQUEST['ticket_paystate'];
         if(!empty ($ticket_id))
         {
             Yii::app()->db->createCommand("UPDATE ticket SET ticket_name='{$ticket_name}',ticket_market_price='{$ticket_market_price}',ticket_shop_price='{$ticket_shop_price}',ticket_class_id='{$ticket_class_id}',ticket_paystate='{$ticket_paystate}' WHERE ticket_id='{$ticket_id}'")->execute();
             Os::prompt('编辑成功', $this->createUrl('ticket/list'));
         }
         Yii::app()->db->createCommand("INSERT INTO ticket(ticket_name,ticket_market_price,ticket_shop_price,ticket_class_id,ticket_paystate) VALUES('{$ticket_name}','{$ticket_market_price}','{$ticket_shop_price}','{$ticket_class_id}','{$ticket_paystate}')")->execute();
         Os::prompt('添加成功', $this->createUrl('ticket/list'));
     }
     
     //删除门票
     public function actionDelticket()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)){ Os::prompt('数据错误', $this->createUrl('ticket/list'));}
         if(!is_numeric($id)){ Os::prompt('数据错误', $this->createUrl('ticket/list'));}
         $row = Yii::app()->db->createCommand("SELECT * FROM ticket WHERE ticket_id=:ticket_id")->queryRow(true,array(':ticket_id'=>$id));
         if(empty ($row)){Os::prompt('数据错误', $this->createUrl('ticket/list'));}
         Yii::app()->db->createCommand("DELETE FROM  ticket WHERE ticket_id=:ticket_id")->execute(array(':ticket_id'=>$id));
         Os::prompt('门票删除成功', $this->createUrl('ticket/list'));
     }
}

?>
