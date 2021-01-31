<?php

return [
    'server'    => env('SMSRL_SERVER', 'http://80.179.185.164:8081/SMS/SendMassage.php?'),
    'user'    => env('SMSRL_KEY', ''),
    'password' => env('SMSRL_SECRET', ''),
    'curl' => [
        // 'curl' => [CURLOPT_SSL_VERIFYPEER => false],
        // 'verify' => false,
    ],
    'test_phone' => env('SMSRL_TEST_PHONE', '0502081560,0556667777'),
];
