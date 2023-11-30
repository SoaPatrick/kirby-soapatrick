<?php

return [
    'methods' => [
        'password' => ['2fa' => true]
    ],
    'challenge' => [
        'timeout' => 1 * 60,
        'email' => [
            'from'     => 'login-code@domain.com',
            'fromName' => 'Domain.com',
            'subject'  => 'Login code'
        ]
    ]
];
