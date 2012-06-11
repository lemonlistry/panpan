<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageController
 *
 * @author Administrator
 */
class MessageController extends CController{
    //put your code here
     public $layout=false;
     
     public function actionIndex()
     {
         $result = pages::init("SELECT message_id,message_name,message_addtime,message_title,message_content,message_state,message_mobile FROM message ORDER BY message_id");
         $this->render('index',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     //修改订单
    public function actionEdit()
    {
        $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $state = isset ($_REQUEST['state']) ? $_REQUEST['state'] : '';
        if(empty ($id) || empty ($state)){Os::prompt('数据错误', $this->createUrl('message/index'));}
        $row = Yii::app()->db->createCommand("SELECT * FROM message where message_id = ".$id)->queryRow();
        if(empty ($row)){Os::prompt('数据错误', $this->createUrl('message/index'));}
        Yii::app()->db->createCommand("UPDATE  message SET message_state='{$state}' WHERE message_id=".$id)->execute();
        Os::prompt('编辑成功', $this->createUrl('message/index'));
    }
    
    public function actionComment()
    {
	$comment_list = pages::init("SELECT comment_name,comment_content,add_time,comment_tickname,comment_ticketclassname,state,comment_id from comment order by add_time desc");
	$this->render('comment',array('post'=>$comment_list['posts'],'pages'=>$comment_list['pages']));
    }
    
     //修改订单
    public function actionEditcomment()
    {
        $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $state = isset ($_REQUEST['state']) ? $_REQUEST['state'] : '';
        if(empty ($id) || empty ($state)){Os::prompt('数据错误', $this->createUrl('message/comment'));}
        $row = Yii::app()->db->createCommand("SELECT * FROM comment where comment_id = ".$id)->queryRow();
        if(empty ($row)){Os::prompt('数据错误', $this->createUrl('message/comment'));}
        Yii::app()->db->createCommand("UPDATE  comment SET state='{$state}' WHERE comment_id=".$id)->execute();
        Os::prompt('编辑成功', $this->createUrl('message/comment'));
    }
}

?>
