<?php namespace App\Libraries;

use App\Services\CoinGeckoService;

#[\AllowDynamicProperties]
class MyMICoinGecko
{
    protected CoinGeckoService $service;

    public function __construct(?CoinGeckoService $service = null)
    {
        $this->service = $service ?? new CoinGeckoService();
    }

    public function getPrice(string $id, string $vs = 'usd'): ?float
    {
        $res = $this->service->simplePrice([$id], [$vs]);
        return $res[$id][$vs] ?? null;
    }

    public function getCoinInfo(string $id): array
    {
        return $this->service->coinInfo($id);
    }
}
?>
