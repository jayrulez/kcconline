<?php

class ProfileController extends AuthenticatedController
{
	public function init()
	{
		parent::init();
		if(Yii::app()->user->hasRole('teacher') || Yii::app()->user->hasRole('student'))
		{
			
		}
		else
		{
			$this->redirect(array('/site/index'));
		}
		Layout::addBlock('sidebar.left', array(
				'id'=>'profile_sidebar',
				'content'=>$this->widget('ProfileWidget', array('userModel'=>Yii::app()->getUser()->getModel()), true),
		));
	}
	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$roleName = "";
		if(isset($_REQUEST['id']))
		{
			$user = User::model()->findByPk(trim($_REQUEST['id']));
			if($user)
			{
				if(Yii::app()->getUser()->hasRole('student'))
				{
					if(Yii::app()->getUser()->userHasRole($user->uid,'teacher'))
					{
						$roleName = "Teacher";
					}
					else if(Yii::app()->getUser()->userHasRole($user->uid,'student'))
					{
						$roleName = "Student";
					}
					$this->render('_student_view',array('roleName'=>$roleName,
							'model'=>$user,
					));
					Yii::app()->end();
				}
				else if(Yii::app()->getUser()->hasRole('teacher'))
				{
					if(Yii::app()->getUser()->userHasRole($user->uid,'teacher'))
					{
						$roleName = "Teacher";
					}
					else if(Yii::app()->getUser()->userHasRole($user->uid,'admin'))
					{
						$roleName = "Admin";
					}
					else if(Yii::app()->getUser()->userHasRole($user->uid,'student'))
					{
						$roleName = "Student";
					}
					$this->render('_teacher_view',array('roleName'=>$roleName,
							'model'=>$user,
					));
					Yii::app()->end();
				
				}	
			}
		}
		else
		{
			$user = User::model()->findByPk(Yii::app()->getUser()->getId());
			if($user)
			{
				$this->render('_view',array(
					'model'=>$user,
				));
				Yii::app()->end();
			}
		}
		$this->render('//site/_unavailable',array(
				'messageTitle'=>'Profile Not Found',
				'message'=>'Sorry, the profile you requested could not be found. Please try again later.'
		));
	}

}
