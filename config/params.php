<?php

/*
 *
 * Conta Gmail:
 * user: site.libaps@gmail.com
 * pass: libaps2322
 *
 * Emails:
 * user: contato@libaps.org
 * pass: n2QQ@zq^uUZwSv
 *
 * user: noreply@libaps.org
 * pass: n2QQ@zq^uUZwSv
 *
 *
 *
 * Site inspiração: https://logrocket.com/
 * http://preview.themeforest.net/item/charity-foundation-html-template/full_screen_preview/11892194?_ga=2.229121812.947005298.1631552902-606506970.1631552886
 */

if (file_exists(dirname(__DIR__) . '/local.txt')) {
    return [
        'adminEmail' => 'admin@example.com',
        'senderEmail' => 'no-reply@webaze.com.br',
        'receiverEmail' => 'site.libaps@gmail.com',
        'senderName' => 'Example.com mailer',
        'host' => 'http://localhost:5600',
        'app_env' => 'local'
    ];
}

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => '',
    'receiverEmail' => '',
    'senderName' => 'Example.com mailer',
    'host' => 'https://webaze.com.br/postogestor-sorteio',
    'app_env' => 'production'
];
