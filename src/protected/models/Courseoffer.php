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
    public $course_description;
    public $course_required;
    public $location_description;
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
			array('id, course_id, location_id, year, block, fysiek, blocked,course_description, course_required, location_description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('location' => array(self::BELONGS_TO, 'Location',
                    'location_id'),
                    
                    'course' => array(self::BELONGS_TO, 'Course',
                        'course_id'),
                    
                    'user' => array(self::MANY_MANY, 'User',
                        'enroll(courseoffer_id, user_id)'),
                    
                    'enroll' => array(self::HAS_MANY, 'Enroll',
                        'courseoffer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'course_id' => Yii::t ('courseOffer', 'Course'),
			'location_id' => Yii::t ('courseOffer', 'Location'),
			'year' => Yii::t ('courseOffer', 'Year'),
			'block' => Yii::t ('courseOffer', 'Block'),
			'fysiek' => Yii::t ('courseOffer', 'Physical'),
			'blocked' => Yii::t ('courseOffer', 'Frozen'),
                        'course_description' => 'CDescription',
                        'location_description' => 'CLocation',
                        'course_required' => 'CRequired',
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
                $merge=new CDbCriteria();
                
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.course_id',$this->course_id);
		$criteria->compare('t.location_id',$this->location_id);
		$criteria->compare('t.year',$this->year);
		$criteria->compare('t.block',$this->block);
		$criteria->compare('t.fysiek',$this->fysiek);
		$criteria->compare('t.blocked',$this->blocked);
                $merge->join = 'LEFT OUTER JOIN course c ON t.course_id=c.id LEFT OUTER JOIN location l ON t.location_id=l.id';
                $criteria->mergeWith($merge);
                
                $criteria->compare('c.description',$this->course_description,true);
                $criteria->compare('l.description',$this->location_description,true);
                $criteria->compare('c.required',$this->course_required,true);
                
                

                
                //$criteria->compare('course.description',$this->course_id, true);
                //$criteria->compare('course.required',$this->course_id, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'attributes'=>array(
                                'course_description'=>array(
                                    'asc'=>'c.description',
                                    'desc'=>'c.description DESC',
                                ),
                                'location_description'=>array(
                                    'asc'=>'l.description',
                                    'desc'=>'l.description DESC',
                                ),
                                'course_required'=>array(
                                    'asc'=>'c.required',
                                    'desc'=>'c.required DESC',
                                ),
                                '*',
                             ),
                          )
		));
	}
}