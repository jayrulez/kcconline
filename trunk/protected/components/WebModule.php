<?php

class WebModule extends CWebModule
{
	protected $assetsUrl;

	protected $dependencies = array();
	
	public function init()
	{
		parent::init();
		
		$moduleId = $this->getId();
		
		$this->setImport(array(
			$moduleId.'.components.*',
			$moduleId.'.models.*',
			$moduleId.'.widgets.*',
		));

		$this->checkDependencies();
	}
	
	public function checkDependencies()
	{
		if(is_array($this->dependencies))
		{
			foreach($this->dependencies as $moduleId)
			{
				if(Yii::app()->getModule($moduleId))
				{
					throw new CException(Yii::t('application', 'Missing dependency "{moduleId}".', array(
						'{moduleId}'=>$moduleId,
					)));
				}
			}
		}
	}

	public function setAssetsUrl($assetsUrl)
	{
		$this->assetsUrl = $assetsUrl;
	}
	
	public function getAssetsUrl()
	{
		return $this->assetsUrl;
	}
	
	public function publishAssets()
	{
		$assetsPath = $this->getBasePath().DIRECTORY_SEPARATOR.'assets';
		
		if(is_dir($assetsPath))
		{
			$this->assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);
		}
	}
	
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		return false;
	}
}
