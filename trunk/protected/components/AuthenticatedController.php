<?php

class AuthenticatedController extends Controller
{
	public function init()
	{
		parent::init();
		
		if(Yii::app()->getUser()->getIsGuest())
		{
			$this->redirect(Yii::app()->getUser()->loginUrl);
		}
		
		if(($model=Yii::app()->getUser()->getModel()) !== null)
		{
			$model->saveAttributes(array(
				'last_action' => new CDbExpression('now()'),
			));
		}
	}
}
