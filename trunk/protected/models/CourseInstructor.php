<?php

/**
 * This is the model class for table "course_instructor".
 *
 * The followings are the available columns in table 'course_instructor':
 * @property string $course_code
 * @property string $user_id
 * @property string $datetime_assigned
 */
class CourseInstructor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseInstructor the static model class
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
		return 'course_instructor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	
	public function primaryKey()
	{
		return array('course_code','user_id');
	}
	public function rules()
	{
		//echo "<pre>"; print_r($this->attributes); echo "</pre>"; exit;
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_code, user_id', 'required'),
			array('course_code', 'length', 'max'=>20),
			array('user_id', 'length', 'max'=>32),
			array('user_id','exist','attributeName'=>'uid','className'=>'User','message'=>'The Instructor with {attribute} "{value}" does not exist.'),
			array('course_code','exist','attributeName'=>'course_code','className'=>'Course','message'=>'The Course "{value}" does not exist.'),
			array('course_code', 'uniqueCompositePK'),
		// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('course_code, user_id, datetime_assigned', 'safe', 'on'=>'search'),
		);
	}
	
	public function uniqueCompositePK($attributes=array())
	{
		$model = self::model()->findByAttributes(array(
			'course_code'=>$this->course_code,
			'user_id'=>$this->user_id,		
		));
		
		if($model !== null)
		{
			$this->addError('course_code', strtr('This Instructor is already assigned to {course}.', array(
				'{course}'=>$this->course_code,		
			)));
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'course'=>array(self::BELONGS_TO,'Course','course_code'),
				'user'=>array(self::BELONGS_TO,'User','user_id'
				)
		);
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'course_code' => 'Course Code',
			'user_id' => 'Instructor ID',
			'datetime_assigned' => 'Datetime Assigned',
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

		$criteria->compare('course_code',$this->course_code,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('datetime_assigned',$this->datetime_assigned,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->getIsNewRecord())
			{
				$this->datetime_assigned = new CDbExpression('now()');
				
			}
			$this->course_code = strtoupper($this->course_code);
			return true;
		}
		return false;
	}	
}