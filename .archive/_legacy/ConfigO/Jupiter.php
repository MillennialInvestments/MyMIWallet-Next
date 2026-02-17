<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Jupiter extends BaseConfig
{
    public string $base = 'https://quote-api.jup.ag';
    public string $priceBase = 'https://price.jup.ag';
    public ?string $apiKey = null;
    public int $timeout = 12;
}
?>