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
    'dsn' => 'mysql:host=localhost;dbname=u170078369_pg_sorteio',
    'username' => 'u170078369_pg_sorteio',
    'password' => 'n2QQ@zq^uUZwSv',
    'charset' => 'utf8'
];
