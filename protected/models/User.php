<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $uid
 * @property string $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $dob
 * @property string $email_address
 * @property string $password
 * @property string $phone1
 * @property string $phone2
 * @property integer $active
 * @property integer $deleted
 * @property string $datetime_created
 * @property string $last_action
 * @property string $last_modified
 * @property string $image_url
 */
class User extends CActiveRecord
{
	public $id;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, first_name, last_name, email_address', 'required'),
			array('password', 'required', 'on'=>'create'),
			array('active, deleted', 'numerical', 'integerOnly'=>true),
			array('user_id, password', 'length', 'max'=>32),
			array('first_name, middle_name, last_name', 'length', 'max'=>75),
			array('email_address', 'length', 'max'=>252),
			array('user_id','unique'),
			array('email_address','unique'),
			array('phone1, phone2', 'length', 'max'=>20),
			array('image_url', 'length', 'max'=>255),
			array('dob, last_action, last_modified', 'safe'),
			array('country_code', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, user_id, first_name, middle_name, last_name, dob, email_address, password, phone1, phone2, active, deleted, datetime_created, last_action, last_modified, image_url', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'user_id' => 'User Id',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'dob' => 'Dob',
			'email_address' => 'Email Address',
			'password' => 'Password',
			'phone1' => 'Phone1',
			'phone2' => 'Phone2',
			'active' => 'Active',
			'deleted' => 'Deleted',
			'datetime_created' => 'Datetime Created',
			'last_action' => 'Last Action',
			'last_modified' => 'Last Modified',
			'image_url' => 'Image Url',
		);
	}

	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			$this->email_address = strtolower($this->email_address);

			if($this->getIsNewRecord())
			{
				$this->password = UserHelper::encryptPassword($this->password);
				$this->deleted = 0;
				$this->datetime_created = new CDbExpression('now()');
			}else{
				$this->last_modified = new CDbExpression('now()');
			}

			return true;
		}
		return false;
	}

	public function afterSave()
	{
		parent::afterSave();
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('phone2',$this->phone2,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('datetime_created',$this->datetime_created,true);
		$criteria->compare('last_action',$this->last_action,true);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('country_code',$this->country_code,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function afterFind()
	{
		parent::afterFind();
		$this->id = $this->uid;
	}
	public function getFullname()
	{
		$ret = $this->first_name;
		
		if(!empty($this->middle_name))
		{
			$ret .= ' '.$this->middle_name;
		}
		
		$ret .= ' '.$this->last_name;
		
		return $ret;
	}
}
