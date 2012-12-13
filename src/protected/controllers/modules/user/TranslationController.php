<?php
Yii::import('application.modules.user.controllers.YumTranslationController');
/**
* Override YumTranslationController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class TranslationController extends YumTranslationController
{
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>
