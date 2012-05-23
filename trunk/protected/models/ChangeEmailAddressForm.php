<?php

class ChangeEmailAddressForm extends CFormModel
{
	public $emailAddress;

	public function rules()
	{
		return array(
			array('emailAddress', 'required'),
			array('emailAddress', 'length', 'max'=>64),
			array('emailAddress', 'email'),
			array('emailAddress', 'unique', 'className'=>'User', 'attributeName'=>'email_address'),
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
					'email_address'=>$this->emailAddress,
				));
			}
		}
		return false;
	}
	
	public function attributeLabels()
	{
		return array(
			'emailAddress'=>Yii::t('application', 'Email Address'),
		);
	}
}
