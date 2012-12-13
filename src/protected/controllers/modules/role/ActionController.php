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
}
?>