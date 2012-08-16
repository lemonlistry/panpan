<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
        public $layout = '/layouts/column1';
		public $pageTitle;
		public $keyword;
		public $description;
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            //查询方特世界的门票信息  方特世界门票类型默认为1
            $tick_list = Yii::app()->db->createCommand("SELECT ticket_name,ticket_market_price,ticket_shop_price,ticket_id,group_by FROM ticket WHERE ticket_class_id=1 ORDER BY sort")->queryAll();
            //查询方特世界游玩项目
            $pay_list = Yii::app()->db->createCommand("SELECT pay_id,pay_name,pay_image,pay_content,pay_remark  FROM playproject ORDER BY pay_addtime DESC LIMIT 0,6 ")->queryAll();
            //查询周边景点
            $other = Yii::app()->db->createCommand("SELECT other_id,other_name,other_image FROM otherscenic limit 0,4")->queryAll();
            //查询新闻公告
            $new_list = Yii::app()->db->createCommand("SELECT news_id,news_name,news_addtime FROM news WHERE news_class_id=1 order by news_addtime  desc limit 0,5")->queryAll();
            //旅游攻略
            $gonglue = Yii::app()->db->createCommand("SELECT news_id,news_name,news_addtime FROM news WHERE news_class_id=2 order by news_addtime desc limit 0,5")->queryAll();
			$this->pageTitle = '株洲方特欢乐世界-株洲方特欢乐世界门票预订';
			$this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特欢乐世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
            $this->render('index',array('tick_list'=>$tick_list,'pay_list'=>$pay_list,'other'=>$other,'new_list'=>$new_list,'gonglue'=>$gonglue));
	}

        //简介
        public function actionCustom()
        {
			$this->pageTitle = '株洲方特欢乐世界-简介';
			$this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特欢乐世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
            $this->render('custom');
        }
        
        //游玩须知
        public function actionNotes()
        {
			$this->pageTitle = '株洲方特欢乐世界-游玩须知';
			$this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特欢乐世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
            $this->render('notes');
        }
        
        //联系我们
        public function actionAbout()
        {
			$this->pageTitle = '株洲方特欢乐世界-联系我们';
			$this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特欢乐世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
            $this->render('about');
        }
	
	//交通路线
	public function actionRoute()
	{
		$this->pageTitle = '株洲方特欢乐世界-联系我们';
			$this->keyword = '株洲方特,株洲方特欢乐世界,株洲方特欢乐世界门票,株洲方特游乐园,株洲方特欢乐世界门票预订,株洲方特门票,株洲方特一日游';
			$this->description = '株洲方特欢乐世界是一个国际一流的第四代主题公园，提供株洲方特欢乐世界门票预订，株洲方特游乐园包含游玩项目、休闲娱乐及景观项目200多项，株洲方特欢乐世界欢迎您！';
            $this->render('luxian');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
