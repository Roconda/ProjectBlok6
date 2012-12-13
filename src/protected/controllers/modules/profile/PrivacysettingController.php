<?php
Yii::import('application.modules.profile.controllers.YumPrivacysettingController');
/**
* Override YumPrivacysettingController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class PrivacysettingController extends YumPrivacysettingController
{
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>