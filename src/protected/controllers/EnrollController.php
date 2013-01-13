<?php

class EnrollController extends Controller
{
        private $sort=array(
                            'attributes'=>array(
                                'user.username'=>array(
                                    'asc'=>'profile.firstname',
                                    'desc'=>'profile.firstname DESC',
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
				'actions'=>array('index','view','generatepdf','generateexcel'),
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
				'expression'=> "yii::app()->user->can('enroll_update_completed') || yii::app()->user->can('enroll_update_own')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update'),
				'expression'=> "yii::app()->user->can('enroll_update')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=> "yii::app()->user->can('enroll_delete') || yii::app()->user->can('enroll_delete_own')",
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
                    
                    $userid=$_POST['Enroll']['user_id'];
                    $user=User::model()->findAll("username='" . $_POST['Enroll']['user_id'] . "'");
                    foreach($user as $uid){
                        $userid=$uid->id;
                    }
                    $_POST['Enroll']['user_id']=$userid;
                    if(!$this->checkDuplicate($userid, $_POST['Enroll']['courseoffer'])) {
                    $connection=Yii::app()->db;
			$sql="INSERT INTO enroll (user_id,courseoffer_id,completed,notes)
                            VALUES(:user_id,:courseoffer_id,:completed,:notes)";
                        $command = $connection->createCommand($sql);
                        $command->bindParam(":user_id", $_POST['Enroll']['user_id'], PDO::PARAM_STR);
                        $command->bindParam(":courseoffer_id", $_POST['Enroll']['courseoffer_id'], PDO::PARAM_STR);
                        $command->bindParam(":completed", $_POST['Enroll']['completed'], PDO::PARAM_STR);
                        $command->bindParam(":notes", $_POST['Enroll']['notes'], PDO::PARAM_STR);
                        $command->execute();
                        $this->redirect(array('index'));
                    }
                    
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} added', array('{model}' => Yii::t('enroll', 'Enroll') )) );
				$this->redirect(array('index'));
			}
			else
			{
				Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to add', array('{model}' => Yii::t('enroll', 'Enroll') )) );
				$this->redirect(array('index'));
			}
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
			if(!$this->checkDuplicate($_POST['Enroll']['user_id'], $_POST['Enroll']['courseoffer_id'])) {
                            if(!$this->isFrozen($_POST['Enroll']['courseoffer_id'])) {
				$model->attributes=$_POST['Enroll'];
				if($model->save())
				{
                                    Yii::app()->user->setFlash('success', Yii::t('main', '{model} added', array('{model}' => Yii::t('enroll', 'Enroll') )) );
                                    $this->redirect(array('index'));
				}
                            }
                            else
                            {
				Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to add', array('{model}' => Yii::t('enroll', 'Enroll') )) );
				$this->redirect(array('index'));
                            }
                            
			}
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
            else if(yii::app()->user->can('enroll_update_own')) {
                $this->actionUpdateOwn();
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
                        $enrollment['notes'] = $value->notes;
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
			if(!$this->checkDuplicate($userid, $_POST['Enroll']['courseoffer_id'])) {
				Enroll::model()->updateAll(array(
					'user_id'=>$enrollment['user_id'],
					'courseoffer_id'=>$enrollment['courseoffer_id'],
					'completed'=>$enrollment['completed'],
					'notes'=>$enrollment['notes']),
						"user_id=$id AND courseoffer_id=$cid");
			
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} updated', array('{model}' => Yii::t('enroll', 'Enroll') )) );
				$this->redirect(array('index'));
			}
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
                        $enrollment['notes'] = $value->notes;
                    }
            }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Enroll']))
		{
			if(!$this->checkDuplicate($_POST['Enroll']['user_id'], $_POST['Enroll']['courseoffer_id'])) {
				$enrollment['completed']=$_POST['Enroll']['completed'];
				$enrollment['notes']=$_POST['Enroll']['notes'];
				Enroll::model()->updateAll(array('completed'=>$enrollment['completed'],
					'notes'=>$enrollment['notes']),
					"user_id=$id AND courseoffer_id=$cid");
				
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} updated', array('{model}' => Yii::t('enroll', 'Enroll') )) );
				$this->redirect(array('index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
	public function actionUpdateOwn()
	{
            $id=yii::app()->user->getId();
            if(isset($_GET['cid']))
            {
                $cid=$_GET['cid'];
                $model=$this->loadModel($id, $cid);
                
                $enrollment = array();
                foreach($model as $value)
                    {
                        $enrollment['courseoffer_id'] = $value->courseoffer_id;
                    }
            }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Enroll']))
		{
			if(!$this->checkDuplicate($id, $_POST['Enroll']['courseoffer_id'])) {
                            if(!$this->isFrozen($_POST['Enroll']['courseoffer_id'])) {
				$enrollment['courseoffer_id']=$_POST['Enroll']['courseoffer_id'];
				Enroll::model()->updateAll(array('courseoffer_id'=>$enrollment['courseoffer_id'],),
						"user_id=$id AND courseoffer_id=$cid");
				
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} updated', array('{model}' => Yii::t('enroll', 'Enroll') )) );
				$this->redirect(array('index'));
                            }
			}
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
                if(yii::app()->user->can('enroll_delete') || yii::app()->user->isAdmin()) {
                    $cid=$_GET['cid'];
                    Enroll::model()->deleteAll("user_id=$id AND courseoffer_id=$cid");
                } else if (yii::app()->user->can('enroll_delete_own')) {
                    $cid=$_GET['cid'];
                    $id=yii::app()->user->getId();
                    Enroll::model()->deleteAll("user_id=$id AND courseoffer_id=$cid");
                }
            }

		Yii::app()->user->setFlash('success', Yii::t('main', '{model} deleted', array('{model}' => Yii::t('enroll', 'Enroll') )) );
			
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
		$pdf->SetFont('dejavusans', '', 9);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("Enroll_002.pdf", "I");
	}
	
    public function getCourseOfferList()
    {
        $dbcriteria = new CDbCriteria();
        $dbcriteria->with = 'course';
        $dbcriteria->addCondition('blocked = 0');
        $dbcriteria->order = 'course.description';
        $courseoffer = Courseoffer::model()->findAll($dbcriteria);
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
	
    public function getOwnCourseOfferList()
    {
	$userid = Yii::app()->user->getId();
        $criteria = new CDbCriteria();
        $criteria->with = 'course';
        $criteria->join = '
                    LEFT OUTER JOIN enroll enroll on enroll.courseoffer_id = t.id
                    LEFT OUTER JOIN course_has_traject course_has_traject  on course_has_traject.course_id = t.course_id
                    LEFT OUTER JOIN assign assign on assign.traject_id = course_has_traject.traject_id';
        $criteria->addCondition("assign.user_id=$userid");
        $criteria->addCondition("t.blocked=0");
        $criteria->addCondition("t.id NOT IN (SELECT courseoffer_id FROM enroll WHERE user_id=$userid)");
        $criteria->order = 'course.description';
        $courseoffer = Courseoffer::model()->findAll($criteria);
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
    
    public function getCompletedList()
    {
        return array('uncompleted' => Yii::t('enroll', 'n/a'),
                     'failed' => Yii::t('enroll', 'Failed'),
                     'completed' => Yii::t('enroll', 'Succeeded'));
    }
    
    public function checkDuplicate($id, $cid) {
        if(Enroll::model()->count("user_id=$id AND courseoffer_id=$cid") == 1) {
            throw new CHttpException('',Yii::t('enroll','This user is already enrolled to this courseoffer'));
            return true;
        }
        return false;
    }
    
    public function isFrozen($cid=null) {
        $coid=null;
        if(isset($_GET['cid'])) {
            $coid=$_GET['cid'];
        }
        if(isset($cid)) 
            $coid=$cid;
        if(isset($coid)) {
        $co=Courseoffer::model()->findAll("id=$coid");
        foreach($co as $c) {
            if($c->blocked==1) {
                throw new CHttpException('Frozen',Yii::t('enroll','This courseoffer is frozen'));
                return true;
            }  
        }
            return false;
        }
        return true;
    }
    
    public function isMaxEnrolled($trajectid) {
        $userid=yii::app()->user->getId();
        $traject=Traject::model()->findAll("id=$trajectid");
        $criteria = Enroll::model()->getDbCriteria();
        $criteria->join = '';
        $criteria->addCondition("user_id=$userid");
        $enrollCount=Enroll::model()->count($criteria);
        foreach($traject as $t) {
            if($t->nrcourses <= $enrollCount) {
                return true;
            } else {
                return false;
            }
        }
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
