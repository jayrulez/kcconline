<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	const ERROR_ID_NUMBER_INVALID = 4;
	
	public function authenticate()
	{
		$user = User::model()->findByPk($this->username);
		
		if($user === null)
		{
			$this->errorCode = self::ERROR_ID_NUMBER_INVALID;
		}else{
			if($user->password !== UserHelper::encryptPassword($this->password))
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