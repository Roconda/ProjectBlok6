<?php

class CourseofferController extends Controller
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
				'expression'=> "yii::app()->user->can('courseoffer_create')",
			),
			array('allow', // allow authenticated user to perform the following
				'actions'=>array('index','view'),
				'expression'=> "yii::app()->user->can('courseoffer_read')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update'),
				'expression'=> "yii::app()->user->can('courseoffer_update')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=> "yii::app()->user->can('courseoffer_delete')",
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
/**	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
*/

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Courseoffer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Courseoffer']))
		{
			$model->attributes=$_POST['Courseoffer'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} added', array('{model}' => Yii::t('courseoffer', 'Course offer') )) );
				$this->redirect(array('index'));
			}
			else
			{
				Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to add', array('{model}' => Yii::t('courseoffer', 'Course offer') )) );
				$this->redirect(array('index'));
			}
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
			if( $model->save() )
			{
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} updated', array('{model}' => Yii::t('courseoffer', 'Course offer') )) );
				$this->redirect(array('index'));
			}
			else
			{
				Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to updated', array('{model}' => Yii::t('courseoffer', 'Course offer') )) );
				$this->redirect(array('index'));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			if( $this->loadModel($id)->delete() )
			{
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} deleted', array('{model}' => Yii::t('course', 'course') )) );
				
				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_GET['ajax']))
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}
		else
		{
			Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to delete', array('{model}' => Yii::t('course', 'course') )) );
			$this->redirect(array('index'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$session=new CHttpSession;
		$session->open();		
		$criteria = new CDbCriteria(); 
		$merge = new CDbCriteria();

		$model= Courseoffer::model()->with('user','course','location');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Courseoffer']))
		{
			$model->attributes=$_GET['Courseoffer'];

			if (!empty($model->course->description)) $criteria->addCondition('id = "'.$model->id.'"');
			
			if (!empty($model->location->description)) $criteria->addCondition('description = "'.$model->description.'"');
			
			//if (!empty($model->fysiek_0)) $criteria->addCondition('fysiek = "'.$model->fysiek_0.'"');
			//if (!empty($model->fysiek_1)) $criteria->addCondition('fysiek = "'.$model->fysiek_1.'"');
			
			//if (!empty($model->blocked_0)) $criteria->addCondition('blocked = "'.$model->blocked_0.'"');
			//if (!empty($model->blocked_1)) $criteria->addCondition('blocked = "'.$model->blocked_1.'"');
			
			//if (!empty($model->course->required_0)) $criteria->addCondition('course.required = "'.$model->course->required_0.'"');
			//if (!empty($model->course->required_1)) $criteria->addCondition('course.required = "'.$model->course->required_1.'"');
					   
			//if(!empty($_GET['Courseoffer']['course_description'])) $merge->addCondition('course.description LIKE "%'. $_GET['Courseoffer']['course_description'] .'%"');
		   
			//if(!empty($_GET['Courseoffer']['location_description'])) $merge->addCondition('location.description LIKE "%'. $_GET['Courseoffer']['location_description'] .'%"');
		   
			//if(!empty($_GET['Courseoffer']['course_required'])) $merge->addCondition('course.required = "'. $_GET['Courseoffer']['course_required'] .'"');
					
		}
		 $session['Course_records']=Course::model()->findAll($criteria);
                 
		 $model->getDbCriteria()->mergeWith($merge);

		$this->render('index',array(
		'model'=>$model,
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
		$model=Courseoffer::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='courseoffer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function getCourseList()
        {
            $course = Course::model()->findAll();
            $bob = array();
            foreach($course as $co){
                $bob[$co->id] = $co->description;
            }
            return $bob;
        }
        public function getLocationList()
        {
            $loc = Location::model()->findAll();
            $bob = array();
            foreach($loc as $lo){
                $bob[$lo->id] = $lo->description;
            }
            return $bob;
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
	
	public function actionGenerateExcel()
	{
		$session=new CHttpSession;
		$session->open();		
		
		if(isset($session['Course_records']))
		{
			$model=$session['Course_records'];
		}
		else
			$model = CourseOffer::model()->findAll();
		
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

		if(isset($session['Course_records']))
		{
			$model=$session['Course_records'];
		}
		else
			$model = CourseOffer::model()->findAll();

		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('CourseOffer Report');
		$pdf->SetSubject('CourseOffer Report');
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
		$pdf->Output("Course_002.pdf", "I");
	}
}
