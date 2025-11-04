<?php
return [
    'callback' => 'http://localhost/gemini/callback.php',

    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys'    => [
                'id'     => 'PEGA_AQUÍ_TU_ID_DE_CLIENTE_DE_GOOGLE',
                'secret' => 'PEGA_AQUÍ_TU_SECRETO_DE_CLIENTE_DE_GOOGLE',
            ],
        ],
        'Facebook' => [
            'enabled' => false,
            'keys'    => ['id' => '', 'secret' => ''],
        ],
        'GitHub' => [
            'enabled' => false,
            'keys'    => ['id' => '', 'secret' => ''],
        ],
    ],
];