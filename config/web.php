<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
	'language' => 'sl', // slovenian
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules' => [
		'user' => [
			'class' => 'dektrium\user\Module',
			'enableUnconfirmedLogin' => true,
			'confirmWithin' => 21600,
			'cost' => 12,
            'modelMap' => [
                    'User' => 'app\models\User',
            ],
			'admins' => ['gams']
		],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
        ],
	],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hXIX30R6HnnDpalq9AyDL9VX3cd5QC_w',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@app/mailer',
			'useFileTransport' => false,
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.gmail.com',
				'username' => 'bind@triing.si',
				'password' => 'P0veziMe!',
				'port' => '465',
				'encryption' => 'ssl',
            ],
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
        'db' => require(__DIR__ . '/db.php'),
		'urlManager' => [
			'showScriptName' => false,
			'enablePrettyUrl' => true,
			'rules' => [
				'status' => 'status/index',
				'status/index' => 'status/index',
				'status/create' => 'status/create',
				'status/view/<id:\d+>' => 'status/view',  
				'status/update/<id:\d+>' => 'status/update',  
				'status/delete/<id:\d+>' => 'status/delete',  
				'status/<slug>' => 'status/slug',
				'defaultRoute' => '/site/index',
			],
        ],  
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
		'allowedIPs' => ['86.58.21.177'],
    ];
}

return $config;
