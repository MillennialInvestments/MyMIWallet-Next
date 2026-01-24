<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class CoinGecko extends BaseConfig
{
    public string $base = 'https://api.coingecko.com/api/v3';
    public ?string $apiKey = null;
    public int $timeout = 10;
}