<?php
/**
* Override YumUserController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class UserController extends YumUserController {
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>