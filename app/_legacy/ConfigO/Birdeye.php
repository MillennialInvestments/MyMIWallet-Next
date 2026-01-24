<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Birdeye extends BaseConfig
{
    public string $base = 'https://public-api.birdeye.so';
    public ?string $apiKey = null;
    public int $timeout = 10;
}
?>