<?php
Yii::import('application.modules.profile.controllers.YumProfileController');
/**
* Override YumProfileController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class ProfileController extends YumProfileController {
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>