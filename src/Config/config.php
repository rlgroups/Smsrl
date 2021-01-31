<?php

return [
    'server'    => env('SMSRL_SERVER', ''),
    'user'    => env('SMSRL_KEY', ''),
    'password' => env('SMSRL_SECRET', ''),
    'curl' => [
        // 'curl' => [CURLOPT_SSL_VERIFYPEER => false],
        // 'verify' => false,
    ],
    'test_phone' => env('SMSRL_TEST_PHONE', ''),
];
