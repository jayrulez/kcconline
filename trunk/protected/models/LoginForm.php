<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $email_address;
	public $password;
	public $rememberMe;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email_address, password', 'required'),
			array('rememberMe', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	public function beforeValidate()
	{
		if(parent::beforeValidate())
		{
			return true;
		}
		return false;
	}
	
	public function process()
	{
		$this->validate();
		
		if(!$this->hasErrors())
		{
			$identity = Yii::app()->user->getIdentityInstance($this->email_address, $this->password);
			
			if(!$identity->authenticate())
			{
				if($identity->errorCode === $identity::ERROR_EMAIL_INVALID)
				{
					$this->addError("email_address", "The email address was not found.");
				}else if($identity->errorCode === $identity::ERROR_PASSWORD_INVALID)
				{
					$this->addError("password", "Password is incorrect.");
				}else{
					$this->addError("email_address", "Cannot access your account at this time, please try again later or contact the site admin if the problem persists.");
				}
				return false;
			}
			
			$duration = $this->rememberMe ? 604800 : 0;//keep logged in for 1 week
			Yii::app()->user->login($identity, $duration);
			return true;
		}
	}
	
	public function quickLogin($emailAddress, $password, $rememberMe = true)
	{
		$form = new self;
		
		$form->email_address = $emailAddress;
		$form->password = $password;
		$form->rememberMe = $rememberMe;
		
		return $form->process();
	}
}
