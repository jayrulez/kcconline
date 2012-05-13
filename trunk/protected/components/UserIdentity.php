<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	const ERROR_EMAIL_INVALID = 4;
	
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array(
			"email_address" => $this->username,
		));
		
		if($user === null)
		{
			$this->errorCode = self::ERROR_EMAIL_INVALID;
		}else{
			if($user->password != md5($this->password))
			{
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			}else{
				$this->_id = $user->uid;
				$this->errorCode = self::ERROR_NONE;
			}
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}