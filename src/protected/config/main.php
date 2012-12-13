<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.


// 	@author Tim Slot
// 	Added 04-12-2012
//
if(!is_readable(__DIR__.'/sql.inc.php')) {
	if(!copy(__DIR__.'/sql.inc.php.sample', __DIR__.'/sql.inc.php'))
		die("<h1>Kan sql bestand niet wegschrijven</h1>Wees er zeker van dat de webgebruiker schrijfrechten heeft");
}else
	require_once 'sql.inc.php';
// EO SQL stuff


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Avans DDCD',
	'language' => 'en_us',
	'sourceLanguage'=>'en',
	'defaultController' => 'user/auth',
	
	// preloading 'log' component
	'preload'=>array(
		'log',
		'bootstrap'
	),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
	),

	'modules'=>array(
		//yum config
		'user' => array(
			'debug' => false,
			'userTable' => 'user',
			'translationTable' => 'translation',
			'mailer' => 'swift',
			'returnUrl' => 'index.php/site/index',
			'usergroupTable' => 'user_group',
			'usergroupMessagesTable' => 'user_group_message',
			'controllerMap' => array(
				//'default'=>array('class'=>'YumModule.controllers.YumDefaultController'),
				'rest'=>array('class'=>'application.controllers.modules.user.RestController'),
				'csv'=>array('class'=>'application.controllers.modules.user.CsvController'),
				'auth'=>array('class'=>'application.controllers.modules.user.AuthController'),
				//'install'=>array('class'=>'YumModule.controllers.YumInstallController'),
				'statistics'=>array('class'=>'application.controllers.modules.user.StatisticsController'),
				'translation'=>array('class'=>'application.controllers.modules.user.TranslationController'),
				'user'=>array('class'=>'application.controllers.modules.user.UserController'),
				// workaround to allow the url application/user/login:
				'login'=>array('class'=>'application.controllers.modules.user.UserController')
			),
		),
		//yum config
		'registration' => array(
			'registrationEmail' => 'min06sog@gmail.com',
			'recoveryEmail' => 'min06sog@gmail.com',
			'controllerMap' => array(
				'registration'=>array('class'=>'application.controllers.modules.registration.RegistrationController'),
			),
		),
		'profile' => array(
		
		),
		//yum config
		'usergroup' => array(
			'controllerMap' => array(
				'groups'=>array('class'=>'application.controllers.modules.usergroup.UsergroupController'),
			),
		),
		//yum config
		'profile' => array(
			'privacySettingTable' => 'privacysetting',
			'profileFieldTable' => 'profile_field',
			'profileTable' => 'profile',
			'profileCommentTable' => 'profile_comment',
			'profileVisitTable' => 'profile_visit',
		),
		//yum config
		'role' => array(
			'roleTable' => 'role',
			'userRoleTable' => 'user_role',
			'actionTable' => 'action',
			'permissionTable' => 'permission',
			'controllerMap' => array(
				'action'=>array('class'=>'application.controllers.modules.role.ActionController'),
				'permission'=>array('class'=>'application.controllers.modules.role.PermissionController'),
				'role'=>array('class'=>'application.controllers.modules.role.RoleController'),
			),
		),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'foobar',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1', '192.168.56.1'),
			
			'generatorPaths'=>array(
            	'bootstrap.gii',
        	),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'application.models.User',
			'loginUrl' => array('//user/user/login'),
		),
		//yum config
		'cache' => array('class' => 'system.caching.CDummyCache'),
		'bootstrap'=>array(
	        'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
	    ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		 */
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host='.$database[DB_VER]['host'].';dbname='.$database[DB_VER]['db'],
			'emulatePrepare' => true,
			'username' => $database[DB_VER]['user'],
			'password' => $database[DB_VER]['passwd'],
			'charset' => 'utf8',
			'tablePrefix' => '',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		//SwiftMailer extention
		'swiftMailer' => array(
			'class' => 'ext.swiftMailer.SwiftMailer',
			// For SMTP
			'mailer' => 'smtp',
			'host'=>'smtp.gmail.com',
			'port'=>465,
			'From'=>'min06sog@gmail.com',
			'username'=>'min06sog@gmail.com',
			'password'=>'ditiseenwachtwoord',
			// For sendmail:
			'mailer'=>'sendmail',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'min06sog@gmail.com',
	),
);
