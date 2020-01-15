<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'TPsFKmMyYSJvkaPVJ_pm1CTb-jkPuQc2',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'GET api/plots/<gameId:\d+>' => 'api/plot/plots',
                'GET api/sessions/<plotId:\d+>' => 'api/session/sessions',
                'GET api/calendar/<sessionId:\d+>' => 'api/date/calendar',

                'POST api/<controller>/record' => 'api/<controller>/record',
                'GET api/<controller>/<id:\d+>' => 'api/<controller>/view',

                'admin/<controller>/<action>/<id:\d+>' => 'admin/<controller>/<action>',
                'admin/<controller>/<action>' => 'admin/<controller>/<action>',

                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['api/game']
                ],

                'GET api/<controller>/plots/<gameId:\d+>' => 'api/<controller>/plots',
                'GET api/<controller>/sessions/<plotId:\d+>' => 'api/<controller>/sessions',
                'GET api/<controller>/dates/<sessionId:\d+>' => 'api/<controller>/dates'
            ],

        ],
    ],
    ////////////
    'params' => $params,
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\ApiModule'
        ],
        'admin' => [
            'class' => 'app\modules\admin\AdminModule'
        ]
    ]

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
