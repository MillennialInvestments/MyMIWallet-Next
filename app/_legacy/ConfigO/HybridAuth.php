<?php

return [
    'callback' => 'https://mymiwallet.com/auth/callback',
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys' => [
                'id' => 'your-google-client-id',
                'secret' => 'your-google-client-secret'
            ],
        ],
        'Facebook' => [
            'enabled' => true,
            'keys' => [
                'id' => 'your-facebook-app-id',
                'secret' => 'your-facebook-app-secret'
            ],
        ],
        'LinkedIn' => [
            'enabled' => true,
            'keys' => [
                'id' => 'your-linkedin-client-id',
                'secret' => 'your-linkedin-client-secret'
            ],
        ],
        'Discord' => [
            'enabled' => true,
            'keys' => [
                'id' => 'your-discord-client-id',
                'secret' => 'your-discord-client-secret'
            ],
        ],
    ],
    'debug_mode' => false,
    'debug_file' => '',
];
