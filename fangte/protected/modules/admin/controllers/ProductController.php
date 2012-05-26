<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductComtroller
 *
 * @author Administrator
 */
class ProductController  extends Controller{
    //put your code here
     public $layout=false;
     
     //娱乐设施列表
     public function actionList()
     {
         $result = pages::init("SELECT pay_name,pay_addtime,pay_updatetime,pay_click,pay_id FROM playproject ORDER BY pay_id DESC");
         $this->render('list',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     
     //添加娱乐设施
     public function actionAdd()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         
         if(!empty ($id))
         {
             $pay = Yii::app()->db->createCommand("SELECT pay_id,pay_name,pay_image,pay_addtime,pay_updatetime,pay_click,pay_content,pay_remark,keyword,description FROM playproject WHERE pay_id=".$id)->queryRow();
              $this->render('addpay',array('info'=>$pay));
         }
         else{
             $this->render('addpay');
         }
     }
     
      //保存娱乐设施
     public function actionActaddpay()
     {
         $pay_id = $_REQUEST['pay_id'];
         $pay_name = $_REQUEST['pay_name'];
         $pay_addtime = strtotime($_REQUEST['pay_addtime']);
         $pay_updatetime = strtotime($_REQUEST['pay_updatetime']);
         $pay_click = $_REQUEST['pay_click'];
		 $description = $_REQUEST['description'];
		 $keyword = $_REQUEST['keyword'];
         $pay_content = $_REQUEST['pay_content'];
	 $pay_remark = $_REQUEST['pay_remark'];
         $dir = '/var/www/panpan/fangte/upload/pay/';
         $pay_images = '';
         if(isset ($_FILES['pay_image']) && !empty ($_FILES['pay_image']['name']))
         {
             $new_name = microtime(true) . rand(1, 1000) . '.' . substr($_FILES['pay_image']['name'], -3);
             $pay_images = '/upload/pay/'.$new_name;
             move_uploaded_file($_FILES['pay_image']['tmp_name'], $dir.$new_name);
         }
         if(!empty ($pay_id))
         {
             Yii::app()->db->createCommand("UPDATE playproject SET pay_name='{$pay_name}',pay_addtime='{$pay_addtime}',pay_updatetime='{$pay_updatetime}',pay_click='{$pay_click}',pay_content='{$pay_content}',pay_remark='{$pay_remark}',keyword='{$keyword}',description='{$description}' WHERE pay_id='{$pay_id}'")->execute();
             if(!empty ($pay_images)){
                 Yii::app()->db->createCommand("UPDATE playproject SET pay_image='{$pay_images}' WHERE  pay_id='{$pay_id}'")->execute();
             }
             Os::prompt('编辑成功', $this->createUrl('product/list'));
         }
         Yii::app()->db->createCommand("INSERT INTO playproject(pay_name,pay_image,pay_addtime,pay_updatetime,pay_click,pay_content,pay_remark,keyword,description) VALUES('{$pay_name}','{$pay_images}','{$pay_addtime}','{$pay_updatetime}','{$pay_click}','{$pay_content}','{$pay_remark}','{$keyword}','{$description}')")->execute();
         Os::prompt('添加成功', $this->createUrl('product/list'));
     }
     
     //删除 娱乐设施
     public function actionDelpay()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)){ Os::prompt('数据错误', $this->createUrl('product/list'));}
         if(!is_numeric($id)){ Os::prompt('数据错误', $this->createUrl('product/list'));}
         $row = Yii::app()->db->createCommand("SELECT * FROM playproject WHERE pay_id=:pay_id")->queryRow(true,array(':pay_id'=>$id));
         if(empty ($row)){Os::prompt('数据错误', $this->createUrl('product/list'));}
         Yii::app()->db->createCommand("DELETE FROM  playproject WHERE pay_id=:pay_id")->execute(array(':pay_id'=>$id));
         Os::prompt('删除成功', $this->createUrl('product/list'));
     }
     
     //其他景点列表
     public function actionOther()
     {
         $result = pages::init("SELECT other_id,other_name,other_addtime,other_updatetime,other_click,other_content FROM otherscenic ORDER BY other_id DESC");
         $this->render('otherlist',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     
     //添加其他景点
     public function actionAddother()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         $class = Yii::app()->db->createCommand("SELECT class_name,class_id FROM ticket_class")->queryAll();
         if(!empty ($id))
         {
             $pay = Yii::app()->db->createCommand("SELECT other_id,other_name,other_addtime,other_updatetime,other_click,other_content,ticket_class_id,other_remark,keyword,description FROM otherscenic WHERE other_id=".$id)->queryRow();
              $this->render('addother',array('info'=>$pay,'class'=>$class));
         }
         else{
             $this->render('addother',array('class'=>$class));
         }
     }
     
      //保存其他景点
     public function actionActaddother()
     {
         $other_id = $_REQUEST['other_id'];
         $other_name = $_REQUEST['other_name'];
         $ticket_class_id = $_REQUEST['ticket_class_id'];
         $other_addtime = strtotime($_REQUEST['other_addtime']);
         $other_updatetime = strtotime($_REQUEST['other_updatetime']);
         $other_click = $_REQUEST['other_click'];
         $other_content = $_REQUEST['other_content'];
	 $other_remark = $_REQUEST['other_remark'];
	$description = $_REQUEST['description'];
	$keyword = $_REQUEST['keyword'];
         $dir = '/var/www/panpan/fangte/upload/other/';
         $pay_images = '';
         if(isset ($_FILES['other_image']) && !empty ($_FILES['other_image']['name']))
         {
             $new_name = microtime(true) . rand(1, 1000) . '.' . substr($_FILES['other_image']['name'], -3);
             $pay_images = '/upload/other/'.$new_name;
             move_uploaded_file($_FILES['other_image']['tmp_name'], $dir.$new_name);
         }
         if(!empty ($other_id))
         {
             Yii::app()->db->createCommand("UPDATE otherscenic SET other_name='{$other_name}',other_remark='{$other_remark}',ticket_class_id='{$ticket_class_id}',other_addtime='{$other_addtime}',other_updatetime='{$other_updatetime}',other_click='{$other_click}',other_content='{$other_content}',keyword='{$keyword}',description='{$description}'  WHERE other_id='{$other_id}'")->execute();
             if(!empty ($pay_images)){
                 Yii::app()->db->createCommand("UPDATE otherscenic SET other_image='{$pay_images}' WHERE other_id='{$other_id}'")->execute();
             }
             Os::prompt('编辑成功', $this->createUrl('product/other'));
         }
         Yii::app()->db->createCommand("INSERT INTO otherscenic(other_name,ticket_class_id,other_image,other_addtime,other_updatetime,other_click,other_content,other_remark,keyword,description) VALUES('{$other_name}','{$ticket_class_id}','{$pay_images}','{$other_addtime}','{$other_updatetime}','{$other_click}','{$other_content}','{$other_remark}','{$keyword}','{$description}')")->execute();
         Os::prompt('添加成功', $this->createUrl('product/other'));
     }
     
     //删除 其他景点
     public function actionDelother()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)){ Os::prompt('数据错误', $this->createUrl('product/other'));}
         if(!is_numeric($id)){ Os::prompt('数据错误', $this->createUrl('product/other'));}
         $row = Yii::app()->db->createCommand("SELECT * FROM otherscenic WHERE other_id=:other_id")->queryRow(true,array(':other_id'=>$id));
         if(empty ($row)){Os::prompt('数据错误', $this->createUrl('product/other'));}
         Yii::app()->db->createCommand("DELETE FROM  otherscenic WHERE other_id=:other_id")->execute(array(':other_id'=>$id));
         Os::prompt('删除成功', $this->createUrl('product/other'));
     }
}

?>
