<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Kimi extends BaseConfig
{
    public string $apiKey   = '';
    public string $apiBase  = 'https://api.moonshot.ai/v1';
    public string $model    = 'kimi-k2-turbo-preview';
    public float $timeout   = 15.0;
    public array $headers   = [];

    public function __construct()
    {
        parent::__construct();

        $this->apiKey  = (string) (env('KIMI_API_KEY') ?: $this->apiKey);
        $this->apiBase = rtrim((string) (env('KIMI_API_BASE') ?: $this->apiBase), '/');
        $this->model   = (string) (env('KIMI_MODEL') ?: $this->model);

        $this->headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => $this->apiKey !== '' ? 'Bearer ' . $this->apiKey : '',
        ];
    }
}