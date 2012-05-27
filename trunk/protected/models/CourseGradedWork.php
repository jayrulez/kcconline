<?php

/**
 * This is the model class for table "course_graded_work".
 *
 * The followings are the available columns in table 'course_graded_work':
 * @property string $course_code
 * @property string $graded_work_id
 *
 * The followings are the available model relations:
 * @property GradedWork $gradedWork
 * @property Course $courseCode
 */
class CourseGradedWork extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseGradedWork the static model class
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
		return 'course_graded_work';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_code, graded_work_id', 'required'),
			array('course_code', 'length', 'max'=>16),
			array('graded_work_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('course_code, graded_work_id', 'safe', 'on'=>'search'),
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
			'gradedWork' => array(self::BELONGS_TO, 'GradedWork', 'graded_work_id'),
			'courseCode' => array(self::BELONGS_TO, 'Course', 'course_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'course_code' => 'Course Code',
			'graded_work_id' => 'Graded Work',
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
		$criteria->compare('graded_work_id',$this->graded_work_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}