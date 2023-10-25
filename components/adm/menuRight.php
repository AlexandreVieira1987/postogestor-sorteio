<?php

use app\models\User;

return [
    [
        'label' => User::getNameUserCurrent(),
        'template' => '<span>{label}<i class="has-subnav"></i></span>',
        'class' => 'navbar',
        'items' => [
            /*[
                'label' => 'Log',
                'url' => ['sis-log/index']
            ],*/
            /*[
                'label' => 'Usuários',
                'url' => ['adm-user/index']
            ],*/
            [
                'label' => 'Configurações',
                'url' => ['adm-config/index']
            ],
            [
                'label' => 'Sair',
                'url' => ['site/logout'],
            ],
        ]
    ],
];
