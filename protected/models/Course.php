<?php

/**
 * This is the model class for table "kcconline.course".
 *
 * The followings are the available columns in table 'kcconline.course':
 * @property string $course_code
 * @property string $name
 * @property string $category_id
 * @property string $description
 * @property string $datetime_created
 * @property string $last_modified
 * @property integer $key_required
 * @property string $enrollment_key
 *
 * The followings are the available model relations:
 * @property Category $category
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'course';
	}

	public function primaryKey()
	{
		return 'course_code';
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
			array('course_code, name', 'required'),
			array('key_required', 'numerical', 'integerOnly'=>true),
			array('course_code', 'length', 'max'=>16),
			array('name', 'length', 'max'=>100),
			array('category_id', 'length', 'max'=>20),
			array('description', 'length', 'max'=>255),
			array('enrollment_key', 'length', 'max'=>128),
			array('last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('course_code, name, category_id, description, datetime_created, last_modified, key_required, enrollment_key', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'course_code' => 'Course Code',
			'name' => 'Name',
			'category_id' => 'Category',
			'description' => 'Description',
			'datetime_created' => 'Datetime Created',
			'last_modified' => 'Last Modified',
			'key_required' => 'Key Required',
			'enrollment_key' => 'Enrollment Key',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('datetime_created',$this->datetime_created,true);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('key_required',$this->key_required);
		$criteria->compare('enrollment_key',$this->enrollment_key,true);

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
				$this->datetime_created = new CDbExpression('now()');
			}else{
				$this->last_modified = new CDbExpression('now()');
			}

			return true;
		}
		return false;
	}
}