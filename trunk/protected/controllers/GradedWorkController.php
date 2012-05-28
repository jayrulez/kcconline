<?php

class GradedWorkController extends AuthenticatedController
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
		
		$criteria = new CDbCriteria;
		
		if(Yii::app()->getUser()->hasRole('teacher'))
		{
			
			$criteria->join = "inner join course_graded_work on course_graded_work.graded_work_id = uid ";
			$criteria->join.= "inner join course_instructor on course_instructor.course_code = course_graded_work.course_code";
			
			$criteria->condition = "course_instructor.user_id=:user_id";
			$criteria->params = array(':user_id'=>Yii::app()->getUser()->getId());
			
			//$userCourses = CourseInstructor::model()->with('course')->findAll($criteria);
			//var_dump($userCourses);die();
			
			$gradedWorkFeeds = GradedWork::model()->with(array('courseGradedWork','createdBy','workType'))->findAll($criteria);
			var_dump($gradedWorkFeeds);die();
		}
		else if('student')
		{
			
		}
		
		//var_dump($gradedWorkFeeds);die();
		

		$this->render('index');
	}
	
	public function actionCreate()
	{
		$model = new GradedWork();
		$model->createdBy = new User();
		$model->courseGradedWork = new CourseGradedWork();
		$model->scenario = 'create';
		
		if(isset($_POST['GradedWork']))
		{
			$model->attributes = $_POST['GradedWork'];
			$model->courseGradedWork->attributes = $_POST['CourseGradedWork'];
			//$model->createdBy->attributes = $_POST['User'];
			//var_dump($model->courseGradedWork->graded_work_id);die();
		
			
			$model->datetime_created = new CDbExpression('now()');
			$model->created_by = Yii::app()->getUser()->getId();
			
			try
			{
				$transaction=GradedWork::model()->dbConnection->beginTransaction();
			
				if($model->save())
				{
					$model->courseGradedWork->graded_work_id = $model->uid;
					
					if($model->courseGradedWork->save())
					{
						$transaction->commit();
						
						Yii::app()->user->setFlash('success', 'The Graded Work was created successfully.');
						$model->refresh();
						
						$this->render('view',array('model'=>$model));
						Yii::app()->end();
					}
					else 
					{
						$transaction->rollback();
					}
				}
			}
			catch(Exception $ex)
			{
				if($transaction->getActive())
				{
					$transaction->rollback();
				}
			}
			//var_dump($model->attributes);die();
		}
		$this->render('create',array('model'=>$model,'courseGradedWork'=>$model->courseGradedWork,'createdBy'=>$model->createdBy));
	}

	/*
	public function actionUpdate()
	{
		$model = new GradedWork();
		$model->createdBy = new User();
		$model->courseGradedWork = new CourseGradedWork();
		$model->scenario = 'create';
	
		if(isset($_POST['GradedWork']))
		{
			$model->attributes = $_POST['GradedWork'];
			$model->courseGradedWork->attributes = $_POST['CourseGradedWork'];
			//$model->createdBy->attributes = $_POST['User'];
			//var_dump($model->courseGradedWork->graded_work_id);die();
	
				
			$model->datetime_created = new CDbExpression('now()');
			$model->created_by = Yii::app()->getUser()->getId();
				
			try
			{
				$transaction=GradedWork::model()->dbConnection->beginTransaction();
					
				if($model->save())
				{
					$model->courseGradedWork->graded_work_id = $model->uid;
						
					if($model->courseGradedWork->save())
					{
						$transaction->commit();
	
						Yii::app()->user->setFlash('success', 'The Graded Work was created successfully.');
						$model->refresh();
	
						$this->render('view',array('model'=>$model));
						Yii::app()->end();
					}
					else
					{
						$transaction->rollback();
					}
				}
			}
			catch(Exception $ex)
			{
				if($transaction->getActive())
				{
					$transaction->rollback();
				}
			}
			//var_dump($model->attributes);die();
		}
		$this->render('create',array('model'=>$model,'courseGradedWork'=>$model->courseGradedWork,'createdBy'=>$model->createdBy));
	}
	*/
	
	public function actionView()
	{
		if(isset($_REQUEST['id']))
		{		
			if($model = GradedWork::model()->with('createdBy','workType','courseGradedWork')->findByPk(trim($_REQUEST['id'])))
			{
				
				$this->render('view', array('model'=>$model,));
				Yii::app()->end();
			}
			else
			{
				$this->render('//error/index', array('code'=>404,
						'message'=>'The requested page does not exist.',
				));
				Yii::app()->end();
			}
		}
		$this->render('//error/index', array('code'=>404,
				'message'=>'The requested page does not exist.',
		));
		Yii::app()->end();
	
		//Yii::app()->getUser()
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