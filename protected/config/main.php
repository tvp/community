<?php

function t($message, $params = '') {
    return Yii::t('core', $message, $params);
}

Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Community Online',

    'theme' => 'community',

    'sourceLanguage' => 'en',
    'language' => 'ru',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.yii-mail.*',
    ),

    'modules' => array(
        'community',
        'society',
        'festival',
        'admin',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
        ),

        'yiicCommandMap' => array(
            'email' => array(
                'class' => 'ext.mailer.MailerCommand',
                'from' => 'aleksey@razbakov.com',
            ),
            'migrate' => array(
                'class' => 'system.cli.commands.MigrateCommand',
                'migrationPath' => 'application.migrations',
                'migrationTable' => 'migrations',
                'connectionID' => 'db',
                'templateFile' => 'application.migrations.template',
            ),
        ),
    ),

    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
        ),

        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),

        'urlManager' => array(
            'class' => 'application.extensions.urlManager.LangUrlManager',
            'languages' => array('ru', 'en'),
            'urlFormat' => 'path',
            'showScriptName' => true,
            'rules' => array(
                '<lang:(ru|en)>/<_c>/<_a>' => '<_c>/<_a>',
                '<lang:(ru|en)>/<_c>' => '<_c>',
                '<lang:(ru|en)>/' => '',
            ),
        ),

        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=community',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),

        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'aleksey@razbakov.com',
    ),
);