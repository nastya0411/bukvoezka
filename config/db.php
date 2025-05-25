<?php


if (str_contains(__DIR__, "home")) {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=MariaDB-11.2;dbname=bookvoed',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',

        // Schema cache options (for production environment)
        //'enableSchemaCache' => true,
        //'schemaCacheDuration' => 60,
        //'schemaCache' => 'cache',
    ];
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=bzdgsnzc_m1',
    'username' => 'bzdgsnzc',
    'password' => 'hri7Y8',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];