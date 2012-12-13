<?php
Yii::import('application.modules.user.controllers.YumRestController');
/**
 * This function implements the RESTful Api features of yii-user-management
 * @since 0.8rc2 
 **/
class RestController extends YumRestController	
{
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
}
?>
