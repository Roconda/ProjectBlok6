<?php
Yii::import('application.modules.role.controllers.YumPermissionController');
/**
* Override YumRoleController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class PermissionController extends YumPermissionController
{
	public function accessRules()
	{
		return array(
				array('allow',
					'actions'=>array('admin', 'create', 'index', 'delete'),
					'expression' => 'Yii::app()->user->isAdmin()'
					),
				array('deny',  // deny all other users
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