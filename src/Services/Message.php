<?php

namespace Rlgroups\Smsrl\Services;

use GuzzleHttp\Client;
use InvalidArgumentException;

class Message
{
    protected $arrayMessage = [];

    public function line($text = '')
    {
        array_push($this->arrayMessage, $text);

        return $this;
    }

    public function toString()
    {
        return implode("\r\n", $this->arrayMessage);
    }
}
