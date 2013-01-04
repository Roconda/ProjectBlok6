<?php

class EnrollController extends Controller
{
        private $sort=array(
                            'attributes'=>array(
                                'user.profile.firstname'=>array(
                                    'asc'=>'profile.firstname',
                                    'desc'=>'profile.firstname DESC',
                                ),
                                'user.profile.lastname'=>array(
                                    'asc'=>'profile.lastname',
                                    'desc'=>'profile.lastname DESC',
                                ),
                                'courseoffer.course.description'=>array(
                                    'asc'=>'course.description',
                                    'desc'=>'course.description DESC',
                                ),
                                'courseoffer.location.description'=>array(
                                    'asc'=>'location.description',
                                    'desc'=>'location.description DESC',
                                ),
                                '*',
                             ),
                          );
    
        private $teachersort=array(
                            'attributes'=>array(
                                'courseoffer.course.description'=>array(
                                    'asc'=>'course.description',
                                    'desc'=>'course.description DESC',
                                ),
                                'courseoffer.location.description'=>array(
                                    'asc'=>'location.description',
                                    'desc'=>'location.description DESC',
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
                                    'asc'=>'course.required',
                                    'desc'=>'course.required DESC',
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
				'actions'=>array('ownindex','index', 'indexajax'),
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
				'actions'=>array('admin','create','view','index','update','delete','owncreate','ownindex','generatepdf','generateexcel'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
                    if(isset($_POST['Enroll']))
                    {
                    $userid=$_POST['Enroll']['user_id'];
                    $user=User::model()->findAll("username='" . $_POST['Enroll']['user_id'] . "'");
                    foreach($user as $uid){
                        $userid=$uid->id;
                    }
                    $_POST['Enroll']['user_id']=$userid;
                    $connection=Yii::app()->db;
			$sql="INSERT INTO enroll (user_id,courseoffer_id,completed)
                            VALUES(:user_id,:courseoffer_id,:completed)";
                        $command = $connection->createCommand($sql);
                        $command->bindParam(":user_id", $_POST['Enroll']['user_id'], PDO::PARAM_STR);
                        $command->bindParam(":courseoffer_id", $_POST['Enroll']['courseoffer_id'], PDO::PARAM_STR);
                        $command->bindParam(":completed", $_POST['Enroll']['completed'], PDO::PARAM_STR);
                        $command->execute();
                        $this->redirect(array('index'));
                    }
                    /*
			$model->attributes=$_POST['Enroll'];
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
		$model=new Enroll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Enroll']))
		{
			$model->attributes=$_POST['Enroll'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->user_id));
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
                        $enrollment['user_id'] = $value->user_id;
                        $enrollment['courseoffer_id'] = $value->courseoffer_id;
                        $enrollment['completed'] = $value->completed;
                    }
                }
		

                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Enroll']))
		{
                    $userid=$_POST['Enroll']['user_id'];
                    $user=User::model()->findAll("username='" . $_POST['Enroll']['user_id'] . "'");
                    foreach($user as $uid){
                        $userid=$uid->id;
                    }
                    $_POST['Enroll']['user_id']=$userid;
			$enrollment=$_POST['Enroll'];
			Enroll::model()->updateAll(array(
                            'user_id'=>$enrollment['user_id'],
                            'courseoffer_id'=>$enrollment['courseoffer_id'],
                            'completed'=>$enrollment['completed']),
                                "user_id=$id AND courseoffer_id=$cid");
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
			Enroll::model()->updateAll(array('completed'=>$assignment['completed']),
                                "user_id=$id AND courseoffer_id=$cid");
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
			$result = $this->actionOwnIndex();
			
			$this->render('teacher/index',array(
            	'assignModel' => $result['assign'],
				'dataProvider'=>$result['dataProvider'],
			));
		}
		else
		{
            $enroll = new Enroll('search');
            
            $criteria = new CDbCriteria();
            $criteria->join = 'LEFT OUTER JOIN `courseoffer` `courseoffer` ON (`t`.`courseoffer_id`=`courseoffer`.`id`) 
                LEFT OUTER JOIN profile profile ON t.user_id=profile.user_id 
                LEFT OUTER JOIN `course` `course` ON (`courseoffer`.`course_id`=`course`.`id`)
                LEFT OUTER JOIN `location` `location` ON (`courseoffer`.`location_id`=`location`.`id`)  
                LEFT OUTER JOIN `user` `user` ON (`t`.`user_id`=`user`.`id`)';
            
            $criteria->mergeWith($enroll->search());
            if(isset($_GET['Enroll'])){
                foreach($_GET['Enroll'] as $enrollItem=>$input) {
                    if(isset($enrollItem) && !empty($input)) {
                        $field = str_replace('_', '.', $enrollItem);
                        $criteria->addCondition("$field LIKE '%$input%'");
                    }
                }              
            }
           
            
			$dataProvider=new CActiveDataProvider($enroll, array(
                'criteria'=>$criteria,
                'sort'=>$this->sort,
            ));
            
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}
	}
	
	public function actionIndexAjax() {
		if(yii::app()->user->can('enroll_read_own'))
		{
			$result = $this->actionOwnIndex();
			
			$this->renderPartial('teacher/dashboard',array(
            	'assignModel' => $result['assign'],
				'dataProvider'=>$result['dataProvider'],
			));
		}
		else
		{
            $enroll = Enroll::model()->with('user', 'courseoffer');
			$dataProvider=new CActiveDataProvider($enroll, array(
                'sort'=>$this->sort,
            ));
			$this->renderPartial('index',array(
				'dataProvider'=>$dataProvider, false, true
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
            $enroll = Enroll::model();
            $criteria = new CDbCriteria();
            $criteria->join = 'LEFT OUTER JOIN `courseoffer` `courseoffer` ON (`t`.`courseoffer_id`=`courseoffer`.`id`) 
                LEFT OUTER JOIN profile profile ON t.user_id=profile.user_id 
                LEFT OUTER JOIN `course` `course` ON (`courseoffer`.`course_id`=`course`.`id`)
                LEFT OUTER JOIN `location` `location` ON (`courseoffer`.`location_id`=`location`.`id`)  
                LEFT OUTER JOIN `user` `user` ON (`t`.`user_id`=`user`.`id`)';
            $enroll->setDbCriteria($criteria);
            $dataProvider=new CActiveDataProvider($enroll, array(
                'sort'=>$this->teachersort,
            ));
            $user = yii::app()->user->getName();
            $x = $dataProvider->getCriteria();
            $x->addCondition("user.username='$user'");
            $dataProvider->setCriteria($x);
           
		
			return array('assign' => $assign, 'dataProvider' => $dataProvider); 
    }
    
	public function actionGenerateExcel()
	{
		$session=new CHttpSession;
		$session->open();		
		
		 if(isset($session['Enroll_records']))
		   {
			$model=$session['Enroll_records'];
		   }
		   else
			 $model = Enroll::model()->findAll();

		
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


               if(isset($session['Enroll_records']))
               {
                $model=$session['Enroll_records'];
               }
               else
                 $model = Enroll::model()->findAll();

		

		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Enroll Report');
		$pdf->SetSubject('Enroll Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('../../../../../../images/logo_Avans.jpg', PDF_HEADER_LOGO_WIDTH, 'Report by '.Yii::app()->name, "");
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
		$pdf->Output("Enroll_002.pdf", "I");
	}
	
    public function getCourseOfferList()
    {
        $courseoffer = Courseoffer::model()->findAll();
            $bob = array();
            foreach($courseoffer as $cs){
                $course= $cs->course->description;
                $loc = "";
                if(isset($cs->location->description)){
                    $loc = $cs->location->description;
                }
                $fysiek = 'Digitaal';
                if($cs->fysiek == 1){
                    $fysiek = 'Fysiek';
                }
                $year="Year: " . $cs->year;
                $block="Block: " . $cs->block;
                $polis = "$course: $fysiek,  $loc, $year, $block";
                $bob[$cs->id] = $polis;
            }
        return $bob;
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
