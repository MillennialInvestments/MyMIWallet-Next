<?php namespace App\Services;

use Config\Jupiter;

class JupiterService
{
    protected Jupiter $cfg;

    public function __construct(?Jupiter $cfg = null)
    {
        $this->cfg = $cfg ?? config('Jupiter');
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
            $h['x-api-key'] = $this->cfg->apiKey;
        }
        return $h;
    }

    public function quote(array $q): array
    {
        $url = rtrim($this->cfg->base, '/').'/v6/quote';
        $cacheKey = 'jup_quote_'.md5(json_encode($q));
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cache = cache();
        if ($cached = $cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $res = $this->request('get', $url, [
            'headers' => $this->headers(),
            'query'   => $q,
        ]);
        $cache->save($cacheKeySanitized, $res, 5);
        return $res;
    }

    public function swap(array $payload): array
    {
        $url = rtrim($this->cfg->base, '/').'/v6/swap';
        return $this->request('post', $url, [
            'headers' => ['Content-Type' => 'application/json'] + $this->headers(),
            'json'    => $payload,
        ]);
    }

    public function prices(array $ids): array
    {
        $url = rtrim($this->cfg->priceBase, '/').'/v3/price';
        $cacheKey = 'jup_price_'.md5(implode(',', $ids));
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cache = cache();
        if ($cached = $cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $res = $this->request('get', $url, [
            'headers' => $this->headers(),
            'query'   => ['ids' => implode(',', $ids)],
        ]);
        $cache->save($cacheKeySanitized, $res, 60);
        return $res;
    }

    public function tokenList(): array
    {
        $url = 'https://token.jup.ag/all';
        $cache = cache();
        $key = sanitizeCacheKey('jup_token_list');
        if ($cached = $cache->get($key)) {
            return $cached;
        }
        $res = $this->request('get', $url, ['headers' => $this->headers()]);
        $cache->save($key, $res, 3600);
        return $res;
    }
}
?>