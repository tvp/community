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
        'society',
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
                '<lang:(ru|en)>' => '',
                '<lang:(ru|en)>/society/accounts/confirm/<hash>' => 'society/accounts/confirm',
                '<lang:(ru|en)>/<module:\\w+>/<controller:\\w+>/<action:\\w+>' => '<module>/<controller>/<action>',
                '<lang:(ru|en)>/<module:\\w+>/<controller:\\w+>' => '<module>/<controller>',
                '<lang:(ru|en)>/<module:\\w+>' => '<module>',
                '<lang:(ru|en)>/<_c>/<_a>' => '<_c>/<_a>',
                '<lang:(ru|en)>/<_c>' => '<_c>',
            ),
        ),

        'db' => require(dirname(__FILE__).'/database.php'),

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
            'logging' => false,
            'dryRun' => false
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'support@razbakov.com',
    ),
);