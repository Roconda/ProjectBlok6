<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	//TODO: dit ook werkend maken voor de Yum-controllers
	//voor language-picker zo instellen, alleen dit werkt niet voor de extentie controllers, daarom heb ik voor nu de import en setLanguage geplaatst in de nav_horizontal.php
	//http://www.yiiframework.com/extension/language-picker
	public function init()
	{
		self::initELangPick();
		parent::init();
	}
	
	/**
	* Function for loading the extention.ELangPick. This method must be called (by every controller) when the widget is shown.
	*/
	public static function initELangPick()
	{
		Yii::import('ext.LangPick.ELangPick'); 
		ELangPick::setLanguage();
	}
}