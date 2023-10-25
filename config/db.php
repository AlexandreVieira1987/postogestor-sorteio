<?php

if (file_exists(dirname(__DIR__) . '/local.txt')) {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=container_mysql;dbname=postogestor_sorteio',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8'
    ];
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=u170078369_libaps',
    'username' => 'u170078369_libaps',
    'password' => '3d2&|8oR#',
    'charset' => 'utf8'
];
