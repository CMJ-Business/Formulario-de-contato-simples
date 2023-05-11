<?php

return [
    'email_host' => 'localhost',
    'email_port' => 1025,
    'email_smtp_auth' => false,
    'email_username' => null,
    'email_password' => null,
    'email_smtp_secure' => false,
    'email_from' => 'contato+form@site.com',
    'email_to_default' => 'destino+form@site.com',
    'email_receivers' => [
        'setor@site.com',
        'setor2@site.com',
    ],
    'setores' => [
        'rh' => [
            'rh@site.com',
            'rh3@site.com',
        ],
        // 'financeiro' => [
        //     'financeiro@site.com',
        //     'financeiro2@site.com',
        // ],
        // 'administrativo' => [
        //     'administrativo@site.com',
        //     'administrativo2@site.com',
        // ],
        'outros' => [
            'outros@site.com',
            'outros2@site.com',
        ],
    ],
];
