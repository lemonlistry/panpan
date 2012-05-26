<?php

class DefaultController extends Controller
{
	 public $layout=false;

    public function accessRules() {
        return array(
            array(
                'allow',
                 'actions' => array('Index','Login','Authcode','LoginIn'),
                'users' => array('*'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'users' => array('@'),
            ),
            array('deny', // allow all users to perform 'index' and 'view' actions
                'users' => array('*'),
            )
        );
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionView()
	{
		$this->render('admin_home');
	}
        
         public function actionLogin() {
            $this->render('login');
        }

        public function actionIndex() {
            $this->render('login');
        }
        
        public function actionTop(){
            $this->render('admin_top');
        }
        public function actionRight(){
            $this->render('admin_right');
        }
        
        public function actionMenusupplie(){
            $this->render('menusupplie');
        }
        
        //订单管理菜单
        public function actionOrder(){
            $this->render('order_left');
        }
        
        //客服管理菜单
        public function actionService(){
            $this->render('service_left');
        }
        
        //财务管理菜单
        public function actionFinancial(){
            $this->render('financial_left');
        }
        
        //市场管理菜单
        public function actionTick(){
            $this->render('cityarea_left');
        }
        
        public function actionMessage(){
            $this->render('message');
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

        //验证码
    public function  actionAuthcode(){
        Os::Authcode();
    }
    
    //登陆
    public function actionLoginIn() {
       $params = Os::get_data(array('username'=>1,'password'=>1,'Authcode'=>1,'isSaveUsername'=>0));
       $yzm = Yii::app()->user->authcode;
       if($params['Authcode'] != $yzm){
           echo "-1";exit;;//验证码不正确
       }
       $row = Yii::app()->db->createCommand("SELECT `user_id` FROM admin_user WHERE `user_name`=:username AND password=:password")->queryRow(true,array(':password'=>md5($params['password']),':username'=>$params['username']));
       if(empty ($row)){
           echo '-2';exit;//用户名或密码不正确
       }
       if($params['isSaveUsername'] =='1'){
           $cookie_username = new CHttpCookie('username',$params['username']);
           $cookie_username->expire = time()+60*60*7;
           Yii::app()->request->cookies['username'] = $cookie_username;
           
           $cookie_password = new CHttpCookie('passoword',  md5($params['password']));
           $cookie_password->expire = time()+60*60*7;
           Yii::app()->request->cookies['password'] = $cookie_password;
       }
       $d = new UserIdentity($params['username'],  md5($params['password']));
        Yii::app()->user->login($d, 3600 * 30 * 24);
       Yii::app()->user->setState('uid',$row['user_id']);
       Yii::app()->user->setState('username',$params['username']);
      echo '1';
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