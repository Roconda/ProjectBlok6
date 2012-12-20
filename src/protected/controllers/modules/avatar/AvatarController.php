<?php
Yii::import('application.modules.avatar.controllers.YumAvatarController');

/**
* Override YumAvatarController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class AvatarController extends YumAvatarController {
	
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
