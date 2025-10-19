<?php namespace App\Libraries;

use App\Services\CryptoPanicService;

#[\AllowDynamicProperties]
class MyMICryptoPanic
{
    protected CryptoPanicService $service;

    public function __construct(?CryptoPanicService $service = null)
    {
        $this->service = $service ?? new CryptoPanicService();
    }

    public function latest(array $params = []): array
    {
        return $this->service->latest($params);
    }

    public function search(string $query): array
    {
        return $this->service->latest(['q' => $query]);
    }
}
?>
