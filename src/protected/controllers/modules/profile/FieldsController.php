<?php
Yii::import('application.modules.profile.controllers.YumFieldsController');
/**
* Override YumFieldsController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class FieldsController extends YumFieldsController
{
	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array('index', 'create', 'update', 'view', 'admin','delete'),
				'users'=>array('admin'),
				),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>