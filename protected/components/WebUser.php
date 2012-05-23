<?php

class WebUser extends CWebUser
{
	public $allowAutoLogin = true;
	public $loginUrl       = array('/site/login');
	public $logoutUrl      = array('/site/logout');
	public $_model         = null;
	public $identityClass  = 'UserIdentity';
	
	public function init()
	{
		parent::init();
	}
	
	public function getIdentityInstance($email = null, $password = null)
	{
		if(empty($this->identityClass))
		{
			throw new CException('Property WebUser.identityClass not specified.');
		}
		
		$className = Yii::import($this->identityClass);
		
		return new $className($email, $password);
	}
	
	public function getModel()
	{
		if($this->_model === null)
		{
			$this->_model = User::model()->find('uid=:id', array(
				':id' => $this->getId(),
			));
		}
		
		if($this->_model !== null)
		{
			$this->_model->refresh();
		}
		
		return $this->_model;
	}
	
	public function getIsGuest()
	{
		return $this->getModel() === null;
	}
}