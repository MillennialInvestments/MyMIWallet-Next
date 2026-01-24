<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class DigiByte extends BaseConfig
{
    public string $provider = 'sochain';
    public string $base = 'https://sochain.com/api/v2';
    public int $timeout = 10;
}