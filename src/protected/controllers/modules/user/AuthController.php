<?php
Yii::import('application.modules.user.controllers.YumAuthController');
/**
* Override YumAuthController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class AuthController extends YumAuthController {
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>