<?php

// return [
//     'class' => 'yii\db\Connection',
//     'dsn' => 'mysql:host=localhost;dbname=yii2basic',
//     'username' => 'root',
//     'password' => '',
//     'charset' => 'utf8',

//     // Schema cache options (for production environment)
//     //'enableSchemaCache' => true,
//     //'schemaCacheDuration' => 60,
//     //'schemaCache' => 'cache',
// ];

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=104.128.64.217;dbname=mecanica',
    'username' => 'admin',
    'password' => 'admin@2021*',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];