<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class CryptoPanic extends BaseConfig
{
    public string $base = 'https://cryptopanic.com/api/v1';
    public ?string $apiKey = null;
    public int $timeout = 8;
}