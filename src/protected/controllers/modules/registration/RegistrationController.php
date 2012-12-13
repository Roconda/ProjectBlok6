<?php
Yii::import('application.modules.registration.controllers.YumRegistrationController');
/**
* Override YumRegistrationController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class RegistrationController extends YumRegistrationController {
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>