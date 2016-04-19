<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'ldap' => [
            'class'=>'Edvlerblog\Ldap',
            'options'=> [
                'ad_port'      => 389,
                'domain_controllers'    => array('10.11.50.5','10.11.50.7'),
                'account_suffix' =>  '@KPRU.local',
                'base_dn' => "OU=Maesot,DC=KPRU,DC=local",
                // for basic functionality this could be a standard, non privileged domain user (required)
                'admin_username' => 'ekrat_p',
                'admin_password' => 'nokann555'
            ]
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
