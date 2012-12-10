<?php

/**
 * This is the model class for table "traject".
 *
 * The followings are the available columns in table 'traject':
 * @property integer $id
 * @property string $description
 * @property integer $duration
 * @property integer $nrcourses
 */
class Traject extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Traject the static model class
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
		return 'traject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, duration, nrcourses', 'required'),
			array('duration, nrcourses', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, duration, nrcourses', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('course' => array(self::MANY_MANY, 'Course', 
                    'course_has_traject(course_id, traject_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'description' => 'Omschrijving',
			'duration' => 'Aantal jaar',
			'nrcourses' => 'Aantal cursussen',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('nrcourses',$this->nrcourses);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}