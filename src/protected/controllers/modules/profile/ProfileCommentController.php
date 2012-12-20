<?php
Yii::import('application.modules.profile.controllers.YumProfileCommentController');
/**
* Override YumProfileCommentController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class ProfileCommentController extends YumProfileCommentController
{
	public function accessRules()
	{
		return array(
				array('allow', 
					'actions'=>array('admin', 'create', 'index', 'delete'),
					'users'=>array('admin'),
					),
				array('deny', 
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