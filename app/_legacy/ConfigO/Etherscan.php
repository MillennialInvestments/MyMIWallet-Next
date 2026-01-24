<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Etherscan extends BaseConfig
{
    public string $base = 'https://api.etherscan.io/api';
    public ?string $apiKey = null;
    public int $timeout = 10;
}
?>