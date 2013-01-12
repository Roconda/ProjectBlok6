<?php

/**
 * This is the model class for table "enroll".
 *
 * The followings are the available columns in table 'enroll':
 * @property string $user_id
 * @property integer $courseoffer_id
 * @property string $completed
 * @property string $notes
 */
class Enroll extends CActiveRecord
{
    public $user_username;
    public $course_description;
    public $location_description;

        /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Enroll the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className)->with('courseoffer', 'user');
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'enroll';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseoffer_id, user_id, completed', 'required'),
			array('courseoffer_id', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('completed', 'length', 'max'=>9),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, courseoffer_id, completed, notes, user_username, course_description, location_description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('courseoffer' => array(self::BELONGS_TO, 'Courseoffer',
                        'courseoffer_id'),
                    'user' => array(self::BELONGS_TO, 'User',
                        'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
            
		return array(
			'user_id' => 'User',
			'courseoffer_id' => 'Courseoffer',
			'completed' => Yii::t('enroll', 'Completed'),
			'notes' => Yii::t('enroll', 'Notes'),
		);
	}
	
	public function getCompleted($data) {
		switch($data):
			case('uncompleted'):
				return Yii::t('enroll', 'n/a');
			case('completed'):
				return Yii::t('enroll', 'Succeeded');
			default:
				return Yii::t('enroll', 'Failed');
		endswitch;
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('courseoffer_id',$this->courseoffer_id);
		$criteria->compare('completed',$this->completed,true);
		$criteria->compare('notes',$this->notes,true);
                
                return $criteria;
                
               /*
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
                */
	}
}