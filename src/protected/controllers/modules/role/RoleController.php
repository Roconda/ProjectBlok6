<?php
Yii::import('application.modules.role.controllers.YumRoleController');
/**
* Override YumRoleController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class RoleController extends YumRoleController {
	public function accessRules() {
		//add these rules before the parent::accessRules, becouse deny must be at the end.
		return array(
			/*	array('allow',
					'actions'=>array('create'),
					'expression' => 'Yii::app()->user->can("role_create")'
				),*/
				array('allow',
					'actions'=>array('index', 'view'),
					'expression' => 'Yii::app()->user->can("role_read")'
				),
				array('allow',
					'actions'=>array('update'),
					'expression' => 'Yii::app()->user->can("role_update")'
				),
				array('allow',
					'actions'=>array('delete'),
					'expression' => 'Yii::app()->user->can("role_delete")'
				),
			)
			+ (array) parent::accessRules();
	}

	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>