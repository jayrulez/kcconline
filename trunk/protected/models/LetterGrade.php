<?php

/**
 * This is the model class for table "letter_grade".
 *
 * The followings are the available columns in table 'letter_grade':
 * @property integer $uid
 * @property string $letter
 * @property string $upper_grade
 * @property string $lower_grade
 * @property string $description
 *
 * The followings are the available model relations:
 * @property UserGradedWorkGrade[] $userGradedWorkGrades
 */
class LetterGrade extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LetterGrade the static model class
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
		return 'letter_grade';
	}
	public function primaryKey()
	{
		return array('uid');
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('letter', 'required'),
			array('letter', 'length', 'max'=>2),
			array('upper_grade, lower_grade', 'length', 'max'=>10),
			array('description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, letter, upper_grade, lower_grade, description', 'safe', 'on'=>'search'),
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
			'userGradedWorkGrades' => array(self::HAS_MANY, 'UserGradedWorkGrade', 'letter_grade_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'letter' => 'Letter',
			'upper_grade' => 'Upper Grade',
			'lower_grade' => 'Lower Grade',
			'description' => 'Description',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('letter',$this->letter,true);
		$criteria->compare('upper_grade',$this->upper_grade,true);
		$criteria->compare('lower_grade',$this->lower_grade,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}