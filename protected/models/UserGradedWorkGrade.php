<?php

/**
 * This is the model class for table "user_graded_work_grade".
 *
 * The followings are the available columns in table 'user_graded_work_grade':
 * @property string $user_graded_work_id
 * @property integer $letter_grade_id
 * @property string $raw_grade
 * @property string $percent_grade
 * @property string $graded_by
 * @property string $datetime_entered
 * @property string $datetime_graded
 *
 * The followings are the available model relations:
 * @property LetterGrade $letterGrade
 * @property User $gradedBy
 * @property UserGradedWork $userGradedWork
 */
class UserGradedWorkGrade extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserGradedWorkGrade the static model class
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
		return 'user_graded_work_grade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_graded_work_id', 'required'),
			array('letter_grade_id', 'numerical', 'integerOnly'=>true),
			array('user_graded_work_id', 'length', 'max'=>20),
			array('raw_grade, percent_grade', 'length', 'max'=>10),
			array('graded_by', 'length', 'max'=>32),
			array('datetime_entered, datetime_graded', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_graded_work_id, letter_grade_id, raw_grade, percent_grade, graded_by, datetime_entered, datetime_graded', 'safe', 'on'=>'search'),
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
			'letterGrade' => array(self::BELONGS_TO, 'LetterGrade', 'letter_grade_id'),
			'gradedBy' => array(self::BELONGS_TO, 'User', 'graded_by'),
			'userGradedWork' => array(self::BELONGS_TO, 'UserGradedWork', 'user_graded_work_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_graded_work_id' => 'User Graded Work',
			'letter_grade_id' => 'Letter Grade',
			'raw_grade' => 'Raw Grade',
			'percent_grade' => 'Percent Grade',
			'graded_by' => 'Graded By',
			'datetime_entered' => 'Datetime Entered',
			'datetime_graded' => 'Datetime Graded',
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

		$criteria->compare('user_graded_work_id',$this->user_graded_work_id,true);
		$criteria->compare('letter_grade_id',$this->letter_grade_id);
		$criteria->compare('raw_grade',$this->raw_grade,true);
		$criteria->compare('percent_grade',$this->percent_grade,true);
		$criteria->compare('graded_by',$this->graded_by,true);
		$criteria->compare('datetime_entered',$this->datetime_entered,true);
		$criteria->compare('datetime_graded',$this->datetime_graded,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}