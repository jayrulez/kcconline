<?php

/**
 * This is the model class for table "graded_work".
 *
 * The followings are the available columns in table 'graded_work':
 * @property string $uid
 * @property string $title
 * @property integer $type
 * @property string $datetime_created
 * @property string $created_by
 * @property string $description
 * @property string $maximum_grade
 * @property string $minimum_grade
 *
 * The followings are the available model relations:
 * @property CourseGradedWork $courseGradedWork
 * @property GradedWorkType $type0
 * @property User $createdBy
 */
class GradedWork extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GradedWork the static model class
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
		return 'graded_work';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, datetime_created, created_by', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('created_by', 'length', 'max'=>32),
			array('description', 'length', 'max'=>255),
			array('maximum_grade, minimum_grade', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, title, type, datetime_created, created_by, description, maximum_grade, minimum_grade', 'safe', 'on'=>'search'),
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
			'courseGradedWork' => array(self::HAS_ONE, 'CourseGradedWork', 'graded_work_id'),
			'type0' => array(self::BELONGS_TO, 'GradedWorkType', 'type'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'title' => 'Title',
			'type' => 'Type',
			'datetime_created' => 'Datetime Created',
			'created_by' => 'Created By',
			'description' => 'Description',
			'maximum_grade' => 'Maximum Grade',
			'minimum_grade' => 'Minimum Grade',
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

		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('datetime_created',$this->datetime_created,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('maximum_grade',$this->maximum_grade,true);
		$criteria->compare('minimum_grade',$this->minimum_grade,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}