<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['oauth2'],
    'defaultRoute' => 'api/index',
    'modules' => [
        'oauth2' => [
            'class' => \filsh\yii2\oauth2server\Module::class,
            'tokenParamName' => 'accessToken',
            'tokenAccessLifetime' => 3600 * 24,
            'useJwtToken' => true,
            'storageMap' => [
                'user_credentials' => api\components\oauth2\UserCredentials::class,
                'public_key' => api\components\oauth2\PublicKeyStorage::class,
                'access_token' => \OAuth2\Storage\JwtAccessToken::class
            ],
            'grantTypes' => [
                'user_credentials' => [
                    'class' => \OAuth2\GrantType\UserCredentials::class
                ],
                'client_credentials' => [
                    'class' => \OAuth2\GrantType\ClientCredentials::class,
                    'allow_public_clients' => false,
                    'allow_credentials_in_request_body' => false
                ],
                'refresh_token' => [
                    'class' => \OAuth2\GrantType\RefreshToken::class,
                    'always_issue_new_refresh_token' => false,
                    'unset_refresh_token_after_use' => false
                ]
            ]
        ]
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'errorHandler' => [
//            'class' => api\components\ErrorHandler::class,
            'errorAction' => 'site/error',
        ],
        'user' => [
            'class' => api\components\oauth2\User::class,
            'identityClass' => api\components\oauth2\AppIdentity::class,
//            'identityClass' => 'common\models\User',
        ],
        /*'authClientCollection' => [
            'class' => \yii\authclient\Collection::class,
            'clients' => []
        ],*/
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(__DIR__ . '/routes.php'),
        ],
        'formatter' => [
            'timeZone' => 'UTC',
            'datetimeFormat' => $params['formats']['ISO8601'],
        ],
    ],
    'params' => $params
];
