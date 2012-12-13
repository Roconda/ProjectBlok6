<?php
Yii::import('application.modules.user.controllers.YumStatisticsController');
/**
* Override YumStatisticsController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class StatisticsController extends YumStatisticsController {
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>