<?php

class CourseController extends Controller
{
	public function init()
	{
		parent::init();
		if(!Yii::app()->getUser()->getIsGuest())
		{
			Layout::addBlock('sidebar.left', array(
					'id'=>'profile_sidebar',
					'content'=>$this->widget('ProfileWidget', array('userModel'=>Yii::app()->getUser()->getModel()), true),
			));
		}
	}
	public function actionIndex()
	{
		$this->render('index');
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