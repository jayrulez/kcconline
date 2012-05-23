<?php

class ChangePasswordForm extends CFormModel
{
	public $newPassword;

	public $confirmNewPassword; 

	public $currentPassword;

	public function rules()
	{
		return array(
			array('currentPassword, newPassword, confirmNewPassword', 'required'),
			array('currentPassword, newPassword, confirmNewPassword', 'length', 'min'=>5, 'max'=>32),
			array('confirmNewPassword', 'compare', 'compareAttribute'=>'newPassword'),
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
			if(($model = Yii::app()->getUser()->getModel()) !== null)
			{
				return $model->saveAttributes(array(
					'password'=>UserHelper::encryptPassword($this->newPassword),
				));
			}
		}
		return false;
	}
	
	public function attributeLabels()
	{
		return array(
			'currentPassword'=>Yii::t('application', 'Current'),
			'newPassword'=>Yii::t('application', 'New'),
			'confirmNewPassword'=>Yii::t('application', 'Confirm new'),
		);
	}
}
