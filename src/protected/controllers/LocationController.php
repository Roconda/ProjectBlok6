<?php

class LocationController extends Controller
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
				'expression'=> "yii::app()->user->can('location_create')",
			),
			array('allow', // allow authenticated user to perform the following
				'actions'=>array('index','view','generatepdf','generateexcel'),
				'expression'=> "yii::app()->user->can('location_read')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update'),
				'expression'=> "yii::app()->user->can('location_update')",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=> "yii::app()->user->can('location_delete')",
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
		$model=new Location;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Location']))
		{
			$model->attributes=$_POST['Location'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} added', array('{model}' => Yii::t('location', 'location') )) );
				$this->redirect(array('index'));
			}
			else
			{
				Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to add', array('{model}' => Yii::t('location', 'location') )) );
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

		if(isset($_POST['Location']))
		{
			$model->attributes=$_POST['Location'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} updated', array('{model}' => Yii::t('location', 'location') )) );
				$this->redirect(array('index'));
			}
			else
			{
				Yii::app()->user->setFlash('warning', Yii::t('main', '{model} failed to update', array('{model}' => Yii::t('location', 'location') )) );
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
			
			Courseoffer::model()->updateAll(array('location_id'=>0),"location_id = $id");
			
			// we only allow deletion via POST request
			if( $this->loadModel($id)->delete() )
			{
				Yii::app()->user->setFlash('success', Yii::t('main', '{model} deleted', array('{model}' => Yii::t('location', 'location') )) );
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $session=new CHttpSession;
            $session->open();
            $criteria = new CDbCriteria();
            
            $model=new Location('search');
            $model->unsetAttributes();  // clear any default values
            $dbcriteria = $model->getDbCriteria();
            $dbcriteria->addCondition('id >= 1');
            
            if(isset($_GET['Location']))
            {
                $model->attributes=$_GET['Location'];
                
                if (!empty($model->id)) $criteria->addCondition('id = "'.$model->id.'"');
                
                if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
            }
            $session['Location_records']=Location::model()->findAll($criteria); 
			
            $model->getDbCriteria()->mergeWith($dbcriteria);
            
            $this->render('index',array('model'=>$model,));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Location('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Location']))
			$model->attributes=$_GET['Location'];

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
		$model=Location::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='location-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['Location_records']))
               {
                $model=$session['Location_records'];
               }
               else
                 $model = Location::model()->findAll();

		
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


               if(isset($session['Location_records']))
               {
                $model=$session['Location_records'];
               }
               else
                 $model = Location::model()->findAll();

		

		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Location Report');
		$pdf->SetSubject('Location Report');
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
		$pdf->Output("Location_002.pdf", "I");
	}
}
