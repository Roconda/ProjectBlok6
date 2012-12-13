<?php
Yii::import('application.modules.profile.controllers.YumFieldsController');
/**
* Override YumFieldsController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class FieldsController extends YumFieldsController
{
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>