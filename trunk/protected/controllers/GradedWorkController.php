<?php

class GradedWorkController extends AuthenticatedController
{
	public function init()
	{
		parent::init();
		if(Yii::app()->user->hasRole('teacher') || Yii::app()->user->hasRole('student'))
		{

		}
		else 
		{
			$this->render('//misc/unavailable', array('messageTitle'=>'Page Not Found',
					'message'=>'The requested page wast not found.',));
			Yii::app()->end();
		}
		Layout::addBlock('sidebar.left', array(
				'id'=>'profile_sidebar',
				'content'=>$this->widget('ProfileWidget', array('userModel'=>Yii::app()->getUser()->getModel()), true),
		));
	}
	
	public function actionGrade()
	{	
		if(isset($_REQUEST['work']) && isset($_REQUEST['student']))
		{
			if($model = UserGradedWork::model()->with('student','gradedBy','gradedWork','letterGrade')->findByAttributes(array('user_id'=>trim($_REQUEST['student']),'graded_work_id'=>trim($_REQUEST['work']))))
			{
				$userGradedWork = new UserGradedWork;
				
				if(isset($_POST['UserGradedWork']))
				{
					$model->attributes = $model->attributes;
					$model->raw_grade = $_POST['UserGradedWork']['raw_grade'];
					$model->datetime_graded = $_POST['UserGradedWork']['datetime_graded'];
					$model->datetime_entered = new CDbExpression('now()');
					$model->graded_by = Yii::app()->getUser()->getId();
					
					$tempStatus = $model->graded_status;
					$model->graded_status = 'Graded';
					
					if($model->save())
					{
						Yii::app()->user->setFlash('success', 'The Graded Work was graded and saved successfully.');
						$model->refresh();
						
						$this->render('studentview', array('model'=>$model,));
						Yii::app()->end();
					}
					else
					{
						$model->graded_status = $tempStatus;
					}					
				}
				
				$this->render('_grade_form', array('model'=>$model));
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
			$this->render('_gradedwork_feed',array('gradedWorks'=>$gradedWorkFeeds));
			Yii::app()->end();
		}
		else if(Yii::app()->getUser()->hasRole('student'))
		{
			
			$criteria->join = "inner join course_graded_work on course_graded_work.graded_work_id = uid ";
			$criteria->join.= "inner join user_course_enrollment on user_course_enrollment.course_code = course_graded_work.course_code";
				
			$criteria->condition = "user_course_enrollment.user_id=:user_id";
			$criteria->params = array(':user_id'=>Yii::app()->getUser()->getId());
				
			//$userCourses = CourseInstructor::model()->with('course')->findAll($criteria);
			//var_dump($userCourses);die();
				
			$gradedWorkFeeds = GradedWork::model()->with(array('courseGradedWork','createdBy','workType'))->findAll($criteria);
			$this->render('_gradedwork_feed',array('gradedWorks'=>$gradedWorkFeeds));
			Yii::app()->end();
		}
		//var_dump($gradedWorkFeeds);die();
		

		$this->render('index');
	}
	
	
	private function publishToStudents()
	{
		
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
			$model->coursePublished = $_POST['GradedWork']['coursePublished'];
			
			//var_dump($model->coursePublished);die();
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
						if($model->coursePublished==1)
						{
							$courseStudents = UserCourseEnrollment::model()->findAllByAttributes(array('course_code'=>$model->courseGradedWork->course_code));
							
							foreach($courseStudents as $courseStudent)
							{
								$userGradedWork = new UserGradedWork;
								$userGradedWork->user_id = $courseStudent->user_id;
								$userGradedWork->graded_work_id = $model->uid;
								
								//echo $userGradedWork->graded_work_id;
								//$userGradedWork->validate(); echo CHtml::errorSummary($userGradedWork);die();
								
								if($userGradedWork->save())
								{
									
								}
								else
								{
									$transaction->rollback();
									Yii::app()->user->setFlash('failure', 'The Graded Work was not saved. An error occured.');
								}
							}
							if($transaction->active)
							{
								$transaction->commit();
								Yii::app()->user->setFlash('success', 'The Graded Work was created successfully.');
								$model->refresh();
									
								$this->render('view',array('model'=>$model));
								Yii::app()->end();
							}
						}
						else
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success', 'The Graded Work was created successfully.');
							$model->refresh();
							
							$this->render('view',array('model'=>$model));
							Yii::app()->end();
						}
					}
					else 
					{
						$transaction->rollback();
						Yii::app()->user->setFlash('failure', 'The Graded Work was not saved. An error occured.');
					}
				}
			}
			catch(Exception $ex)
			{
				if($transaction->getActive())
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('failure', 'The Graded Work was not saved. An error occured.');
				}
			}
			//var_dump($model->attributes);die();
		}
		$this->render('create',array('model'=>$model,'courseGradedWork'=>$model->courseGradedWork,'createdBy'=>$model->createdBy));
	}
	
	public function actionGrades()
	{
		if(isset($_REQUEST['student']))
		{
			$student = User::model()->findByPk(trim($_REQUEST['student']));
			
			if($student)
			{
				if(Yii::app()->getUser()->userHasRole($student->uid,'student'))
				{
					if(isset($_REQUEST['course']))
					{
						$studentGradedWorks = UserGradedWork::model()->with('student')->findByAttributes(array('user_id'=>$student->uid));		
					}
					else
					{	
						$studentGradedWorks = UserGradedWork::model()->with('student','gradedWork')->findAllByAttributes(array('user_id'=>$student->uid)); 
	
						$sectionTitle = CHtml::link($student->first_name.'\'s',array(strtr('/profile?id={id}',array('{id}'=>$student->uid)))).' Graded Work';
						
						$this->render('_student_graded_work_view',array('studentGradedWorks'=>$studentGradedWorks,'sectionTitle'=>$sectionTitle));
						Yii::app()->end();
					}
				}	
			}
			$this->render('//misc/unavailable',array('messageTitle'=>"Student Not Found",'message'=>'The Student with ID Number '.'"'.trim($_REQUEST['student']).'"'.' could not be found.'));
			Yii::app()->end();
		}
		else if (isset($_REQUEST['course']))
		{
			
		}
		else
		{
			if(Yii::app()->getUser()->hasRole('student'))
			{
				$studentGradedWorks = UserGradedWork::model()->with('student','gradedWork','gradedBy')->findAllByAttributes(array('user_id'=>Yii::app()->getUser()->getId()));
				$sectionTitle = CHtml::link($studentGradedWorks->student->first_name.'\'s',array(strtr('/profile?id={id}',array('{id}'=>Yii::app()->getUser()->getId())))).' Graded Works';
				
				$this->render('_student_graded_work_view',array('studentGradedWorks'=>$studentGradedWorks,'sectionTitle'=>$sectionTitle));
				Yii::app()->end();
			}
			else if(Yii::app()->getUser()->hasRole('teacher'))
			{
				$this->render('_student_graded_work_view',array('studentGradedWorks'=>$studentGradedWorks,'sectionTitle'=>$sectionTitle));
				Yii::app()->end();
			}			
		}
	}
	
	public function actionUpdate()
	{
		$model = new GradedWork();
		$model->createdBy = new User();
		$model->courseGradedWork = new CourseGradedWork();
		$model->scenario = 'update';
	
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

	public function actionStudentView()
	{
		if(isset($_REQUEST['id']))
		{		
			if($model = UserGradedWork::model()->with('student','gradedBy','gradedWork','letterGrade')->findByAttributes(array('user_id'=>trim($_REQUEST['id']))))
			{
				
				$this->render('studentview', array('model'=>$model,));
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