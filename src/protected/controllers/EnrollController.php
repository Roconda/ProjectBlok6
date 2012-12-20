<?php

class EnrollController extends Controller
{
    private $sort=array(
                            'attributes'=>array(
                                'user.profile.firstname'=>array(
                                    'asc'=>'user.profile.firstname',
                                    'desc'=>'user.profile.firstname DESC',
                                ),
                                'user.profile.lastname'=>array(
                                    'asc'=>'user.profile.lastname',
                                    'desc'=>'user.profile.lastname DESC',
                                ),
                                'courseoffer.course.description'=>array(
                                    'asc'=>'courseoffer.course.description',
                                    'desc'=>'courseoffer.course.description DESC',
                                ),
                                'courseoffer.location.description'=>array(
                                    'asc'=>'courseoffer.location.description',
                                    'desc'=>'courseoffer.location.description DESC',
                                ),
                                '*',
                             ),
                          );
    
        private $teachersort=array(
                            'attributes'=>array(
                                'courseoffer.course.description'=>array(
                                    'asc'=>'courseoffer.course.description',
                                    'desc'=>'courseoffer.course.description DESC',
                                ),
                                'courseoffer.location.description'=>array(
                                    'asc'=>'courseoffer.location.description',
                                    'desc'=>'courseoffer.location.description DESC',
                                ),
                                'courseoffer.year'=>array(
                                    'asc'=>'courseoffer.year',
                                    'desc'=>'courseoffer.year DESC',
                                ),
                                'courseoffer.block'=>array(
                                    'asc'=>'courseoffer.block',
                                    'desc'=>'courseoffer.block DESC',
                                ),
                                'courseoffer.course.required'=>array(
                                    'asc'=>'courseoffer.course.required',
                                    'desc'=>'courseoffer.course.required DESC',
                                ),
                                '*',
                             ),
                          );
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform the following
				'actions'=>array('create'),
				'expression'=> "yii::app()->user->can('enroll_create')",
			),
			array('allow', // allow authenticated user to perform the following
				'actions'=>array('index','view'),
				'expression'=> "yii::app()->user->can('enroll_read')",
			),
            array('allow', // allow authenticated user to perform the following
				'actions'=>array('ownindex','index'),
				'expression'=> "yii::app()->user->can('enroll_read_own')",
			),
            array('allow', // allow authenticated user to perform the following
				'actions'=>array('owncreate'),
				'expression'=> "yii::app()->user->can('enroll_create_own')",
			),
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('update'),
				'expression'=> "yii::app()->user->can('enroll_update_completed')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update'),
				'expression'=> "yii::app()->user->can('enroll_update')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=> "yii::app()->user->can('enroll_delete')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','view','index','update','delete','owncreate','ownindex'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Enroll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Enroll']))
		{
			$model->attributes=$_POST['Enroll'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->user_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionOwnCreate()
	{
		$model=new Enroll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Enroll']))
		{
			$model->attributes=$_POST['Enroll'];
			if($model->save())
				$this->redirect(array('ownindex','id'=>$model->user_id));
		}

		$this->render('teacher/create',array(
			'model'=>$model,
		));
        }
        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            if(yii::app()->user->can('enroll_update_completed'))
            {
                $this->actionUpdateCompleted($id);
            }
            else if(yii::app()->user->can('enroll_update') 
                    || (yii::app()->user->getName() == 'admin'))
            {
                if(isset($_GET['cid']))
                {
                    $cid=$_GET['cid'];
                    $model=$this->loadModel($id, $cid);
                
                    $enrollment = array();
                    foreach($model as $value)
                    {
                        $enrollment['completed'] = $value->completed;
                    }
                }
		

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Enroll']))
		{
			$assignment=$_POST['Enroll'];
			Enroll::model()->updateAll(array('completed'=>$assignment['completed']),"user_id=$id AND courseoffer_id=$cid");
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
            }
	}
        
        /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
        public function actionUpdateCompleted($id)
	{
            if(isset($_GET['cid']))
            {
                $cid=$_GET['cid'];
                $model=$this->loadModel($id, $cid);
                
                $enrollment = array();
                foreach($model as $value)
                    {
                        $enrollment['completed'] = $value->completed;
                    }
            }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Enroll']))
		{
			$assignment['completed']=$_POST['Enroll']['completed'];
			Enroll::model()->updateAll(array('completed'=>$assignment['completed']),"user_id=$id AND courseoffer_id=$cid");
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            if(isset($_GET['cid']))
            {
                $cid=$_GET['cid'];
		Enroll::model()->deleteAll("user_id=$id AND courseoffer_id=$cid");
            }

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(yii::app()->user->can('enroll_read_own'))
		{
			$this->actionOwnIndex();
		}
		else
		{
            $enroll = Enroll::model()->with('user', 'courseoffer');
			$dataProvider=new CActiveDataProvider($enroll, array(
                'sort'=>$this->sort,
            ));
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Courseoffer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Enroll']))
			$model->attributes=$_GET['Enroll'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id, $cid)
	{
		$model=Enroll::model()->findAll("user_id=$id AND courseoffer_id=$cid");
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='enroll-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionOwnIndex()
        {
            $assign = Assign::model();
            $enroll = Enroll::model()->with('courseoffer', 'user');
            $dataProvider=new CActiveDataProvider($enroll, array(
                'sort'=>$this->teachersort,
            ));
            $user = yii::app()->user->getName();
            $x = $dataProvider->getCriteria();
            $x->addCondition("user.username='$user'");
            $dataProvider->setCriteria($x);
            
		$this->render('teacher/index',array(
                        'assignModel' => $assign,
			'dataProvider'=>$dataProvider,
		));
    }
        
    public function testCourseOfferFullPrint()
    {
        $courseoffer = Courseoffer::model()->findAll();
        
        foreach($courseoffer as $co) {
            $fysiek = 'false';
            $blocked = 'false';
            $course = $co->course->description;
            if(isset($co->location->description))
            $location = $co->location->description;
            else {
                $location = 'unknown';
            }
            echo "Courseoffer : " . $co->id . "<br>";
            echo " from " . $co->year . " in Block " . $co->block . "<br>";
            if($co->fysiek == 1) 
                $fysiek = 'true';
            if($co->blocked == 1)
                $blocked = 'true';
            echo " fysiek : " . $fysiek . "<br>";
            echo " blocked : " . $blocked . "<br>";
            echo " for course : " . $course . "<br>";   
            echo " on location : " . $location . "<br>";
            $user = $co->user;
            foreach($user as $us)
            {
                echo "Username : " . $us->username . "<br>";
            }
            echo "<br>";
                
        }
    }
}
