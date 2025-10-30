<?php namespace App\Libraries;

use App\Services\JupiterService;

#[\AllowDynamicProperties]
class MyMIJupiter
{
    protected JupiterService $service;

    public function __construct(?JupiterService $service = null)
    {
        $this->service = $service ?? new JupiterService();
    }

    public function quote(array $params): array
    {
        return $this->service->quote($params);
    }

    public function swap(array $payload): array
    {
        return $this->service->swap($payload);
    }

    public function prices(array $ids): array
    {
        return $this->service->prices($ids);
    }

    public function tokenList(): array
    {
        return $this->service->tokenList();
    }
}
