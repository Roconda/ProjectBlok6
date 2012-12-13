<?php
Yii:import('application.modules.usergroup.controllers.YumUsergroupController');
/**
* Override YumUsergroupController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class UsergroupController extends YumUsergroupController {
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>