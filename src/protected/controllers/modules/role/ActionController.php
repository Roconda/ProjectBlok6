<?php
Yii::import('application.modules.role.controllers.YumActionController');
/**
* Override YumRoleController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class ActionController extends YumActionController {
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
	
	public function accessRules() {
		return array(
			array('allow',  
				'actions'=>array('index','view','admin'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('create','update', 'delete'),
				'users'=>array('admin'),
			),
			array('deny',  
				'users'=>array('*'),
			),
		);
	}
}
?>