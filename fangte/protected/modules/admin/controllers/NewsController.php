<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsController
 *
 * @author Administrator
 */
class NewsController extends CController{
       //put your code here
     public $layout=false;
     
     //新闻分类列表
     public function actionClass()
     {
         $result = pages::init("SELECT class_id,class_name FROM news_class order by class_id desc");
         $this->render('class',array('post'=>$result['posts'],'pages'=>$result['pages']));
     }
     
      //添加编辑新闻类型
     public function actionAddclass()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(!empty ($id))
         {
             $info = Yii::app()->db->createCommand("SELECT class_id,class_name FROM news_class WHERE class_id=:class_id")->queryRow(true,array(':class_id'=>$id));
              $this->render('addclass',array('info'=>$info));
         }
         else{
             $this->render('addclass');
         }
         
     }
     
     //保存新闻类型
     public function actionActaddclass()
     {
         $class_name = $_REQUEST['class_name'];
         $class_id = $_REQUEST['class_id'];
         if(!empty ($class_id))
         {
             Yii::app()->db->createCommand("UPDATE news_class SET class_name='{$class_name}' WHERE class_id='{$class_id}'")->execute();
             Os::prompt('编辑成功', $this->createUrl('news/class'));
         }
         Yii::app()->db->createCommand("INSERT INTO news_class(class_name) VALUES('{$class_name}')")->execute();
         Os::prompt('添加成功', $this->createUrl('news/class'));
     }
     
      //删除新闻类型
     public function actionDelclass()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)){ Os::prompt('数据错误', $this->createUrl('news/class'));}
         if(!is_numeric($id)){ Os::prompt('数据错误', $this->createUrl('news/class'));}
         $row = Yii::app()->db->createCommand("SELECT * FROM news_class WHERE class_id=:class_id")->queryRow(true,array(':class_id'=>$id));
         if(empty ($row)){Os::prompt('数据错误', $this->createUrl('news/class'));}
         Yii::app()->db->createCommand("DELETE FROM  news_class WHERE class_id=:class_id")->execute(array(':class_id'=>$id));
         Os::prompt('删除成功', $this->createUrl('news/class'));
     }
     
     //新闻列表
     public function actionList()
     {
         $reuslt = pages::init("SELECT news_id,news_name,news_addtime,news_updatetime,news_click,class_name FROM news as a inner join news_class as s on a.news_class_id=s.class_id order by news_id desc");
         $this->render('list',array('post'=>$reuslt['posts'],'pages'=>$reuslt['pages']));
     }
     
      public function actionAdd()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         $class = Yii::app()->db->createCommand("SELECT class_name,class_id FROM news_class")->queryAll();
         if(!empty ($id))
         {
             $info = Yii::app()->db->createCommand("SELECT news_name,news_id,news_class_id,news_addtime,news_updatetime,news_click,news_content FROM news WHERE news_id=:news_id")->queryRow(true,array(':news_id'=>$id));
              $this->render('addnews',array('info'=>$info,'class'=>$class));
         }
         else{
             $this->render('addnews',array('class'=>$class));
         }
     }
     
      //保存新闻
     public function actionActadnews()
     {
         $news_id = $_REQUEST['news_id'];
         $news_name = $_REQUEST['news_name'];
         $news_class_id = $_REQUEST['news_class_id'];
         $news_addtime = strtotime($_REQUEST['news_addtime']);
         $news_updatetime = strtotime($_REQUEST['news_updatetime']);
         $news_click = $_REQUEST['news_click'];
         $news_content = $_REQUEST['news_content'];
         if(!empty ($news_id))
         {
             Yii::app()->db->createCommand("UPDATE news SET news_name='{$news_name}',news_class_id='{$news_class_id}',news_addtime='{$news_addtime}',news_updatetime='{$news_updatetime}',news_click='{$news_click}',news_content='{$news_content}' WHERE news_id='{$news_id}'")->execute();
             Os::prompt('编辑成功', $this->createUrl('news/list'));
         }
         Yii::app()->db->createCommand("INSERT INTO news(news_name,news_class_id,news_addtime,news_updatetime,news_click,news_content) VALUES('{$news_name}','{$news_class_id}','{$news_addtime}','{$news_updatetime}','{$news_click}','{$news_content}')")->execute();
         Os::prompt('添加成功', $this->createUrl('news/list'));
     }
     

	  //删除新闻
     public function actionDelnews()
     {
         $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : '';
         if(empty ($id)){ Os::prompt('数据错误', $this->createUrl('news/class'));}
         if(!is_numeric($id)){ Os::prompt('数据错误', $this->createUrl('news/class'));}
         $row = Yii::app()->db->createCommand("SELECT * FROM news WHERE news_id=:news_id")->queryRow(true,array(':news_id'=>$id));
         if(empty ($row)){Os::prompt('数据错误', $this->createUrl('news/class'));}
         Yii::app()->db->createCommand("DELETE FROM  news WHERE news_id=:news_id")->execute(array(':news_id'=>$id));
         Os::prompt('删除成功', $this->createUrl('news/list'));
     }
}

?>
