<?php namespace App\Libraries;

use App\Services\BirdeyeService;

#[\AllowDynamicProperties]
class MyMIBirdeye
{
    protected BirdeyeService $service;

    public function __construct(?BirdeyeService $service = null)
    {
        $this->service = $service ?? new BirdeyeService();
    }

    public function getPrice(string $address): ?float
    {
        $res = $this->service->price($address);
        return $res['data']['value'] ?? null;
    }

    public function getTokenInfo(string $address): array
    {
        return $this->service->tokenInfo($address);
    }
}
?>
