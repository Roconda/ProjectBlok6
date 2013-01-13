<?php

class CourseController extends Controller
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
				'expression'=> "yii::app()->user->can('course_create')",
			),
			array('allow', // allow authenticated user to perform the following
				'actions'=>array('index','view','generatepdf','generateexcel'),
				'expression'=> "yii::app()->user->can('course_read')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update'),
				'expression'=> "yii::app()->user->can('course_update')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=> "yii::app()->user->can('course_delete')",
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
        
        /**	
        public function actionView($id)
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
		$model=new Course;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Course']))
		{
                    $model->attributes=$_POST['Course'];
                    
			
			if($model->save()) {
				$cid = $model->id;
				foreach(Relation::retrieveValues($_POST) as $trajectid) {
					$connection=Yii::app()->db;
					$sql="INSERT INTO course_has_traject (traject_id, course_id)
						VALUES(:traject_id,:course_id)";
					$command = $connection->createCommand($sql);
					$command->bindParam(":traject_id", $trajectid, PDO::PARAM_STR);
					$command->bindParam(":course_id", $cid, PDO::PARAM_STR);
					$command->execute();
				}
				
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} added', array('{model}' => Yii::t('course', 'course') )) );
				$this->redirect(array('index'));
			}
			else
			{
				Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to add', array('{model}' => Yii::t('course', 'course') )) );
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

		if(isset($_POST['Course']))
		{
			
			$connection=Yii::app()->db;
			$model->attributes=$_POST['Course'];
			if($model->save())
			{
				$trajectids = array();
				foreach(Relation::retrieveValues($_POST) as $trajectid) {
					$trajectids[] = $trajectid;
				}
				
				//deletes non-existing course/traject links
                                if(!empty($trajectids)) {
				$sql="DELETE FROM course_has_traject
                                WHERE course_id = $id AND traject_id NOT IN (";
				foreach($trajectids as $trajectid) {
					$sql .= $trajectid . ',' ;
				}
				$sql = substr_replace($sql ,")",-1);
                                $command = $connection->createCommand($sql);
				$command->execute();
                                }
				
				//inserts new course/traject links
				$criteria = new CDbCriteria();
				$criteria->addCondition("course_id = $id");
				$result = CourseHasTraject::model()->findAll($criteria);
				foreach($trajectids as $trajectid) {
					$found = false;
					foreach($result as $ct){
						if($trajectid == $ct['traject_id'])
							$found = true;
					}
					if(!$found) {
						$sql="INSERT INTO course_has_traject
							  VALUES ($id , $trajectid)";
						$command = $connection->createCommand($sql);
						$command->execute();
					}
				}
				
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} updated', array('{model}' => Yii::t('course', 'course') )) );
				$this->redirect(array('index'));
			}
			else
			{
				Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to updated', array('{model}' => Yii::t('course', 'course') )) );
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

		$model=new Course('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Course']))
		{
			$model->attributes=$_GET['Course'];
			if (!empty($model->id)) $criteria->addCondition('id = "'.$model->id.'"');
			
			if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
		 
			if (!empty($model->required_0)) $criteria->addCondition('required = "'.$model->required_0.'"'); 
			
			if (!empty($model->required_1)) $criteria->addCondition('required = "'.$model->required_1.'"'); 
		}
		$session['Course_records']=Course::model()->findAll($criteria);

		$this->render('index',array(
		'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Course('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Course']))
			$model->attributes=$_GET['Course'];

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
		$model=Course::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='course-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
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
                 $model = Course::model()->findAll();

		
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
			 $model = Course::model()->findAll();

		

		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Course Report');
		$pdf->SetSubject('Course Report');
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
