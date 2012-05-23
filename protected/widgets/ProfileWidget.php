<?php

class ProfileWidget extends CWidget
{
	public $userModel;
	
	public function init()
	{
	
	}
	
	public function run()
	{
		$this->render('profile_widget', array('model'=>$this->userModel));
	}
}
