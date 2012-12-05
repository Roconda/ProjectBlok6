<?php

/**
 * This is the model class for table "courseoffer".
 *
 * The followings are the available columns in table 'courseoffer':
 * @property integer $id
 * @property integer $course_id
 * @property integer $location_id
 * @property integer $year
 * @property integer $block
 * @property integer $fysiek
 * @property integer $blocked
 */
class Courseoffer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Courseoffer the static model class
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
		return 'courseoffer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, year, block, fysiek, blocked', 'required'),
			array('course_id, location_id, year, block, fysiek, blocked', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_id, location_id, year, block, fysiek, blocked', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'course_id' => 'Course',
			'location_id' => 'Location',
			'year' => 'Year',
			'block' => 'Block',
			'fysiek' => 'Fysiek',
			'blocked' => 'Blocked',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('year',$this->year);
		$criteria->compare('block',$this->block);
		$criteria->compare('fysiek',$this->fysiek);
		$criteria->compare('blocked',$this->blocked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}