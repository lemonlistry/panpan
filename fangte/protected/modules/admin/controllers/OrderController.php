<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrderController
 *
 * @author Administrator
 */
class OrderController  extends CController{
    //put your code here
    public $layout=false;
    
    //订单列表
    public function actionIndex()
    {
        $status = isset ($_REQUEST['status']) ? $_REQUEST['status'] : '0';
        $sql = "SELECT order_id,order_mobile,order_username,order_sn,order_state,order_time,order_number,order_addtime,ticket_name,class_name FROM order_list AS a 
                INNER JOIN ticket AS c ON a.order_ticket_id=c.ticket_id 
                INNER JOIN ticket_class AS s ON a.order_ticket_class_id=s.class_id WHERE order_state=".$status;
        $result = pages::init($sql,20);
        $this->render('index',array('post'=>$result['posts'],'pages'=>$result['pages'],'status'=>$status));
    }
    
    //修改订单
    public function actionEdit()
    {
        $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $state = isset ($_REQUEST['state']) ? $_REQUEST['state'] : '';
        if(empty ($id) || empty ($state)){Os::prompt('数据错误', $this->createUrl('order/index'));}
        $row = Yii::app()->db->createCommand("SELECT * FROM order_list where order_id = ".$id)->queryRow();
        if(empty ($row)){Os::prompt('数据错误', $this->createUrl('order/index'));}
        Yii::app()->db->createCommand("UPDATE  order_list SET order_state='{$state}' WHERE order_id=".$id)->execute();
        Os::prompt('编辑成功', $this->createUrl('order/index'));
    }

	//删除订单
	public function actionDel()
	{
		$id = isset($_REQUEST['id']) ? $_REQUEST['id']: '';
		$status = $_REQUEST['status'];
		 if(empty ($id)){Os::prompt('数据错误', $this->createUrl('order/index'));}
       		 $row = Yii::app()->db->createCommand("SELECT * FROM order_list where order_id = ".$id)->queryRow();
       		 if(empty ($row)){Os::prompt('数据错误1', $this->createUrl('order/index'));}
		Yii::app()->db->createCommand("DELETE FROM order_list WHERE order_id=".$id)->execute();
		 Os::prompt('删除成功', $this->createUrl('order/index?status='.$status));

	}
}

?>
