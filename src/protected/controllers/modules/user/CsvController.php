<?php
Yii::import('application.modules.user.controllers.YumCsvController');
/**
* Override YumCsvController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class CsvController extends YumCsvController
{
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>