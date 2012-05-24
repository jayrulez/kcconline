<?php

class DefaultController extends AdminController
{
	public function actionIndex()
	{
		Layout::addBlock('sidebar.left', array(
				'id'=>'profile_sidebar',
				'content'=>$this->widget('ProfileWidget', array('userModel'=>Yii::app()->getUser()->getModel()), true),
		));
		$this->render('index');
	}
}