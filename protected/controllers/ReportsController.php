<?php

class ReportsController extends AuthenticatedController
{
	public function init()
	{
		parent::init();
		if(!Yii::app()->user->hasRole('teacher'))
		{
			$this->redirect(array('/site/index'));
		}

		Layout::addBlock('sidebar.left', array(
				'id'=>'profile_sidebar',
				'content'=>$this->widget('ProfileWidget', array('userModel'=>Yii::app()->getUser()->getModel()), true),
		));
	}
	public function actionIndex()
	{

		if(Yii::app()->getUser()->hasRole('teacher'))
		{

		}
		else if(Yii::app()->getUser()->hasRole('student'))
		{

		}
		else
		{
			$this->render('//misc/unavailable',array('messageTitle'=>"Page Not Found",'message'=>'The page you requested could not be found.'));
		}
		$this->render('index');
	}

	public function actionView()
	{
		if(isset($_REQUEST['code']))
		{
			if($model = Course::model()->with('category')->findByPk(trim($_REQUEST['code'])))
			{
	
				$this->render('view', array('model'=>$model,));
				Yii::app()->end();
			}
			else
			{
				$this->render('//misc/unavailable', array('messageTitle'=>'Page Not Found',
						'message'=>'The requested page does not exist.',
				));
				Yii::app()->end();
			}
		}
		$this->render('//misc/unavailable', array('messageTitle'=>'Page Not Found',
				'message'=>'The requested page does not exist.',
		));
		Yii::app()->end();
	
		//Yii::app()->getUser()
	}	
	public function actionCategories()
	{
		if(isset($_REQUEST['id']))
		{
			if($model = Category::model()->with('courseCount')->findByPk(trim($_REQUEST['id'])))
			{
				$this->render('_category_view', array('model'=>$model));
				Yii::app()->end();
			}
			else
			{
				$this->render('//misc/unavailable', array('messageTitle'=>'Page Not Found',
						'message'=>'The requested page does not exist.',
				));
				Yii::app()->end();
			}	
		}
		
		$categories = Category::model()->with('courseCount')->findAll();
		if($categories)
		{
			$this->render('categories',array('categories'=>$categories));
		}
	}
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}