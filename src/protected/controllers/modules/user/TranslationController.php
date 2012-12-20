<?php
Yii::import('application.modules.user.controllers.YumTranslationController');
/**
* Override YumTranslationController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class TranslationController extends YumTranslationController
{
	public function accessRules()
	{
		return array(
				array('allow', 
					'actions'=>array('create','update', 'admin', 'delete'),
					'users' => array('admin')
					),
				array('deny',  // deny all users
					'users'=>array('*'),
					),
				);
	}

	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>
