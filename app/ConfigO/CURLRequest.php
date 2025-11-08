<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class CURLRequest extends BaseConfig
{
    /** @var array<string, mixed> */
    public array $shareOptions = [
        'timeout'         => 10,
        'connect_timeout' => 5,
        'http_errors'     => false,
    ];
}
