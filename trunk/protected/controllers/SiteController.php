<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		if(Yii::app()->getUser()->getIsGuest())
		{
			$this->redirect(Yii::app()->getUser()->loginUrl);
		}
		$this->render('index');
	}
	
	public function actionLogin()
	{
		if(!Yii::app()->getUser()->getIsGuest())
		{
			$this->redirect(Yii::app()->homeUrl);
		}

		$loginForm = new LoginForm;
		
		if(($post = Yii::app()->getRequest()->getPost('LoginForm')) !== null)
		{
			$loginForm->attributes = $post;

			if($loginForm->process())
			{
				$this->redirect(Yii::app()->homeUrl);
			}
		}

		$this->render('login', array(
			'form'=>$loginForm,
		));
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
