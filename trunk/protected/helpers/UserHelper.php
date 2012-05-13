<?php

class UserHelper
{
	public static function encryptPassword($password)
	{
		return md5($password);
	}
}
