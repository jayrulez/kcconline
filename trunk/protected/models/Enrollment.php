<?php

/**
 * This is the model class for table "enrollment".
 *
 * The followings are the available columns in table 'enrollment':
 * @property string $uid
 * @property string $enroll_startdatetime
 * @property string $enroll_enddatetime
 */
class Enrollment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Enrollment the static model class
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
		return 'enrollment';
	}
	public function primaryKey()
	{
		return array('uid');
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
			array('enroll_startdatetime, enroll_enddatetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, enroll_startdatetime, enroll_enddatetime', 'safe', 'on'=>'search'),
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
			'uid' => 'Enrollment ID',
			'enroll_startdatetime' => 'Enroll Start Date',
			'enroll_enddatetime' => 'Enroll End Date',
			'datetime_created' => 'Date Created',
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
		$criteria->compare('enroll_startdatetime',$this->enroll_startdatetime,true);
		$criteria->compare('enroll_enddatetime',$this->enroll_enddatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}