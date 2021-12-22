<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'Backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => [

//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//        ],
//        'formatter' => [
//            'class' => 'yii\i18n\Formatter',
//            'nullDisplay' => '',
//        ],

    
      
        'request' => [
            'cookieValidationKey' => 'JDqkJaMgIITAKcsJY6yvLQdM9jf7WghX',
        ],
        'pdf' => [
            'class' => 'backend\components\ExportToPdf',
        ],
        'excel' => [
            'class' => 'backend\components\ExportToExcel',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'getid' => [
            'class' => 'backend\components\GetUserId',
        ],
        'dateformatter' => [
            'class' => 'backend\components\DateFormat',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                //'sourceLanguage' => 'en-US',
                /* 'fileMap' => [
                  'app' => 'app.php',
                  'app/error' => 'error.php',
                  ], */
                ],
                'yii*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'course*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'stu*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'emp*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'dash*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'fees*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'report*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'urights*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' => 'php:d M Y ',
            'datetimeFormat' => 'php:d-m-Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'Rp.',
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'UTC',
            'timeZone' => 'Asia/Jakarta',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
    'modules' => [
//        'telegram' => [
//            'class' => 'onmotion\telegram\Module',
//            'API_KEY' => '541751703:AAHhTh5p-2X6ncK5kZtTgv1RFICDEF5qSbg',
//            'BOT_NAME' => 'nento_bot',
//            'hook_url' => 'https://localhost/siap/web/index.php?r=telegram/default/hook', // must be https!
//            'PASSPHRASE' => 'passphrase for login'
//        ],
        'telegram' => [
            'class' => 'onmotion\telegram\Module',
            'API_KEY' => '664364153:AAFedIUZVFWyJ50SLzHDurX2ab_ySE-U0Sw',
            'BOT_NAME' => '@SulbagtaraBot',
            'hook_url' => 'https://localhost/siap/web/telegram/default/hook', // must be https!
            'PASSPHRASE' => 'passphrase for login'
        ],
        'chat' => [
            'class' => 'slavkovrn\chat\ChatModule',
            'numberLastMessages' => 30,
        ],
        'markdown' => [
            // the module class
            'class' => 'kartik\markdown\Module',
            // the controller action route used for markdown editor preview
            'previewAction' => '/markdown/parse/preview',
            // the list of custom conversion patterns for post processing
            'customConversion' => [
                '<table>' => '<table class="table table-bordered table-striped">'
            ],
            // whether to use PHP SmartyPantsTypographer to process Markdown output
            'smartyPants' => true
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
        // other module settings
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        // other module settings
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module'
        ],
        'dashboard' => 'backend\modules\dashboard\DashboardModule',
        'news' => 'backend\modules\news\newsModule',
        'p2' => 'backend\modules\p2\Module',
        'pos' => 'backend\modules\pos\Module',
        'pegawai' => 'backend\modules\pegawai\Module',
        'setting' => 'backend\modules\setting\Module',
    ],
];
