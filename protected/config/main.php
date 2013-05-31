<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Community Online',
		
	'theme'=>'community',
	
	'sourceLanguage' => 'en',
	'language' => 'ru',
		
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.yii-mail.*',
	),
	'modules'=>array(
        'community',
		'society',
		'festival',
		'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
				'bootstrap.gii',
			),
		),
        'yiicCommandMap' => array(
            'email'=>array(
                'class'=>'ext.mailer.MailerCommand',
                'from'=>'aleksey@razbakov.com',
            ),
            'migrate'=>array(
                'class'=>'system.cli.commands.MigrateCommand',
                'migrationPath'=>'application.migrations',
                'migrationTable'=>'migrations',
                'connectionID'=>'db',
                'templateFile'=>'application.migrations.template',
            ),
        ),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap',
		),
			
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'/'=>'/site/index',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

// 		'db'=>array(
// 			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
// 		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=community',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
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
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'php',
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'aleksey@razbakov.com',
	),
);