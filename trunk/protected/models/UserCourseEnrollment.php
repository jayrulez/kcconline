<?php

/**
 * This is the model class for table "user_course_enrollment".
 *
 * The followings are the available columns in table 'user_course_enrollment':
 * @property string $enrollment_id
 * @property string $user_id
 * @property string $course_code
 */
class UserCourseEnrollment extends CActiveRecord
{
	public function init()
	{
		parent::init();
		$this->enrolled_by = Yii::app()->getUser()->getId();
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserCourseEnrollment the static model class
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
		return 'user_course_enrollment';
	}
	public function primaryKey()
	{
		return array('user_id','course_code');
		// For composite primary key, return an array like the following
		// return array('pk1', 'pk2');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('enrollment_id, user_id, course_code', 'required'),
			array('enrollment_id, user_id', 'length', 'max'=>20),
			array('course_code', 'length', 'max'=>16),
			array('course_code','exist','attributeName'=>'course_code','className'=>'Course','message'=>'The Course "'.$this->course_code.'" does not exist.'),
			array('user_id','exist','attributeName'=>'uid','className'=>'User','message'=>'The Student with ID Number "'.$this->user_id.'" does not exist.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('enrollment_id, user_id, course_code', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('enrollment'=>array(self::BELONGS_TO,'Enrollment','enrollment_id'),
		'course'=>array(self::BELONGS_TO,'Course','course_code'),'user'=>array(self::BELONGS_TO,'User','user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'enrollment_id' => 'Enrollment ID',
			'user_id' => 'Student ID',
			'course_code' => 'Course Code',
			'enrolled_by' => 'Enrolled By',
		);
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

		$criteria->compare('enrollment_id',$this->enrollment_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('course_code',$this->course_code,true);
		$criteria->compare('enrolled_by',$this->enrolled_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}