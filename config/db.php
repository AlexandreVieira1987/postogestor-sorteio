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
    'dsn' => 'mysql:host=localhost;dbname=pg_sorteio',
    'username' => 'pg_sorteio',
    'password' => 'n2QQ@zq^uUZwSv',
    'charset' => 'utf8'
];
