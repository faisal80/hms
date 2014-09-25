<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Housing Management System',

	//added with YiiStrap
	'aliases' => array(
        'booster' => realpath(__DIR__ . '/../extensions/yiibooster'), // Yiibooster
//		'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'),
		// yiiwheels configuration
//        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'),
	),
	// preloading 'log' component
	'preload'=>array(
        'log',
        'booster',
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.rights.*', //rights module
        'application.modules.rights.components.*',  //rights module components
//		'bootstrap.helpers.*', //Yiistrap
//        'bootstrap.behaviors.*', //Yiistrap
//        'bootstrap.widgets.*', //Yiistrap
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'mygii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths' => array('booster.gii'), //Yiibooster
		),
        
        // rights module
        'rights'=>array(
            'superuserName'=>'admin',
//            'enableBizRuleData'=>true,
//            'install'=>true,    //Enable the installer
        ),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
            'class'=>'WebUser'      // i've already extended my WebUser class from RWebUser
//            'class'=>'RWebUser',    //amended by rights module
		),

        //Auth Manager
        'authManager'=>array(
            'class'=>'RDbAuthManager',   //Class provided by rights module
            'connectionID'=>'db',
        ),
        
        // uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
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
			'connectionString' => 'mysql:host=localhost;dbname=hms',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'agdiary01',
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
        
        //Yiibooster
        'booster' => array(
            'class' => 'booster.components.Booster',
            'fontAwesomeCss'=>true,
        ),
        
		
        //Yiistrap
//		'bootstrap' => array(
//            'class' => 'bootstrap.components.TbApi',   
//        ),
		// yiiwheels configuration
//        'yiiwheels' => array(
//            'class' => 'yiiwheels.YiiWheels',   
//        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'faisalnazir80@gmail.com',
	),
);