<?php

class AssignController extends Controller
{
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
				'expression'=> "Yii::app()->user->can('assign_create')",
			),
			array('allow', // allow authenticated user to perform the following
				'actions'=>array('index','view'),
				'expression'=> "Yii::app()->user->can('assign_read')",
			),
                        array('allow', // allow authenticated user to perform the following
				'actions'=>array('ownindex','view'),
				'expression'=> "Yii::app()->user->can('assign_read_own')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update'),
				'expression'=> "Yii::app()->user->can('assign_update')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=> "Yii::app()->user->can('assign_delete')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','view','index','update','delete'),
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
		$model=new Assign();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Assign']))
		{
			$model->attributes=$_POST['Assign'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->user_id));
		}

		$this->render('create',array(
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Courseoffer']))
		{
			$model->attributes=$_POST['Courseoffer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('assign');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Courseoffer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Courseoffer']))
			$model->attributes=$_GET['Courseoffer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Assign::model()->findByPk($id);
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
            $assign = Assign::model()->with('user', 'traject');
            $dataProvider=new CActiveDataProvider($assign);
            $user = yii::app()->user->getName();
            $x = $dataProvider->getCriteria();
            $x->addCondition("user.username='gsaris'");
            $dataProvider->setCriteria($x);
		$this->render('teacher/index',array(
			'dataProvider'=>$dataProvider,
		));
        }
        
        public function testCourseOfferFullPrint()
        {
            $courseoffer = Courseoffer::model()->with('course', 'location', 'user')->findAll();
            
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
