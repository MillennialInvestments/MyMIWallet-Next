<?php

declare(strict_types=1);

namespace App\Integrations\Http;

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\CURLRequest;

class HttpClientFactory
{
    public function make(array $options = []): CURLRequest
    {
        $defaults = [
            'timeout' => 12,
            'http_errors' => false,
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'TBI-CI4-Core/1.0',
            ],
        ];

        return Services::curlrequest(array_replace_recursive($defaults, $options));
    }
}
