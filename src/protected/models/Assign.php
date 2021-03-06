<?php

/**
 * This is the model class for table "assign".
 *
 * The followings are the available columns in table 'assign':
 * @property string $user_id
 * @property integer $course_id
 * @property string $completed
 * @property string $notes
 */
class Assign extends CActiveRecord
{
    private $sort=array(
                            'attributes'=>array(
                                'user.username'=>array(
                                    'asc'=>'user.username',
                                    'desc'=>'user.username DESC',
                                ),
                                'traject.description'=>array(
                                    'asc'=>'traject.description',
                                    'desc'=>'traject.description DESC',
                                ),
                                'traject.duration'=>array(
                                    'asc'=>'traject.duration',
                                    'desc'=>'traject.duration DESC',
                                ),
                                '*',
                             ),
                          );
    public $user_username;
    public $traject_description;
    public $traject_duration;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Assign the static model class
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
		return 'assign';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, traject_id, startdate, completed', 'required'),
			array('traject_id', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('completed', 'length', 'max'=>9),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, traject_id, startdate, completed, notes, user_username, traject_description, traject_duration', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('traject' => array(self::BELONGS_TO, 'Traject',
                        'traject_id'),
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
			'traject_id' => 'Traject',
                        'startdate' => Yii::t('assign', 'Startdate'),
                    	'completed' => Yii::t('assign', 'Completed'),
			'notes' => Yii::t('assign', 'Notes'),
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
                $criteria->with = array('traject', 'user');

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('traject_id',$this->traject_id);
                $criteria->compare('startdate', $this->startdate);
		$criteria->compare('completed',$this->completed,true);
		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(  
                            'attributes'=>array(
                                'user.username'=>array(
                                    'asc'=>'user.username',
                                    'desc'=>'user.username DESC',
                                ),
                                'traject.description'=>array(
                                    'asc'=>'traject.description',
                                    'desc'=>'traject.description DESC',
                                ),
                                'traject.duration'=>array(
                                    'asc'=>'traject.duration',
                                    'desc'=>'traject.duration DESC',
                                ),
                                '*',
                            ),
                        )
		));
	}
}