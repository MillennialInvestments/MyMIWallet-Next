<?php namespace App\Services;

use Config\Birdeye;

class BirdeyeService
{
    protected Birdeye $cfg;

    public function __construct(?Birdeye $cfg = null)
    {
        $this->cfg = $cfg ?? config('Birdeye');
    }

    protected function http()
    {
        return \Config\Services::curlrequest();
    }

    protected function request(string $method, string $url, array $options = [], int $attempts = 3)
    {
        for ($i = 0; $i < $attempts; $i++) {
            $resp = $this->http()->request($method, $url, $options + ['timeout' => $this->cfg->timeout]);
            $code = $resp->getStatusCode();
            if ($code >= 200 && $code < 300) {
                return json_decode((string)$resp->getBody(), true) ?? [];
            }
            if ($code === 429 || $code >= 500) {
                sleep((int) pow(2, $i));
                continue;
            }
            break;
        }
        return [];
    }

    protected function headers(): array
    {
        $h = ['Accept' => 'application/json'];
        if (!empty($this->cfg->apiKey)) {
            $h['X-API-KEY'] = $this->cfg->apiKey;
        }
        return $h;
    }

    public function price(string $address): array
    {
        $url = rtrim($this->cfg->base, '/').'/public/price';
        $cacheKey = 'birdeye_price_'.$address;
        $cacheKeySanitized = \sanitizedCacheKey($cacheKey);
        $cache = cache();
        if ($cached = $cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $res = $this->request('get', $url, [
            'headers' => $this->headers(),
            'query' => ['address' => $address]
        ]);
        $cache->save($cacheKeySanitized, $res, 60);
        return $res;
    }

    public function tokenInfo(string $address): array
    {
        $url = rtrim($this->cfg->base, '/').'/public/token';
        return $this->request('get', $url, [
            'headers' => $this->headers(),
            'query'   => ['address' => $address]
        ]);
    }
}
?>