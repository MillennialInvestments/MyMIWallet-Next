<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Infura extends BaseConfig
{
    public string $base = 'https://mainnet.infura.io/v3';
    public ?string $projectId = null;
    public int $timeout = 10;
}
?>