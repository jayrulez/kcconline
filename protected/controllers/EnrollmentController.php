<?php

class EnrollmentController extends AuthenticatedController
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
		$feed = $this->enrollmentFeed();
		$this->render('index', array('feedview'=>$feed['feedview'],'feedmodel'=>$feed['feedmodel']));
	}

	public function enrollmentFeed()
	{
		
		$enrollmentFeeds = UserCourseEnrollment::model()->with('course','user','enrollment','enrolledBy')->findAll();
		$view = '';
		foreach($enrollmentFeeds as $enrollmentFeed)
		{
			$view .= $this->renderPartial('_enrollment_feed',array('feedData'=>$enrollmentFeed),true);
			//var_dump($view);die();
		}
		return array('feedview'=>$view,'feedmodel'=>$enrollmentFeeds);
	}
	
	public function actionEnroll()
	{
		
		$enrollmentModel=new Enrollment;
		$userCourseEnrollmentModel = new UserCourseEnrollment;
		$courseModel = new Course;
		
		$userCourseEnrollmentModel->scenario="enroll";
		
		if(isset($_POST['Enrollment']) && isset($_POST['UserCourseEnrollment']) && isset($_POST['Course']))
		{
			$enrollmentModel->attributes=$_POST['Enrollment'];
			$userCourseEnrollmentModel->attributes = $_POST['UserCourseEnrollment'];
			$courseModel->attributes = $_POST['Course'];
			
			$courseModel->course_code = $userCourseEnrollmentModel->course_code;
		
			//var_dump($courseModel);
			//echo $courseModel->exists('course_code=:code',array('code'=>$courseModel->course_code));
			
		
			$transaction=Enrollment::model()->dbConnection->beginTransaction();
			try 
			{
				$enrollmentModel->datetime_created = new CDbExpression('now()');
				if($enrollmentModel->save())
				{
					$userCourseEnrollmentModel->enrollment_id = $enrollmentModel->uid;
					$userCourseEnrollmentModel->enrolled_by = Yii::app()->getUser()->getId();
					
					if($userCourseEnrollmentModel->save())
					{
						$transaction->commit();
						$userCourseEnrollmentModel->refresh();
						
						Yii::app()->user->setFlash('success', strtr('The Student was Enrolled in {course_code} assigned successfully.',array('{course_code}'=>$courseModel->course_code)));
						
						$this->render('view',array(
								'model'=>$userCourseEnrollmentModel));
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
				$transaction->rollback();
			}
			
		
		}	
		$this->render('enroll',array('enrollmentModel'=>$enrollmentModel,'userCourseEnrollmentModel'=>$userCourseEnrollmentModel,'courseModel'=>$courseModel));
	}
}