<?php

namespace App\Services\Infrastructure;

use Predis\Client;

class RedisService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'scheme'   => 'tcp',
            'host'     => env('redis.host') ?: '127.0.0.1',
            'port'     => (int) (env('redis.port') ?: 6380),
            'password' => env('redis.password') ?: null,
            'database' => (int) (env('redis.database') ?: 0),
        ]);
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function ping(): string
    {
        return (string) $this->client->ping();
    }
}
