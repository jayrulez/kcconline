<?php

class Controller extends CController
{
	public $layout='//layouts/main';
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}
	
	public function accessRules()
	{
		return array();
	}
	
	public function init()
	{
		parent::init();
		
		if(($model=Yii::app()->getUser()->getModel()) !== null)
		{
			$model->saveAttributes(array(
				'last_action' => new CDbExpression('now()'),
			));
		}
	}
	
	public function setPageTitle($pageName)
	{
		parent::setPageTitle(Yii::t('application', '{appName} {separator} {pageName}', array(
			'{appName}'=>Yii::app()->name,
			'{separator}'=>'|',
			'{pageName}'=>$pageName,
		)));
	}
	
	public function getPageTitle()
	{
		if(parent::getPageTitle()!==null)
		{
			return parent::getPageTitle();
		}
		return $this->pageTitle = Yii::app()->name;
	}
}
