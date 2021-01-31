<?php

namespace Rlgroups\Smsrl\Services;

use GuzzleHttp\Client;
use InvalidArgumentException;

class Smsrl
{
    public static function send($phone, $text, $config = null, $method='POST')
    {
        if (! $config) {
            $config = config('smschannel');
        }

        if (app('env') != 'production') {
            $phone = $config['test_phone'] ?? '';
        }

        if (! $config['user']) {
            return;
        }

        $client = new Client($config['curl'] ?? []);

        $params = array_merge(
            collect($config)->only(['user', 'password'])->toArray() ,
            compact('phone', 'text')
        );

        if ($method == 'GET') {
            $queryType = 'query';
            $queryParams = http_build_query($params);
        } else {
            $queryType = 'form_params';
            $queryParams = $params;
        }

        $res = $client->request($method, $config['server'], [
            $queryType => $queryParams
        ]);

        return json_decode($res->getBody(), TRUE);
    }
}
