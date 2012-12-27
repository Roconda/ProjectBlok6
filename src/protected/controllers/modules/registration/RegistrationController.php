<?php
Yii::import('application.modules.registration.controllers.YumRegistrationController');
/**
* Override YumRegistrationController for calling the Controller::initELangPick() and overriding the #accessRules().
*/
class RegistrationController extends YumRegistrationController {
	
	public function init()
	{
		Yii::import('application.components.Controller');
		Controller::initELangPick();
		parent::init();
	}
	
	/**
	* Override en copy van de #actionRegistration uit YumRegistrationController, hierbij is toegevoegd dat 
	*/
	public function actionRegistration() {
		// When we overrie the registrationUrl, this one is not valid anymore!
		if(Yum::module('registration')->registrationUrl != array(
					'//registration/registration/registration'))
			throw new CHttpException(403);

		Yii::import('application.modules.profile.models.*');
		$form = new YumRegistrationForm;
		$profile = new YumProfile;

		$this->performAjaxValidation('YumRegistrationForm', $form);

		if (isset($_POST['YumRegistrationForm'])) { 
			$form->attributes = $_POST['YumRegistrationForm'];
			$profile->attributes = $_POST['YumProfile'];

			$form->validate();
			$profile->validate();

			if(!$form->hasErrors() && !$profile->hasErrors()) {
				$user = new YumUser;
				$user->register($form->username, $form->password, $profile->email);
				//toegevoegde deel
				$default_register_role = Yii::app()->params['default_register_role'];
				$user->roles = array($default_register_role => "$default_register_role");
				$user->save();
				
				$profile->user_id = $user->id;
				$profile->save();
				
				$this->sendRegistrationEmail($user);
				Yum::setFlash('Thank you for your registration. Please check your email.');
				$this->redirect(Yum::module()->loginUrl);
			}
		} 

		$this->render(Yum::module()->registrationView, array(
					'form' => $form,
					'profile' => $profile,
					)
				);  
	}
}
?>