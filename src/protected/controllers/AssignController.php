<?php

class AssignController extends Controller
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
				'actions'=>array('ownindex','index'),
				'expression'=> "Yii::app()->user->can('assign_read_own')",
			),
            array('allow', // allow authenticated user to perform the following
				'actions'=>array('owncreate'),
				'expression'=> "Yii::app()->user->can('assign_create_own')",
			),
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('update'),
				'expression'=> "Yii::app()->user->can('assign_update_completed')",
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
				'actions'=>array('admin','create','view','index','update','delete','generatepdf','generateexcel'),
				'expression'=>'Yii::app()->user->isAdmin()',
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
                    if(isset($_POST['Assign']))
                    {
                    $userid=$_POST['Assign']['user_id'];
                    $user=User::model()->findAll("username='" . $_POST['Assign']['user_id'] . "'");
                    foreach($user as $uid){
                        $userid=$uid->id;
                    }
                    $_POST['Assign']['user_id']=$userid;
                    $connection=Yii::app()->db;
			$sql="INSERT INTO assign (user_id, traject_id, startdate, completed)
                            VALUES(:user_id,:traject_id,:startdate,:completed)";
                        $command = $connection->createCommand($sql);
                        $command->bindParam(":user_id", $_POST['Assign']['user_id'], PDO::PARAM_STR);
                        $command->bindParam(":traject_id", $_POST['Assign']['traject_id'], PDO::PARAM_STR);
                        $command->bindParam(":startdate", $_POST['Assign']['startdate'], PDO::PARAM_STR);
                        $command->bindParam(":completed", $_POST['Assign']['completed'], PDO::PARAM_STR);
                        $command->execute();
                        $this->redirect(array('index'));
                    }
                    
                    /*
			$model->attributes=$_POST['Assign'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->user_id));
                     */
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionOwnCreate()
        {
            $model=new Assign();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Assign']))
		{
			$model->attributes=$_POST['Assign'];
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
            if(yii::app()->user->can('assign_update_completed'))
            {
                $this->actionUpdateCompleted($id);
            }
            else if(yii::app()->user->can('assign_update') 
                    || (yii::app()->user->isAdmin()))
            {
                if(isset($_GET['tid']))
                {
                    $tid=$_GET['tid'];
                    $model=$this->loadModel($id, $tid);
                
                    $assignment = array();
                    foreach($model as $value)
                        {
                            $assignment['user_id'] = $value->user_id;
                            $assignment['traject_id'] = $value->traject_id;
                            $assignment['startdate'] = $value->startdate;
                            $assignment['completed'] = $value->completed;
                        }
                }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Assign']))
		{
                    $userid=$_POST['Assign']['user_id'];
                    $user=User::model()->findAll("username='" . $_POST['Assign']['user_id'] . "'");
                    foreach($user as $uid){
                        $userid=$uid->id;
                    }
                    $_POST['Assign']['user_id']=$userid;
			$assignment=$_POST['Assign'];
                        Assign::model()->updateAll(array(
                            'user_id'=>$assignment['user_id'],
                            'traject_id'=>$assignment['traject_id'],
                            'startdate'=>$assignment['startdate'],
                            'completed'=>$assignment['completed']
                            )
                                ,"user_id=$id AND traject_id=$tid");
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
            if(isset($_GET['tid']))
            {
                $tid = $_GET['tid'];
		$model=$this->loadModel($id, $tid);
                
                $assignment = array();
                foreach($model as $value)
                    {
                        $assignment['completed'] = $value->completed;
                    }
            }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Assign']))
		{
			$assignment['completed']=$_POST['Assign']['completed'];
                        Assign::model()->updateAll(array('completed'=>$assignment['completed']),
                                "user_id=$id AND traject_id=$tid");
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
            if(isset($_GET['tid']))
            {
                $tid = $_GET['tid'];
		Assign::model()->deleteAll("user_id=$id AND traject_id=$tid");
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
		if(yii::app()->user->can('assign_read_own'))
		{
			$this->actionOwnIndex();
		}
		else
		{
            $assign=Assign::model()->with('traject', 'user');
			$dataProvider=new CActiveDataProvider($assign, array(
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
	public function loadModel($id, $tid)
	{
		$model=Assign::model()->findAll("user_id=$id AND traject_id=$tid");
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
        $dataProvider=new CActiveDataProvider($assign, array(
            'sort'=>$this->sort,
        ));
        $user = yii::app()->user->getName();
        $x = $dataProvider->getCriteria();
        $x->addCondition("user.username='$user'");
        $dataProvider->setCriteria($x);
		$this->render('teacher/index',array(
			'dataProvider'=>$dataProvider,
		));
    }
    
	public function actionGenerateExcel()
	{
		$session=new CHttpSession;
		$session->open();		
		
		 if(isset($session['Assign_records']))
		   {
			$model=$session['Assign_records'];
		   }
		   else
			 $model = Assign::model()->findAll();

		
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
	
	public function actionGeneratePdf() 
	{
		$session=new CHttpSession;
		$session->open();
		Yii::import('application.extensions.giiplus.bootstrap.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');


               if(isset($session['Assign_records']))
               {
                $model=$session['Assign_records'];
               }
               else
                 $model = Assign::model()->findAll();

		

		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Assign Report');
		$pdf->SetSubject('Assign Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("Traject_002.pdf", "I");
	}
	
    public function getTrajectList()
    {
        $traject = Traject::model()->findAll();
            $dick = array();
            foreach($traject as $tr){
                $dick[$tr->id] = $tr->description;
            }
        return $dick;
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
